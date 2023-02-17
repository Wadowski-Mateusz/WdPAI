<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Grade.php';
require_once __DIR__.'/../repository/GradeRepository.php';

class GradeController extends AppController {

    private array $message = [];
    private GradeRepository $gradeRepository;

    public function __construct() {
        parent::__construct();
        $this->gradeRepository = new GradeRepository();
    }

    public function addGrade() {
        if (!$this -> isPost())
             return $this->render('add-grade');

        $studentId = $_POST['studentId'];
        $subjectId = $_POST['subjectId'];
        $grade = $_POST['grade'];
        $weight = $_POST['weight'];
        $dateOfIssue = $_POST['dateOfIssue'];
        $comment = $_POST['comment'];

        // TODO check if something is empty
    }

    public function studentGrades(int $studentId) {
        $grades = $this -> gradeRepository -> getStudentGrades($studentId);
        $this->render('grades', ['grades' => $grades]);
    }


}