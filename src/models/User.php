<?php

class User{
    private string $pesel;
    private string $password;
    private int $role_id;

    public function __construct(
        string $pesel,
        string $password,
        int $role_id
    ) {
        $this->pesel = $pesel;
        $this->password = $password;
        $this->role_id = $role_id;
    }

    public function getPesel(): string 
    {
        return $this->pesel;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): int
    {
        return $this->role_id;
    }

}