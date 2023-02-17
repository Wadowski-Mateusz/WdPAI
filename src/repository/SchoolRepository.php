<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/School.php';

class SchoolRepository extends Repository {

    public function addSchool(School $school) : void{
        $stmt = $this->database->connect()->prepare('
        INSERT INTO schools (address, name)
        VALUES (?, ?)
        ');

        $stmt->execute([
            $school -> getAddress(),
            $school -> getName()
        ]);
    }

    public function getSchool(int $id) : ?School{
        $stmt = $this->database->connect()->prepare(
            'select * from schools where id=:id'
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $school = $stmt->fetch(PDO::FETCH_ASSOC);

        return new School($school['address'], $school['name']);
    }

    public function isInBase(string $address) : bool {
        $stmt = $this -> database -> connect() ->prepare(
            'select id from schools where address=:address;'
        );
        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
        $stmt->execute();
        return (bool)$stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function hasDirector(int $schoolId) : bool {
        //TODO jeżli możliwe, zamień na JOIN
        $stmt = $this -> database -> connect() ->prepare(
            'select id_school from details where id in (select id_detail from users where id_role=2);' // id 2 is assigned for director
        );
        $stmt->execute();
        $hasDirector = $stmt->fetchall(PDO::FETCH_ASSOC);

        if(!$hasDirector)
            return false;

        foreach ($hasDirector as $e){
            if($e['id_school'] === $schoolId)
                return true;
        }

        return false;
    }

    public function schoolsWithoutDirector() : ?array {
        $stmt = $this -> database -> connect() ->prepare(
            'select * from schools where id not in (select id_school from details where id in (select id_detail from users where id_role=2));'
        );
        $stmt->execute();

        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

}
