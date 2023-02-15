<?php


class UserDetail {
    private string $birthday;
    private string $email;
    private string $name;
    private string $surname;
    private string $phoneNumber;
    private int $idSchool;
    private string $avatar_path;

    public function __construct(string $birthday, string $email, string $name, string $surname, string $phoneNumber, int $idSchool, string $avatarPath)
    {
        $this->birthday = $birthday;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->phoneNumber = $phoneNumber;
        $this->idSchool = $idSchool;
        $this->avatar_path = $avatarPath;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getIdSchool(): int
    {
        return $this->idSchool;
    }

    public function getAvatarPath(): string
    {
        return $this->avatar_path;
    }

}