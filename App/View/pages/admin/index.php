<?php
require_once 'C:/laragon/www/mvc-progi/vendor/autoload.php';


use App\Controllers\CarController;
use App\Models\Car;

$controller = new CarController();
$controller->AjouterCar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-5">
            <h2 class="text-2xl font-bold mb-5">Dashboard</h2>
            <nav>
                <ul>
                    <li class="mb-3"><a href="#" class="hover:underline">Home</a></li>
                    <li class="mb-3"><a href="#" class="hover:underline">Cars</a></li>
                    <li class="mb-3"><a href="#" class="hover:underline">Add Car</a></li>
                    <li class="mb-3"><a href="#" class="hover:underline">Settings</a></li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-6">Add a New Car</h1>
            <form action="index.php" method="POST" class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
    <div class="mb-4">
        <label class="block text-gray-700">Car Name</label>
        <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Enter car name" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Color</label>
        <input type="text" name="color" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Enter car color" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Year</label>
        <input type="number" name="year" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Enter car year" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Url Image</label>
        <input type="url" name="image" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Enter car image url" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Car</button>
</form>

        </main>
    </div>
</body>
</html>
