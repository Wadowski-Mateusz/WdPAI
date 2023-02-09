<?php

//namespace repository;

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository
{
    public function getUser(string $pesel): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE pesel = :pesel
        ');
        $stmt->bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) { // Takie to niezbyt, lepszy byłby wyjątek
            return null;
        }

        return new User(
            $user['pesel'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }
}