<?php
namespace App\Controllers;

use App\Models\Car;

class CarController {
    public function addCar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $color = $_POST['color'] ?? '';
            $year = intval($_POST['year'] ?? 0);
            $imageUrl = $_POST['image'] ?? '';
            $engine = $_POST['engine'] ?? 'Default';

            if (empty($name) || empty($color) || $year <= 0 || empty($imageUrl)) {
                echo "All fields are required and valid!";
                return;
            }

            $carModel = new Car($name, $color, $year, $imageUrl, $engine);
            $success = $carModel->insertCar();

            if ($success) {
                echo "Car added successfully!";
            } else {
                echo "Error adding car.";
            }
        }
    }

    public function listCars() {
        $carModel = new Car();
        $cars = $carModel->getAllCars();
        return $cars;
    }

    public function editCar($id) {
        $carModel = new Car();
        $car = $carModel->getCarById($id);
        return $car;
    }

    public function updateCar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $color = $_POST['color'] ?? '';
            $year = intval($_POST['year'] ?? 0);
            $imageUrl = $_POST['image'] ?? '';
            $engine = $_POST['engine'] ?? 'Default';

            $carModel = new Car($name, $color, $year, $imageUrl, $engine);
            $success = $carModel->updateCar($id);

            if ($success) {
                echo "Car updated successfully!";
            } else {
                echo "Error updating car.";
            }
        }
    }

    public function removeCar($id) {
        $carModel = new Car();
        $success = $carModel->deleteCar($id);

        if ($success) {
            echo "Car deleted successfully!";
        } else {
            echo "Error deleting car.";
        }
    }
}