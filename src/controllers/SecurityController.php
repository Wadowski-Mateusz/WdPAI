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

        $user = $userRepository -> getUser($pesel, $password);

        if (!$user)
            return $this->render('login', ['messages' => ['User not found!']]);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/addUser");
    }

    public function deleteCookies(){
        (new UserRepository()) -> logout();

        if (isset($_COOKIE['userId'])) {
            unset($_COOKIE['userId']);
            setcookie('userId', null, -1, '/');
        }
        if (isset($_COOKIE['userRole'])) {
            unset($_COOKIE['userRole']);
            setcookie('userRole', null, -1, '/');
        }

        http_response_code(200);
        $this->render('login');
    }

}