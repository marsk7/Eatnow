<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OrderController extends BaseController
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
        // Display all orders
        $orders = $this->orderModel->findAll();
        // Render view
        return view('order/index', ['orders' => $orders]);
    }

    public function addToCart($menuItemId)
    {
        $session = session();
        $userId = $session->get('id'); 
        $tableId = $session->get('table_id');

        if(!$userId) {
            $userId = 7;

        }

        // Load models
        $orderModel = new \App\Models\OrderModel();
        $orderMenuItemModel = new \App\Models\OrderMenuItemModel();
        $menuItemModel = new \App\Models\MenuItemModel();
        $menuItem = $menuItemModel->find($menuItemId);
        if (!$menuItem) {
            log_message('error', 'Invalid menuItemId: ' . $menuItemId);
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid menu item']);
        }

        // Check if there is an active order for this user (assuming status 0 is "in cart")
        $order = $orderModel->where('user_id', $userId)->where('status', 0)->first();

        if (!$order) {
            // Create a new order if no active order exists
            $orderId = $orderModel->insert([
                'table_id' => $tableId, // Set appropriate value
                'user_id' => $userId,
                'restaurant_id' => 1, // Set appropriate value
                'price' => 0, // Initial price, will be updated
                'time' => date('Y-m-d H:i:s'),
                'tips' => 0,
                'status' => 0 // Status 0 for "in cart"
            ]);
        } else {
            $orderId = $order['id'];
        }

        // Check if the menu item is already in the order
        $existingItem = $orderMenuItemModel->where('order_id', $orderId)->where('menuitem_id', $menuItemId)->first();

        if ($existingItem) {
            // If item already in order, increase the quantity
            $orderMenuItemModel->update($existingItem['id'], ['number' => $existingItem['number'] + 1]);
        } else {
            // Add new item to order
            $orderMenuItemModel->insert([
                'order_id' => $orderId,
                'menuitem_id' => $menuItemId,
                'number' => 1,
                'note' => 'NULL'
            ]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function viewcart()
    {
        $session = session();
        $userId = $session->get('user_id');

        $orderModel = new \App\Models\OrderModel();
        $orderMenuItemModel = new \App\Models\OrderMenuItemModel();

        $data['cartItems'] = $orderModel->getCartItems($userId);

        return view('Cart', $data);
    }

}
