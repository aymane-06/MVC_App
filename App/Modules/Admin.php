<?php
namespace   App\Modules;
use App\Database\Database;
class Admin extends User {
    public function __construct($name, $email, $password, $role) {
        parent::__construct($name, $email, $password, $role);
    }

    public function register() {
        $db = Database::getConnection();
    $stmt = $db->prepare("INSERT INTO users (name,  email, password, role) VALUES (:name, :email, :password, :role)");
    return $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_BCRYPT),
        ':role' => $role
    ]);
    }
   
   
}



?>