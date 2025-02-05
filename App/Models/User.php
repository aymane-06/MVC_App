<?php
namespace App\Modules;

abstract class User
{
protected $name;
protected $email;
protected $password;
protected $role;

public function __construct($name, $email, $password , $role)
{
$this->name = $name;
$this->email = $email;
$this->password = $password;
$this->role = $role;
}

abstract function register();

}


?>