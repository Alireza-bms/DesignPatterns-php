<?php

// Product
class User
{
    public $name;
    public $email;
    public $age;

    public function showInfo()
    {
        echo "Name: {$this->name}, Email: {$this->email}, Age: {$this->age}\n";
    }
}

// Builder
class UserBuilder
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function setName($name)
    {
        $this->user->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        $this->user->email = $email;
        return $this;
    }

    public function setAge($age)
    {
        $this->user->age = $age;
        return $this;
    }

    public function build()
    {
        return $this->user;
    }
}

// استفاده
$user = (new UserBuilder())
    ->setName("Ali")
    ->setEmail("ali@example.com")
    ->setAge(21)
    ->build();

$user->showInfo();
