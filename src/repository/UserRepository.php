<?php

//namespace repository;

require_once 'Repository.php';
require_once __DIR__.'/../models/UserDetail.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository {

    public function getUser(string $pesel, string $password): ?User {

        $stmt = $this->database->connect() -> prepare(
            'SELECT * FROM (SELECT * FROM users WHERE password=:password) u WHERE pesel=:pesel;'
        );
        $stmt -> bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$user)
            return null;

        // TODO make is_logged = false when logging out
//        if($user['is_logged'])
//            return null;

        $stmt = $this->database->connect() -> prepare(
            'SELECT name FROM roles WHERE id=:id;'
        );
        $stmt -> bindParam(':id', $user['id_role'], PDO::PARAM_STR);
        $stmt -> execute();
        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        setcookie('userId', $user['id'], time()+6000);
        setcookie('userRole', $role['name'], time()+6000);

        $stmt = $this->database->connect() -> prepare(
            'update users set is_logged=true where id=:id;'
        );
        $stmt -> bindParam(':id', $user['id'], PDO::PARAM_STR);
        $stmt -> execute();

        return new User(
            $user['pesel'],
            $user['password'],
        );
    }

    public function getDetailOfUser(int $id): ?UserDetail{
        $stmt = $this->database->connect() -> prepare(
            'SELECT  * FROM public.details where id = (SELECT id_detail FROM public.users WHERE id = :id)'
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

    public function getUserSchoolId(): ?int{
        $stmt = $this->database->connect() -> prepare(
            'select id_school from details where id=(select id_detail from users where id = :id)'
        );

        $stmt->bindParam(':id', $_COOKIE['userId'], PDO::PARAM_INT);
        $stmt->execute();

        $school = $stmt->fetch(PDO::FETCH_ASSOC);

        return $school['userId'];
    }

    public function addUser(User $user, UserDetail $userDetail): void {
//        TODO uzupełnić o szkołę, klasę, role... może jeszcze cos o czym zapomnialem

        $stmt = $this->database->connect()->prepare('
            INSERT INTO details (birthday, email, name, surname, phone_number, id_school, avatar_path)
            VALUES (?, ?, ?, ?, ?, ?, ?) RETURNING id
        ');

        $stmt->execute([
            $userDetail -> getBirthday(),
//            date("Y/m/d"),
            null,
            $userDetail -> getName(),
            $userDetail -> getSurname(),
            null,
            $userDetail -> getIdSchool(),
            $userDetail -> getAvatarPath()
        ]);

        $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (pesel, password, id_detail, id_role)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $user -> getPesel(),
            $user -> getPassword(),
            $id,
            1 //TODO ?
        ]);
    }



}