<?php

class User {
    private string $pesel;
    private string $password;

    public function __construct(
        string $pesel,
        string $password
    ) {
        $this->pesel = $pesel;
        $this->password = $password;
    }

    public function getPesel(): string 
    {
        return $this->pesel;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}