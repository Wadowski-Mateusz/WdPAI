<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Subject.php';
require_once __DIR__.'/../repository/SubjectRepository.php';

class SubjectController extends AppController {
    private array $message = [];
    private SubjectRepository $subjectRepository;

    public function __construct() {
        parent::__construct();
        $this->subjectRepository = new SubjectRepository();
    }

    public function addSubject(){
        if (!$this->isPost())
            return $this->render('add-subject', ['messages' => $this->message]);

        $name = $_POST['name'];
        $teacherId = $_POST['teachers'];
        $classId = $_POST['classes'];
        if($name === '' || $classId == -1 || $teacherId == -1) {
            $this -> message = ['Uzupełnij brakujące pola!'];
            return $this->render('add-subject', ['messages' => $this->message]);
        }

        if($this->subjectRepository->isInBase($classId, $name)){
            $this -> message = ['Przedmiot znajduję się już w bazie'];
            return $this->render('add-subject', ['messages' => $this->message]);
        }

        $this->subjectRepository->addSubject(new Subject(-1, $classId, $teacherId, $name));
        $this -> message = ['Dodano przedmiot'];
        return $this->render('add-subject', ['messages' => $this->message]);

    }

}