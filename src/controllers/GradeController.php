<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Grade.php';
require_once __DIR__.'/../repository/GradeRepository.php';

class GradeController extends AppController {

    private array $message = [];
    private GradeRepository $gradeRepository;
    private ClassRepository $classRepository;
    private SubjectRepository $subjectRepository;
    private UserRepository $userRepository;

    public function __construct() {
        parent::__construct();
        $this->gradeRepository = new GradeRepository();
        $this->classRepository = new ClassRepository();
        $this->subjectRepository = new SubjectRepository();
        $this->userRepository = new UserRepository();
    }

    public function addGrade() {
        $classes = $this -> classRepository -> getClassesForTeacher($_COOKIE['userId']);

        if (!$this -> isPost()) # TODO dodaj tutaj dablice które będą wykorzystywane
            return $this->render('add-grade', ['classes' => $classes]);




        $studentId = $_POST['studentId'];
        $subjectId = $_POST['subjectId'];
        $grade = $_POST['grade'];
        $dateOfIssue = $_POST['dateOfIssue'];

        // TODO check if something is empty

        $this->message = ['Brak opcji zapisu ocen do bazy'];
        return $this->render('add-grade', ['messages' => $this->message]);
    }

    /**
     * Grades for student
    */
    public function grades() {
        $grades = $this -> gradeRepository -> getStudentGrades($_COOKIE['userId']);
        // TODO id klasy - ? na następny dzień nie wiem o co chodzi
        $classId =  $this -> userRepository -> getStudentClass($_COOKIE['userId']);
        $subjects = $this->subjectRepository -> getClassSubjects($classId);
        $this->render('grades', ['grades' => $grades, 'subjects' => $subjects]);
    }

}