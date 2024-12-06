<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuitemsTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'restaurant_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'picture_link' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'detail' => [
                'type' => 'TEXT',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('menuitems');
    }

    public function down()
    {
        //
        $this->forge->dropTable('menuitems');
    }
}
