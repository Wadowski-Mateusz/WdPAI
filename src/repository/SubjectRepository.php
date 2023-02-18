<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/School.php';

class SubjectRepository extends Repository {

    public function addSubject(Subject $subject) : void{
        $stmt = $this->database->connect()->prepare('
        INSERT INTO subjects (id_class, id_teacher, name)
        VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $subject->getClassId(),
            $subject->getTeacherId(),
            $subject->getName()
        ]);
    }

    public function getClassSubjects(int $classId) : array{

        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM subjects WHERE id_class=:id'
        );

        $stmt->bindParam(':id', $classId, PDO::PARAM_INT);
        $stmt->execute();
        $subjects = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        $results = [];
        foreach ($subjects as $subject)
            $results[] = new Subject($subject['id'], $subject['id_class'], $subject['id_teacher'], $subject['name']);

        return $results;
    }

    public function isInBase(int $classId, string $name) : bool {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM subjects WHERE id_class=:id and name=:name'
        );

        $stmt->bindParam(':id', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        return (bool) $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

}
