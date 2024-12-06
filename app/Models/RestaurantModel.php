<?php

namespace App\Models;

use CodeIgniter\Model;

class RestaurantModel extends Model
{
    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'logo_link', 'address', 'profile'];
    protected $returnType = 'array';

}
