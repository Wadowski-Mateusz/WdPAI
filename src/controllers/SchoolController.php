<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/School.php';
require_once __DIR__.'/../repository/SchoolRepository.php';

class SchoolController extends AppController {

    private array $message = [];
    private SchoolRepository $schoolRepository;

    public function __construct() {
        parent::__construct();
        $this->schoolRepository = new SchoolRepository();
    }

    public function getSchool(int $schoolId) : School {
        return $this->schoolRepository->getSchool($schoolId);
    }

    public function addSchool() {

        if (!$this->isPost())
            return $this->render('add-School');

        $name = $_POST['name'];
        $address = $_POST['address'];

        if($name == '' || $address == ''){
            $this->message = ['Uzupełnij brakujące pola!'];
            return $this->render('add-school', ['messages' => $this->message]);
        }

        $this -> schoolRepository ->addSchool(
            new School($address, $name)
        );

        $this->message = ['Dodano szkołę.'];
        return $this->render('add-school', ['messages' => $this->message]);
    }

}