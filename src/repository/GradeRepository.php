<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Grade.php';

class GradeRepository extends Repository {

    public function addGrade(Grade $grade) : void {

        $stmt = $this->database->connect()->prepare('
        INSERT INTO grades ()
        VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $grade -> getStudentId(),
            $grade -> getSubjectId(),
            $grade -> getGrade(),
            $grade -> getDateOfIssue(),
        ]);
    }

    public function getStudentGrades(int $studentId){

    }

}
