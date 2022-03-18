<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $name;
    public $email;
    public $password;

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
    
    public function gerSource() {
        return 'users';
    }

}