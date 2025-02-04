<?php
namespace App\App;
use PDO; 

class Database {
    private static $host = "localhost";
    private static $db = "carMVC";
    private static $username = "postgres";
    private static $password = "";
    private static $driver = "pgsql";    
    private static $conn = null;        

    public static function getConnection() {  
        if (self::$conn) {            
            return self::$conn;
        }
        
        try {
            self::$conn = new PDO(
                self::$driver . ":host=" . self::$host . ";dbname=" . self::$db,
                self::$username,
                self::$password
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return self::$conn;
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
}

Database::getConnection();
?>







