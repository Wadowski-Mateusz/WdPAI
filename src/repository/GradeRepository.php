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

        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM grades WHERE id_student=:id'
        );

        $stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $grades = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        $results = [];

        foreach ($grades as $grade){
            $results[] = new Grade(
                $grade['id_student'], $grade['id_subject'], $grade['grade'], $grade['date_of_issue']
            );
        }

        return $results;
    }

}
