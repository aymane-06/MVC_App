<?php
// app/views/layout/header.php

// Start output buffering
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/YouDemy/assets/css/styles.css">
    <!-- LINK tilwien -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.17/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-black text-white">
    <!-- Navigation Bar -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-red-500">YouDemy</a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-red-500">Home</a></li>
                <li><a href="/logIn" class="hover:text-red-500">Login</a></li>
                <li><a href="/signUp" class="hover:text-red-500">Sign Up</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>