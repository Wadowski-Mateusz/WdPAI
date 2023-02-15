<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    public function login(){

        $userRepository = new UserRepository();

        if (!$this->isPost())
            return $this->render('login');

        $pesel = $_POST['pesel'];
        $password = $_POST['password'];

        $user = $userRepository -> getUser($pesel);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if($user->getPesel() !== $pesel) {
            return $this->render('login', ['messages' => ['User with this pesel not exist!']]);
        }

        if($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/grades");
    }

}