<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'unique' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'constrain' => 0
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'constrain' => 0
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('product_categories');
    }

    public function down()
    {
        $this->forge->dropTable('product_categories');
    }
}
