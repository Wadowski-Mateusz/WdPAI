<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/ClassInSchool.php';
require_once __DIR__.'/../repository/ClassRepository.php';
class ClassController extends AppController {

    private array $message = [];
    private ClassRepository $classRepository;

    public function __construct() {
        parent::__construct();
        $this->classRepository = new ClassRepository();
    }

    public function addClass() {

        #TODO NAUCZYCIEL

        if (!$this->isPost())
            return $this->render('add-class');

        $name = $_POST['name'];

        if($name == ''){
            $this->message = ['Uzupełnij brakujące pola!'];
            return $this->render('add-class', ['messages' => $this->message]);
        }

        $schoolId = (new UserRepository())->getUserSchoolId();

        $class = new ClassInSchool(null, $name, $schoolId);

        if (!$this->classRepository->isInBase($class)) {
            $this->classRepository->addClass($class);
            $this->message = ['Dodano klasę.'];
        }
        else
            $this->message = ['Klasa już istnieje.'];
        return $this->render('add-class', ['messages' => $this->message]);
    }

}