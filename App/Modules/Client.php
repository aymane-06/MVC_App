<?php
namespace App\Modules;



class Client extends User {

    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password);
    }
   
   
    
}


?>