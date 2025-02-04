<?php
namespace App\Models;

use Database\Database;

class Car{
    private string $name;

    private string $description;

    private static $pdo;

    public function __construct($name,$description){
        $this->name=$name;
        $this->description=$description;
        self::$pdo=Database::getConnection();
    }

    public function insert()  {
        $sql="INSERT INTO cars('name','description') VALUE(:name,:description)";
        $stmt=self::$pdo->prepare($sql);
        $stmt->execute([
            "name"=>$this->name,
            "description"=>$this->description
        ]);

    }


}