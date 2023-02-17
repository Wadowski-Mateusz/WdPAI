<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserDetail.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $pesel, string $password): ?User {
        $stmt = $this->database->connect() -> prepare(
            'SELECT * FROM users WHERE password=:password AND pesel=:pesel;'
        );
        $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
        $stmt -> bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt -> execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user || $user['is_logged'])
            return null;

        $this->login($user['id'], $user['id_role']);

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
            $user['name'],
            $user['surname'],
            $user['id_school'],
            $user['avatar_path']
        );
    }

    public function getUserSchoolId(): int{
        $stmt = $this->database->connect() -> prepare(
            'select id_school from details where id=(select id_detail from users where id = :id)'
        );
        $stmt->bindParam(':id', $_COOKIE['userId'], PDO::PARAM_INT);
        $stmt->execute();
        $school = $stmt->fetch(PDO::FETCH_ASSOC);

        return $school['id_school'];
    }

    public function addUser(User $user, UserDetail $userDetail, int $roleId): void {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO details (birthday, name, surname, id_school, avatar_path)
            VALUES (?, ?, ?, ?, ?) RETURNING id'
        );
        $stmt->execute([
            $userDetail -> getBirthday(),
            $userDetail -> getName(),
            $userDetail -> getSurname(),
            $userDetail -> getIdSchool(),
            $userDetail -> getAvatarPath()
        ]);
        $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO users (pesel, password, id_detail, id_role)
            VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([
            $user -> getPesel(),
            $user -> getPassword(),
            $id,
            $roleId
        ]);
    }

    public function getStudentClass(int $studentId) : int {
        $stmt = $this->database->connect()->prepare('
            SELECT id_class from users_classes where id_user=:id
        ');
        $stmt->bindParam(":id", $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id['id_class'];
    }

    public function isInBase(int $pesel) : bool{
        $stmt = $this->database->connect()->prepare(
            'select * from users where pesel=:pesel'
        );
        $stmt->bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt->execute();
        return (bool) $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function logout() {
        $stmt = $this->database->connect()->prepare(
            'UPDATE users SET is_logged = FALSE WHERE id=:id'
        );
        $stmt->bindParam(':id', $_COOKIE['userId'], PDO::PARAM_INT);
        $stmt->execute();
    }

    private function login(int $userId, int $roleId) {
        $stmt = $this->database->connect() -> prepare(
            'SELECT name FROM roles WHERE id=:roleId;'
        );
        $stmt -> bindParam(':roleId', $roleId, PDO::PARAM_INT);
        $stmt -> execute();
        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        setcookie('userId', $userId, time()+3600);
        setcookie('userRole', $role['name'], time()+3600);

        $stmt = $this->database->connect() -> prepare(
            'update users set is_logged=true where id=:id;'
        );
        $stmt -> bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt -> execute();
    }

}