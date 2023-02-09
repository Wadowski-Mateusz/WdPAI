<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function grades()
    {
        $this->render('grades');
    }

    public function plan()
    {
        $this->render('plan');
    }
}