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
//
////        $pesel = $_POST['pesel'];
//
////        if($this->userRepository->isInBase($pesel)){
////            $this->message = ['Dany przedmiot jest już w bazie!'];
////            return $this->render('add-subject', ['messages' => $this->message]);
////        }
//
//        $file = $_FILES['file'];
//
//        if(strlen($file['tmp_name']) > 0)
//            if (!$this->validateFile($file))
//                return $this->render('add-subject', ['messages' => $this->message]);
//        $avatarPath = $this->filename($file);
//
//        move_uploaded_file(
//            $file['tmp_name'],
//            dirname(__DIR__) . self::UPLOAD_DIRECTORY . $avatarPath
//        );
//
//        $birthday = $this -> peselToBirthday($pesel);
//
//        $user = new User($pesel, $this->generatePassword($pesel));
//        $userDetail = new UserDetail($birthday, '', $_POST['name'], $_POST['surname'], '', 1, $avatarPath);
//        $this->message[] = 'Pomyślnie dodano użytkownika do bazy.';
//        $this -> userRepository -> addUser($user, $userDetail);
//        return $this->render('add-user', ['messages' => $this->message]);
    }

}