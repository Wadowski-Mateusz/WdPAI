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

}