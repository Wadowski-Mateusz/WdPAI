<?php


class UserDetail {
    private string $birthday;
    private string $name;
    private string $surname;
    private int $idSchool;
    private string $avatar_path;


    public function __construct(string $birthday, string $name, string $surname, int $idSchool, string $avatarPath) {
        $this->birthday = $birthday;
        $this->name = $name;
        $this->surname = $surname;
        $this->idSchool = $idSchool;
        $this->avatar_path = $avatarPath;
    }

    public function getBirthday(): string {
        return $this->birthday;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getIdSchool(): int {
        return $this->idSchool;
    }

    public function getAvatarPath(): string {
        return $this->avatar_path;
    }

}