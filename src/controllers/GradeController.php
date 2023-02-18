<?php

use Cassandra\Time;

require_once 'AppController.php';
require_once __DIR__.'/../models/Grade.php';
require_once __DIR__.'/../repository/GradeRepository.php';
require_once __DIR__.'/../repository/ClassRepository.php';
require_once __DIR__.'/../repository/SubjectRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

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

    public function addGrade(int $id) {

        http_response_code(200);

        $subjects = $this -> subjectRepository -> getClassSubjects($id);
        $students = $this -> classRepository -> getAllStudentsFromClass($id);

        if (!$this -> isPost())
            return $this->render('add-grade', ['subjects'=>$subjects, 'students' => $students]);

        $studentId = $_POST['students'];
        $subjectId = $_POST['subjects'];
        $grade = $_POST['grades'];

        if ($studentId == -1 || $subjectId == -1 || $grade == -1){
            $this->message = ['Uzupełnij pola'];
            return $this->render('add-grade', ['subjects'=>$subjects, 'students' => $students, $this->message]);
        }

        $this->gradeRepository->addGrade(new Grade($studentId,$subjectId,$grade,''));


        $this->message = ['Dofano ocenę'];
        return $this->render('add-grade', ['subjects'=>$subjects, 'students' => $students, $this->message]);
    }

    /**
     * Grades for student
    */
    public function grades() {
        $grades = $this -> gradeRepository -> getStudentGrades($_COOKIE['userId']);
        $classId =  $this -> userRepository -> getStudentClass($_COOKIE['userId']);
        $subjects = $this -> subjectRepository -> getClassSubjects($classId);
        $this->render('grades', ['grades' => $grades, 'subjects' => $subjects]);
    }

}