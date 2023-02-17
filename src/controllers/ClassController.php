<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/ClassInSchool.php';
require_once __DIR__.'/../repository/ClassRepository.php';
class ClassController extends AppController {

    private array $message = [];
    private ClassRepository $classRepository;
    private UserRepository $userRepository;


    public function __construct() {
        parent::__construct();
        $this->classRepository = new ClassRepository();
        $this->userRepository = new UserRepository();
    }

    public function panelClasses(){
        $classes = $this->classRepository->getClassesFromSchool( $this->userRepository->getUserSchoolId() );

        return $this->render('panel-classes', ['classes' => $classes]);
    }


    public function addClass() {

//        #TODO NAUCZYCIEL

        if (!$this->isPost())
        return $this->render('add-class');

        $name = $_POST['name'];

        if ($name == '') {
            $this->message = ['Uzupełnij brakujące pola!'];
            return $this->render('add-class', ['messages' => $this->message]);
        }

        $schoolId = (new UserRepository())->getUserSchoolId();

        $class = new ClassInSchool(-1, null, $name, $schoolId);

        if (!$this->classRepository->isInBase($class)) {
            $this->classRepository->addClass($class);
            $this->message = ['Dodano klasę.'];
        }
        else
            $this->message = ['Klasa już istnieje.'];
        return $this->render('add-class', ['messages' => $this->message]);
    }

    public function searchClass() {
        $schoolId = $this->userRepository->getUserSchoolId();

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->classRepository->searchClass($schoolId, $decoded['search']));
        }
    }

    public function studentsFromClass(int $classId, string $searchFor){
        // TODO
     }

}