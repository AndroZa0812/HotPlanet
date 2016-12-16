<?php

class User
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $age;
    public $loggedIn;

    public function __construct($firstname, $lastname, $email, $password, $age)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->loggedIn = false;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

}