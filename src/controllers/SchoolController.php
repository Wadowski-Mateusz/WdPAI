<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/School.php';
require_once __DIR__.'/../models/UserIdWithName.php';
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

    public function addSchool()
    {

        if (!$this->isPost())
            return $this->render('add-school');

        $name = $_POST['name'];
        $address = $_POST['address'];

        if ($name == '' || $address == '') {
            $this->message = ['Uzupełnij brakujące pola!'];
            return $this->render('add-school', ['messages' => $this->message]);
        }

        if ($this->schoolRepository->isInBase($address)) {
            $this->message = ['Szkoła jest już w bazie.'];
        }
        else {
            $this->schoolRepository->addSchool(new School(-1, $address, $name));
            $this->message = ['Dodano szkołę.'];
        }
        return $this->render('add-school', ['messages' => $this->message]);
    }

    public function getSchoolsWithoutDirector() : ?array {
        return $this -> schoolRepository -> schoolsWithoutDirector();
    }

    public function getTeachersFromSchool(int $schoolId) : array {
        return $this -> schoolRepository -> teachersFromSchool($schoolId);
    }

    public function getSchools() : array{
        return $this -> schoolRepository -> schools();
    }

    public function deleteSchool(){
        if (!$this->isPost())
            return $this->render('delete-school');

        $schoolId = intval($_POST['schools-delete']);
        if($schoolId == -1){
            $this->message = ['Wybierz szkołę.'];
            return $this->render('delete-school', ['messages' => $this->message]);
        }

        $this -> schoolRepository -> deleteSchool($schoolId);

        $this->message = ['Usunięto szkołę.'];
        return $this->render('delete-school', ['messages' => $this->message]);
    }

}