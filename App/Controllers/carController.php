<?php
namespace App\Controllers;
require_once 'C:/laragon/www/mvc-progi/vendor/autoload.php';

use App\Models\Car;

class CarController {
    public function AjouterCar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $color = $_POST['color'] ?? '';
            $year = intval($_POST['year'] ?? 0);
            $imageUrl = $_POST['image'] ?? '';

            if (empty($name) || empty($color) || $year <= 0 || empty($imageUrl)) {
                echo "All fields are required and valid!";
                return;
            }

            // Use Model to Insert Data
            $carModel = new Car($name, $color, $year, $imageUrl);
            $success = $carModel->insertCar();

            if ($success) {
                echo "Car added successfully!";
            } else {
                echo "Error adding car.";
            }
        }
    }
}
?>