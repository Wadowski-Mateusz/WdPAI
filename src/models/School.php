<?php

class School {

    private int $id;
    private string $address;
    private string $name;
    public function __construct(
        int $id,
        string $address,
        string $name
    ) {
        $this -> id = $id;
        $this -> address = $address;
        $this -> name = $name;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getName(): string {
        return $this->name;
    }

}


