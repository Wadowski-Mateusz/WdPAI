<?php

//namespace repository;

require_once 'Repository.php';
require_once __DIR__.'/../models/UserDetail.php';


class UserRepository extends Repository
{
    public function getUser(string $pesel): ?User
    {

        $stmt = $this->database->connect() -> prepare(
            'SELECT * FROM public.users WHERE pesel = :pesel'
        );

        $stmt->bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user)
            return null;

        return new User(
            $user['pesel'],
            $user['password'],
        );
    }

    public function getUserDetail(int $id): ?UserDetail{
        $stmt = $this->database->connect() -> prepare(
            'SELECT  * FROM public.detail where id = (SELECT id_detail FROM public.users WHERE id = :id)'
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user)
            return null;

        return new UserDetail(
            $user['birthday'],
            $user['email'],
            $user['name'],
            $user['surname'],
            $user['phone_number'],
            $user['id_school'],
            $user['avatar_path']
        );
    }
}