<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Home extends BaseController
{
    public function index($category = null): string
    {
        // Get the table_id from the query parameters
        $tableId = $this->request->getGet('table_id');
        if ($tableId !== null) {
            $session = session();
            $session->set(['table_id' => $tableId]);
        }
        
        // Create an instance of the Model
        $menuitemModel = new \App\Models\MenuItemModel();
        $categoryModel = new \App\Models\CategoryModel();
        $userModel = new \App\Models\UserModel();
        
        $user['id'] = session()->get('id');
        // Retrieve categories
        $categories = $categoryModel->orderBy('id', 'ASC')->findAll();

        // Create an associative array of categories for easy access
        $categoryMap = [];
        foreach ($categories as $categoryItem) {
            $categoryMap[$categoryItem['id']] = $categoryItem['name'];
        }

        // If a category is provided
        if (!empty($category) && $category !== 'all') {
            // Find the category ID
            $categoryId = $categoryModel->where('name', $category)->first()['id'];

            // Retrieve menu items for the selected category
            $menuItems = $menuitemModel->where('category_id', $categoryId)->orderBy('id', 'DESC')->findAll();
        } else {
            // Retrieve all menu items if no category is provided
            $menuItems = $menuitemModel->orderBy('id', 'DESC')->findAll();
        }

        // Enhance $menuItems with category names
        foreach ($menuItems as &$menuItem) {
            $categoryId = $menuItem['category_id'];
            $menuItem['category_name'] = $categoryMap[$categoryId];
        }
        
        // Store the retrieved items in the $data array
        $data['menuItems'] = $menuItems;
        $data['categories'] = $categories;
        $data['category'] = $category;
        $data['user'] = $user;
        

        return view('LandingPage', $data);
    }
    public function scan()
    {
        return view('Scan');
    }

}
