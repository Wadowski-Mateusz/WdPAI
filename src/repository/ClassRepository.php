<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ClassInSchool.php';
class ClassRepository extends Repository {

    public function addClass(ClassInSchool $class) : void{
        $stmt = $this->database->connect()->prepare('
        INSERT INTO classes (id_tutor, name, id_school)
        VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $class -> getTutorId(),
            $class -> getName(),
            $class -> getSchoolId()
        ]);
    }

    public function isInBase(ClassInSchool $class) : bool{

        $stmt = $this->database->connect()->prepare('
            select * from classes where name=:name and id_school=:id_school  
        ');

        $stmt->bindParam(':name', $class->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':id_school', $class->getSchoolId(), PDO::PARAM_STR);

        $stmt->execute();

        $class = $stmt->fetch(PDO::FETCH_ASSOC);

        return !(!$class);
    }

    public function getClassesFromSchool(int $schoolId){

        //TODO jeśli możliwe, zamień na join

        $stmt = $this->database->connect()->prepare(
            'select * from classes where id_school=:schoolId;'
        );
        $stmt->bindParam(':schoolId', $schoolId, PDO::PARAM_INT);
        $stmt->execute();

        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($classes as $class)
            $result[] = new ClassInSchool($class['id'], $class['id_tutor'], $class['name'],$class['id_school']);

        return $result;
    }

    public function getClassesForTeacher(int $teacherId){

        //TODO jeśli możliwe, zamień na join

        $stmt = $this->database->connect()->prepare(
            'select * from classes where id in (select id_class from users_classes where id_user=:teacherId);'
        );
        $stmt->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
        $stmt->execute();

        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($classes as $class)
            $result[] = new ClassInSchool($class['id'], $class['id_tutor'], $class['name'],$class['id_school']);

        return $result;
    }


}