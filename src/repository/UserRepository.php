<?php

//namespace repository;

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository
{
    public function getUser(string $pesel): ?User
    {
//        $stmt = $this->database->connect() -> prepare(
//            'SELECT CURRENT_DATABASE()'
//        );
//        $stmt -> execute();
//        $user = $stmt->fetch(PDO::FETCH_ASSOC);
//        echo $user['current_database'];
////            'SELECT * FROM pg_catalog.pg_tables'
//
//        return null;

        $stmt = $this->database->connect() -> prepare(
            'SELECT * FROM public.users WHERE pesel = :pesel'
        );

        $stmt->bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user)
            return null;

        $dummy = "dummy";
        return new User(
            $user['pesel'],
            $dummy,
            $user['password'],
            $dummy,
            $dummy

/*            $user['pesel'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
            */
        );
    }
}