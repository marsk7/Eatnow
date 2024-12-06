<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderMenuItemModel extends Model
{
    protected $table = 'order_menuitem';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'menuitem_id', 'number', 'note'];
    protected $returnType = 'array';
}
