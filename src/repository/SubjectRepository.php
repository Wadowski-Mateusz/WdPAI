<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/School.php';

class SubjectRepository extends Repository {

    public function addSubject(Subject $subject) : void{
//        $stmt = $this->database->connect()->prepare('
//        INSERT INTO schools (address, name)
//        VALUES (?, ?)
//        ');
//
//        $stmt->execute([
//            $school -> getAddress(),
//            $school -> getName()
//        ]);
    }

    public function getSubject(int $id) : ?Subject{
//        $stmt = $this->database->connect()->prepare(
//            'select * from schools where id=:id'
//        );
//
//        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//        $stmt->execute();
//
//        $school = $stmt->fetch(PDO::FETCH_ASSOC);
//
//        return new School($school['address'], $school['name']);
        return null;
    }

}
