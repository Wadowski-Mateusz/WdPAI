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

}
