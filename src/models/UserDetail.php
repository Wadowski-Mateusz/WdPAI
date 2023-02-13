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

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return int
     */
    public function getIdSchool(): int
    {
        return $this->idSchool;
    }

    /**
     * @return string
     */
    public function getAvatarPath(): string
    {
        return $this->avatar_path;
    }



}