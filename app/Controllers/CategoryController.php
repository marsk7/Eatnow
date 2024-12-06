<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CategoryController extends BaseController
{

    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the ResumeController
        helper('url'); 

        $this->session = session();
    }

    public function admin()
    {
        // Create an instance of the Model
        $categoryModel = new \App\Models\CategoryModel();
        $restaurantsModel = new \App\Models\RestaurantModel();

        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the MenuItemModel
            foreach ($categoryModel->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            // Retrieve items matching the search conditions, order by name in ascending order
            $categories = $categoryModel->where($whereClause)->orderBy('name', 'ASC')->findAll();
        } else {
            // If no search query is provided
            
            // Retrieve all items, order by id in ascending order
            $categories = $categoryModel->orderBy('id', 'ASC')->findAll();
        }

        // Retrieve restaurants
        $restaurants = $restaurantsModel->orderBy('id', 'ASC')->findAll();

        // Create an associative array of restaurants for easy access
        $restaurantMap = [];
        foreach ($restaurants as $restaurant) {
            $restaurantMap[$restaurant['id']] = $restaurant['name'];
        }

        // Enhance $menuItems with category names
        foreach ($categories as &$category) {
            $restaurantId = $category['restaurant_id'];
            $category['restaurant_name'] = $restaurantMap[$restaurantId];
        }
        
        // Store the retrieved items in the $data array
        $data['categories'] = $categories;

        
        // Load the 'Admin' view and pass the $data array to it
        return view('CategoryAdmin', $data);
    }

    public function addedit($id = null)
    {   
        $model = new \App\Models\CategoryModel();
        // var_dump($this->request->getMethod());
    
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();
    
            if ($id === null) {
                if ($model->insert($data)) {
                    $this->session->setFlashdata('success', 'Category added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add Category. Please try again.');
                }
            } else {
                if ($model->update($id, $data)) {
                    $this->session->setFlashdata('success', 'Category updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update Category. Please try again.');
                }
            }
            return redirect()->to('/admin/category');
        }
    
        $data['categories'] = ($id === null) ? null : $model->find($id);
    
        return view('EditCategory', $data);
    }

    public function delete($id)
    {
        $model = new \App\Models\CategoryModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('success', 'Category deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete Category. Please try again.');
        }

        return redirect()->to('/admin/category');
    }

    public function showcategory($id)
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $categoryModel = new \App\Models\CategoryModel();

        // Fetch menuitem details by id
        $category = $categoryModel->find($id);
    
        // Ensure menuitem exists
        if (!$category) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category Not Found');
        }
    
        // Fetch related data
        $data['category'] = $category;
        $data['restaurant'] = $restaurantModel->find($category['restaurant_id']);

        return view('ShowCategory', $data);
    }

}