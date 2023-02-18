<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController {

    const MAX_FILE_SIZE = 1024 * 2048;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private array $message = [];
    private UserRepository $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function user() {
        $userDetail = $this->userRepository->getDetailOfUser($_COOKIE['userId']);
        $schoolController = new SchoolController();
        $this->render('user', ['detail' => $userDetail]);
    }

    public function addUser() {
        if (!$this->isPost())
            return $this->render('add-user');

        $pesel = $_POST['pesel'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $role = $_POST['roles'];

        if($pesel === '' || $surname === '' || $name === '') {
            $this -> message = ['Uzupełnij brakujące pola!'];
            return $this->render('add-user', ['messages' => $this->message]);
        }

        $schoolId = ($role==='director') ? $_POST['schools'] :  $this->userRepository->getUserSchoolId();
        if($role === "2" && $schoolId == -1) {
            $this -> message = ['Wybierz szkołę!'];
            return $this->render('add-user', ['messages' => $this->message]);
        }

        if($this->userRepository->isInBase($pesel)){
            $this->message = ['Użytkownik o podanym numerze PESEL znajduję się w bazie!'];
            return $this->render('add-user', ['messages' => $this->message]);
        }

        $file = $_FILES['file'];
        if(strlen($file['tmp_name']) > 0)
            if (!$this->validateFile($file))
                return $this->render('add-user', ['messages' => $this->message]);
        $avatarPath = $this->filename($file);

        move_uploaded_file(
            $file['tmp_name'],
            dirname(__DIR__) . self::UPLOAD_DIRECTORY . $avatarPath
        );

        $birthday = $this -> peselToBirthday($pesel);

        $user = new User($pesel, $this->generatePassword($pesel));
        $userDetail = new UserDetail($birthday, $name, $surname, $schoolId, $avatarPath);

        $userId = $this -> userRepository -> addUser($user, $userDetail, $role);

        if($role==='4')
            $this->addUserToClass($userId, $_POST['classes']);

        $this->message[] = 'Pomyślnie dodano użytkownika do bazy.';
        return $this->render('add-user', ['messages' => $this->message]);
    }

    private function validateFile(array $file): bool {

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }

        if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
            $this->message[] = 'Bad file.';
            return false;
        }

        return true;
    }

    private function filename(array $file): string {
        if (strlen($file['tmp_name']) == 0)
            return (intval($_POST['pesel'][9]) % 2) ? 'default_man.png' : 'default_woman.png';
        return md5($_POST['pesel']).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
    }

    private function generatePassword(string $pesel) {
        return md5(substr(md5($pesel), 0, 12));
    }

    private function peselToBirthday($pesel): string {

        switch ($pesel[3]) {
            case '8':
                return '18'.substr($pesel,0,2).'-0'.$pesel[4].'-'.substr($pesel,4,2);
            case '9':
                return '18'.substr($pesel,0,2).'-1'.$pesel[4].'-'.substr($pesel,4,2);
            case '0':
                return '19'.substr($pesel,0,2).'-0'.$pesel[4].'-'.substr($pesel,4,2);
            case '1':
                return '19'.substr($pesel,0,2).'-1'.$pesel[4].'-'.substr($pesel,4,2);
            case '2':
                return '20'.substr($pesel,0,2).'-0'.$pesel[4].'-'.substr($pesel,4,2);
            case '3':
                return '20'.substr($pesel,0,2).'-1'.$pesel[4].'-'.substr($pesel,4,2);
            case '4':
                return '21'.substr($pesel,0,2).'-0'.$pesel[4].'-'.substr($pesel,4,2);
            case '5':
                return '21'.substr($pesel,0,2).'-1'.$pesel[4].'-'.substr($pesel,4,2);
            case '6':
                return '22'.substr($pesel,0,2).'-0'.$pesel[4].'-'.substr($pesel,4,2);
            case '7':
                return '22'.substr($pesel,0,2).'-1'.$pesel[4].'-'.substr($pesel,4,2);
        }
        return '';
    }

    private function addUserToClass(int $userId, int $classId){
        $this -> userRepository -> addUserToClass($userId, $classId);
    }
}