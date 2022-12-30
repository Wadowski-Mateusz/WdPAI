<?php

class User{
    private $pesel;
    private $password;
    private $name;
    private $surname;

    public function __construct(
        string $pesel,
        string $password,
        string $name,
        string $surname
    ) {
        $this->pesel = $pesel;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getPesel(): string 
    {
        return $this->pesel;
    }

    public function getPassword()
    {
        return $this->password;
    }

}