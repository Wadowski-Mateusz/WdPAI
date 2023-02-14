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

    public function addUser(int $pesel, UserDetail $userDetail): void {
//        TODO uzupełnić o szkołę, klasę, role... może jeszcze cos o czym zapomnialem

        # urodziny na podstawie peselu
        # email null
        # name
        # surname
        # phone null
        # id_school TODO
        # picture_path
        $stmt = $this->database->connect()->prepare('
            INSERT INTO details (email, name, surname, phone_number, id_school, picture_path)
            VALUES (?, ?, ?, ?, ?, ?) RETURNING id
        ');

        $stmt->execute([
            '$usil()',
            '$usName()',
            '$usme()',
            '$ushone()',
            12,
            '$usath()'
        ]);

//        $stmt->execute([
//            $userDetail->getBirthday(), // TODO string na date date->format('Y-m-d')
//            $userDetail->getEmail(),
//            $userDetail->getName(),
//            $userDetail->getSurname(),
//            $userDetail->getPhone(),
//            $userDetail->getIdSchool(),
//            $userDetail->getAvatarPath()
//        ]);

        $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        # TODO losowanie hasła
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (pesel, password, id_detail, id_role)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $pesel,
            'todopasspwd',
            10,
            1
        ]);

    }

}