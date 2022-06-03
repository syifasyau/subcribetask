<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmailTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "name" => [
                "type"=> "VARCHAR",
                "constraint" => "230",
                "null" => true,
            ],
            "email" => [
                "type"=> "VARCHAR",
                "constraint" => "230",
            ],
            "created_at" => [
                "type"=> "DATETIME",
                "null" => true,
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addKey('email');
        $this->forge->addField($fields);
        $this->forge->createTable('email', true);
    }

    public function down()
    {
        $this->forge->dropTable('email', true);
    }
}
