<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database/SqlServices.php";

class User {
    private $username;
    private $password;
    private $email;
    private $gender;
    private $age;
    private $name;

    public function __construct($username, $password, $email, $gender, $age, $name) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->name = $name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getAge() {
        return $this->age;
    }

    public function getName() {
        return $this->name;
    }
}
?>