<?php
namespace App\Controllers;

use App\Models\Car;

class CarController {
    public function AjouterCar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $color = $_POST['color'] ?? '';
            $year = $_POST['year'] ?? '';
            $imageUrl = $_POST['image'] ?? '';

            if (empty($name) || empty($color) || empty($year) || empty($imageUrl)) {
                echo "All fields are required!";
                return;
            }

            // Use Model to Insert Data
            $carModel = new Car($name, $color, intval($year), $imageUrl);
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