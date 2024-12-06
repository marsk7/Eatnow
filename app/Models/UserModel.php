<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'first_name', 'last_name', 'email', 'phone', 'isAdmin', 'created_at', 'created_from'];
    protected $returnType = 'array';
}
