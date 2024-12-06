<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderMenuitemTable extends Migration
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
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'menuitem_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'number' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('menuitem_id', 'menuitems', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_menuitem');
    }

    public function down()
    {
        //
        $this->forge->dropTable('order_menuitem');
    }
}
