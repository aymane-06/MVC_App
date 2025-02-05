<?php
// app/controllers/UserController.php

namespace App\Controllers;

use App\Modules\Client;
use App\Modules\Admin;
use App\Database\Database;

class UserController
{
    public function logIn($data)
    {
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = ['email' => 'Email and password are required.'];
            header("Location: /logIn");
            exit();
        }

        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user;
            header("Location: /");
            exit();
        } else {
            $_SESSION['error'] = ['email' => 'Invalid email or password.'];
            header("Location: /logIn");
            exit();
        }
    }

    public function signUp($data)
    {
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $role = $data['accountType'] ?? '';

        if (empty($name) || empty($email) || empty($password) || empty($role)) {
            $_SESSION['error'] = ['general' => 'All fields are required.'];
            $_SESSION['old'] = $data;
            header("Location: /signUp");
            exit();
        }

        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $_SESSION['error'] = ['email' => 'Email already exists.'];
            $_SESSION['old'] = $data;
            header("Location: /signUp");
            exit();
        }

        if ($role === 'student') {
            $user = new Client($name, $email, $password);
        } elseif ($role === 'teacher') {
            $user = new Admin($name, $email, $password, $role);
        } else {
            $_SESSION['error'] = ['role' => 'Invalid role selected.'];
            header("Location: /signUp");
            exit();
        }

        if ($user->register()) {
            header("Location: /logIn");
            exit();
        } else {
            $_SESSION['error'] = ['general' => 'Registration failed. Please try again.'];
            header("Location: /signUp");
            exit();
        }
    }

    public function logOut()
    {
        session_destroy();
        header("Location: /");
        exit();
    }
}