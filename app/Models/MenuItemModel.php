<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model
{
    protected $table = 'menuitems';
    protected $primaryKey = 'id';
    protected $allowedFields = ['restaurant_id', 'category_id', 'name', 'picture_link', 'detail', 'price'];
    protected $returnType = 'array';

}
