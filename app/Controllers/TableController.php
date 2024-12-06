<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class TableController extends BaseController
{

    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the ResumeController
        helper('url'); 

        $this->session = session();
    }


    public function index()
    {
        // Display all tables
        // $tables = $this->tableModel->findAll();
        // Render view
        return view('TableAdmin');
    }

    public function admin()
    {   
        // Create an instance of the Model
        $tableModel = new \App\Models\TableModel();
        $restaurantsModel = new \App\Models\RestaurantModel();

        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the TableModel
            foreach ($tableModel->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            // Retrieve items matching the search conditions, order by name in ascending order
            $tables = $tableModel->where($whereClause)->orderBy('id', 'ASC')->findAll();
        } else {
            // If no search query is provided
            
            // Retrieve all items, order by id in ascending order
            $tables = $tableModel->orderBy('id', 'ASC')->findAll();
        }

        // Retrieve restaurants
        $restaurants = $restaurantsModel->orderBy('id', 'ASC')->findAll();

        // Create an associative array of restaurants for easy access
        $restaurantMap = [];
        foreach ($restaurants as $restaurant) {
            $restaurantMap[$restaurant['id']] = $restaurant['name'];
        }

        // Enhance $menuItems with category names
        foreach ($tables as &$table) {
            $restaurantId = $table['restaurant_id'];
            $table['restaurant_name'] = $restaurantMap[$restaurantId];
        }

        // Store the retrieved items in the $data array
        $data['tables'] = $tables;
        
        // Load the 'Admin' view and pass the $data array to it
        return view('TableAdmin', $data);
    }

    public function qrgenerator()
    { 
        // Create an instance of the Model
        $tableModel = new \App\Models\TableModel();

        $tableid = $_GET['tableid'];
        if (!empty($tableid)) {
            return redirect()->to(base_url('admin/table/qrgenerator/showqrcode/' . $tableid));
        } else {
            $data['error_message'] = "Please generate new Table information before creating QR Code.";
            return view('Qrgenerator', $data);
        }
    }

    public function generateQRCode($tableid)
    {
         // Generate a unique link based on the table ID
        $link = base_url("menu/all?table_id={$tableid}#category");

        // $qr_code = QrCode::create('https://infs3202-9303e754.uqcloud.net/eatnow/menu/all#category');
        $qr_code = QrCode::create($link);
        $writer = new PngWriter;
        $result = $writer->write($qr_code);
    
        // Set the response headers
        $this->response->setHeader('Content-Type', $result->getMimeType());
    
        // Output the QR code image directly
        $this->response->setBody($result->getString());
    
        // Return the response
        return $this->response->send();
    }

    public function addedit($id = null)
    {   
        $model = new \App\Models\TableModel();
        // var_dump($this->request->getMethod());
    
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();
    
            if ($id === null) {
                if ($model->insert($data)) {
                    $this->session->setFlashdata('success', 'Table added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add Table. Please try again.');
                }
            } else {
                if ($model->update($id, $data)) {
                    $this->session->setFlashdata('success', 'Table updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update Table. Please try again.');
                }
            }
            return redirect()->to('/admin/table');
        }
    
        $data['tables'] = ($id === null) ? null : $model->find($id);
    
        return view('EditTable', $data);
    }

    public function delete($id)
    {
        $model = new \App\Models\TableModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('success', 'Table deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete Table. Please try again.');
        }

        return redirect()->to('/admin/table');
    }

    public function showtable($id)
    {
        $tableModel = new \App\Models\TableModel();
        $restaurantModel = new \App\Models\RestaurantModel();

        // Fetch table details by id
        $table = $tableModel->find($id);
    
        // Ensure menuitem exists
        if (!$table) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Table Not Found');
        }
    
        // Fetch related data
        $data['table'] = $table;
        $data['restaurant'] = $restaurantModel->find($table['restaurant_id']);

        return view('ShowTable', $data);
    }

    public function orders()
    {
        // Fetch and display orders
        $data['orders'] = $this->orderModel->findAll();
        return view('admin/orders', $data);
    }

}
