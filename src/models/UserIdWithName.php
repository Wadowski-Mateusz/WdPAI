<?php

class UserIdWithName {
    private int $id;
    private string $name;
    private string $surname;


    public function __construct(int $id, string $name, string $surname){
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }




}