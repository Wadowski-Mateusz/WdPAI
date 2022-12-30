<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login(){
        $user = new User('123', 'pokahontas', 'poka', 'hontas');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $pesel = $_POST['pesel'];
        $password = $_POST['password'];

        if($user->getPesel() !== $pesel) {
            return $this->render('login', ['messages' => ['User with this pesel not exist!'.$pesel.'x'.$user->getPesel()]]);
        }

        if($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!'.$password.'x'.$user->getPassword()]]);
        }


        $url = "http://$_SERVER[HTTP_HOST]"; 
        header("Location: {$url}/grades ");


    }

}