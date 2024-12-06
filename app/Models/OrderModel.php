<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['table_id', 'user_id', 'restaurant_id', 'price', 'time', 'tips', 'status'];
    protected $returnType = 'array';

    public function getOrderItems($orderId)
    {
        return $this->select('orders.*, order_menuitem.menuitem_id, order_menuitem.number, menuitems.name, menuitems.price')
                    ->join('order_menuitem', 'order_menuitem.order_id = orders.id')
                    ->join('menuitems', 'menuitems.id = order_menuitem.menuitem_id')
                    ->where('orders.id', $orderId)
                    ->findAll();
    }

    public function getCartItems($userId)
    {
        return $this->select('menuitems.name, menuitems.price, order_menuitem.number')
                    ->join('order_menuitem', 'order_menuitem.order_id = orders.id')
                    ->join('menuitems', 'menuitems.id = order_menuitem.menuitem_id')
                    ->where('orders.user_id', $userId)
                    ->where('orders.status', 0)
                    ->findAll();
    }

}
