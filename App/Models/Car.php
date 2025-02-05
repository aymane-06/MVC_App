<?php
namespace App\Modules;


class Car
{
    protected $name;
    protected $color;
    protected $year;
    protected $image;
  

    public function __construct($name, $color, $year, $image)
    {
        $this->name = $name;
        $this->color = $color;
        $this->year = $year;
        $this->image = $image;
        
    }


   
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

   

    public function insertCar(){
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO cars (name, color, year, image) VALUES (:name, :color, :year, :image)");
        return $stmt->execute([
            ':name' => $this->name,
            ':color' => $this->color,
            ':year' => $this->year,
            ':image' => $this->image
        ]);
    }


    public function ModifierCar($id){
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE cars SET name = :name, color = :color, year = :year, image = :image WHERE id = :id");
        return $stmt->execute([
            ':name' => $this->name,
            ':color' => $this->color,
            ':year' => $this->year,
            ':image' => $this->image,
            ':id' => $id
        ]);
    }



    public function deletCar($id){
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM cars WHERE id = :id");
        return $stmt->execute([
            ':id' => $id
        ]);
    }



}

?>