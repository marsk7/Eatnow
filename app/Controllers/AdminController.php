<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AdminController extends BaseController
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
        return view('LandingPage');
    }

    public function admin()
    {   
        // Create an instance of the Model
        $menuitemModel = new \App\Models\MenuItemModel();
        $categoryModel = new \App\Models\CategoryModel();

        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the MenuItemModel
            foreach ($menuitemModel->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            // Retrieve items matching the search conditions, order by name in ascending order
            $menuItems = $menuitemModel->where($whereClause)->orderBy('name', 'ASC')->findAll();
        } else {
            // If no search query is provided
            
            // Retrieve all items, order by id in ascending order
            $menuItems = $menuitemModel->orderBy('id', 'ASC')->findAll();
        }

        // Retrieve categories
        $categories = $categoryModel->orderBy('id', 'ASC')->findAll();

        // Create an associative array of categories for easy access
        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category['id']] = $category['name'];
        }

        // Enhance $menuItems with category names
        foreach ($menuItems as &$menuItem) {
            $categoryId = $menuItem['category_id'];
            $menuItem['category_name'] = $categoryMap[$categoryId];
        }
        
        // Store the retrieved items in the $data array
        $data['menuItems'] = $menuItems;

        
        // Load the 'Admin' view and pass the $data array to it
        return view('Admin', $data);
    }


    public function addedit($id = null)
    {   
        $model = new \App\Models\MenuItemModel();
        // var_dump($this->request->getMethod());
    
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();
    
            if ($id === null) {
                if ($model->insert($data)) {
                    $this->session->setFlashdata('success', 'Item added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add item. Please try again.');
                }
            } else {
                if ($model->update($id, $data)) {
                    $this->session->setFlashdata('success', 'Item updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update item. Please try again.');
                }
            }
            return redirect()->to('/admin');
        }
    
        $data['menuItems'] = ($id === null) ? null : $model->find($id);
    
        return view('EditItem', $data);
    }

    public function delete($id)
    {
        $model = new \App\Models\MenuItemModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('success', 'Item deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete item. Please try again.');
        }

        return redirect()->to('/admin');
    }

    public function showitem($id)
    {
        $menuItemModel = new \App\Models\MenuItemModel();
        $restaurantModel = new \App\Models\RestaurantModel();
        $categoryModel = new \App\Models\CategoryModel();

        // Fetch menuitem details by id
        $menuItem = $menuItemModel->find($id);
    
        // Ensure menuitem exists
        if (!$menuItem) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Item Not Found');
        }
    
        // Fetch related data
        $data['menuItem'] = $menuItem;
        $data['restaurant'] = $restaurantModel->find($menuItem['restaurant_id']);
        $data['category'] = $categoryModel->find($menuItem['category_id']);

        return view('ShowItem', $data);
    }

    public function orders()
    {
        // Fetch and display orders
        $data['orders'] = $this->orderModel->findAll();
        return view('admin/orders', $data);
    }

    public function chatui($user_id = NULL)
    {

        // Get the user  
        // $userModel = new \App\Models\UserModel();
        // $data['user'] = $userModel->find($user_id);
        $defaultUsername = 'Alley';

        // Ensure user exists
        if (!$user_id) {
            $data['user']['username'] = $defaultUsername;
        }else {
            // Get the user  
            $userModel = new \App\Models\UserModel();
            $user = $userModel->find($user_id);
    
            // Ensure user exists
            if (!$user) {
                // If user doesn't exist, set default username
                $data['user']['username'] = $defaultUsername;
            } else {
                $data['user'] = $user;
            }
        }

        return view('Chatui', $data);

    }

    public function chatbot()
    {
        // Get the posted JSON
        $messages = $this->request->getJSON(true);

        $client = new Client();
        $apiKey = env('OPENAI_API_KEY');
	$model = 'gpt-4o';
	// $model = 'gpt-3.5-turbo';
        // $model = 'gpt-4';
        // $model = 'gpt-4-turbo';
        $maxTokens = 500;

        try {
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'content-type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey,
                ],
                'json' => [
                    'model' => $model,
                    'messages' => $messages,
                    'max_tokens' => $maxTokens
                    ]
                ]);

            $responseBody = $response->getBody();
            $responseData = json_decode($responseBody, true);
            $botResponse = $responseData['choices'][0]['message']['content'];

            return $this->response->setJSON(['message' => $botResponse]);

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $responseBody = $response->getBody()->getContents();
                $errorMessage = "Error: " . $statusCode . " - " . $response->getReasonPhrase();
                
                // Handle the error response
                // ...
                return $this->response->setJSON(['message' => $errorMessage]);
            } else {
                // Handle other request errors
                // ...
                return $this->response->setJSON(['message' => 'Other Error']);
            }
        }
    }

}

