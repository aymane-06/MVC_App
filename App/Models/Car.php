<?php
namespace App\Models;

use App\Config\Database;

class Car {
    protected $id;
    protected $name;
    protected $color;
    protected $year;
    protected $image;
    protected $engine;

    public function __construct($name = '', $color = '', $year = 0, $image = '', $engine = 'Default') {
        $this->name = $name;
        $this->color = $color;
        $this->year = $year;
        $this->image = $image;
        $this->engine = $engine;
    }

    public function insertCar() {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO cars (name, color, year, image, engine) VALUES (:name, :color, :year, :image, :engine)");
        return $stmt->execute([
            ':name' => $this->name,
            ':color' => $this->color,
            ':year' => intval($this->year),
            ':image' => $this->image,
            ':engine' => $this->engine
        ]);
    }

    public function getAllCars() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM cars");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCarById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM cars WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateCar($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE cars SET 
            name = :name, 
            color = :color, 
            year = :year, 
            image = :image,
            engine = :engine 
            WHERE id = :id");
        
        return $stmt->execute([
            ':name' => $this->name,
            ':color' => $this->color,
            ':year' => intval($this->year),
            ':image' => $this->image,
            ':engine' => $this->engine,
            ':id' => $id
        ]);
    }

    public function deleteCar($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM cars WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}