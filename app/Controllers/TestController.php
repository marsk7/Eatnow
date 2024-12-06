<?php

namespace App\Controllers;

class TestController extends BaseController
{
    public function testDatabaseConnection()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('menuitems'); 
        $query = $builder->get();
        $result = $query->getResult();

        var_dump($result); 
    }
}
