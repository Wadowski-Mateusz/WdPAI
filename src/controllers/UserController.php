<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private array $message = [];
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }


    public function user(){
        // TODO szukanie usera po id, obecnie jest id przekazywane na sztywno
        $userDetail = $this -> userRepository -> getUserDetail(1);
        $this -> render('user', ['detail' => $userDetail]);
//        $this->render('user', $user);
    }

    public function addUser()
    {

        //TODO ogarnac spam na f5
//        To display this page, Firefox must send information that will repeat any action (such as a search or order confirmation) that was performed earlier.

        // TODO sprawdzić czy plik o podanej nazwie juz istnieje
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $pesel = $_POST['pesel'];
            $email = 'userController.adduser()';
            $password = 'userController.adduser()';
            //TODO zmienic to na usera i user detail
            $user = new User($pesel, $email, $password, $_POST['name'], $_POST['surname']/*, $_FILES['file']['name']*/);
            $userDetail = new UserDetail('','','','','',20,'',);
            echo 'Sukces, dodano >'.$_POST['name'].'< do bazy';
            $this -> userRepository -> addUser($pesel, $userDetail);
            return $this->render('add-user', ['messages' => $this->message]);
        }
        return $this->render('add-user', ['messages' => $this->message]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

}