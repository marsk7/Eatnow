<?php

namespace App\Controllers;

use App\Models\RestaurantModel;
use App\Models\MenuItemModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class RestaurantController extends BaseController
{
    protected $restaurantModel;
    protected $menuItemModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->restaurantModel = new RestaurantModel();
        $this->menuItemModel = new MenuItemModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        // Display all restaurants
        $restaurants = $this->restaurantModel->findAll();
        // Render view
        return view('restaurants/index', ['restaurants' => $restaurants]);
    }

    public function create()
    {
        // Show create restaurant form
        return view('restaurants/create');
    }

    public function store()
    {
        // Handle form submission to create new restaurant
        $data = [
            'name' => $this->request->getVar('name'),
            'logo_link' => $this->request->getVar('logo_link'),
            'address' => $this->request->getVar('address'),
            'profile' => $this->request->getVar('profile'),
        ];
        // Insert data into database
        $this->restaurantModel->insert($data);
        // Redirect to restaurant list page
        return redirect()->to('/restaurants');
    }

    public function edit($id)
    {
        // Get restaurant information to edit based on ID
        $restaurant = $this->restaurantModel->find($id);
        // Render edit form view
        return view('restaurants/edit', ['restaurant' => $restaurant]);
    }

    public function update($id)
    {
        // Handle form submission to update restaurant information
        $data = [
            'name' => $this->request->getVar('name'),
            'logo_link' => $this->request->getVar('logo_link'),
            'address' => $this->request->getVar('address'),
            'profile' => $this->request->getVar('profile'),
        ];
        // Update restaurant information in database for given ID
        $this->restaurantModel->update($id, $data);
        // Redirect to restaurant list page
        return redirect()->to('/restaurants');
    }

    public function delete($id)
    {
        // Delete restaurant information from database for given ID
        $this->restaurantModel->delete($id);
        // Redirect to restaurant list page
        return redirect()->to('/restaurants');
    }

    public function showMenu($id)
    {
        // Get menu items list based on restaurant ID
        $menuItems = $this->menuItemModel->where('restaurant_id', $id)->findAll();
        // Get menu categories list based on restaurant ID
        $categories = $this->categoryModel->where('restaurant_id', $id)->findAll();
        // Render menu view
        return view('restaurants/menu', ['menuItems' => $menuItems, 'categories' => $categories]);
    }
}
