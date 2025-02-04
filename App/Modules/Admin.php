<?php
namespace   App\Modules;



class Admin extends User {
    public function __construct($name, $email, $password, $role) {
        parent::__construct($name, $email, $password, $role);
    }
   
}



?>