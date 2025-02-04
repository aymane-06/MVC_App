<?php
namespace App\Controllers;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Models\Car;

class CarController {

public static function creatCar() {
  if(isset($_POST['Submit']) ){
    $name=$_POST["nom"];
    $desc=$_POST["description"];
    $car=new Car($name,$desc);
    $car->insert();
    header("location:CarController.php");
    }
else 
require '../Views/page.php';
}


}
CarController::creatCar();