<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
//        $this->render('login', ['messages'->"hello"]);
    }

    public function grades()
    {
        $this->render('grades');
    }

    public function attendance()
    {
        $this->render('attendance');
    }

    public function remarks()
    {
        $this->render('remarks');
    }

    public function messages()
    {
        $this->render('messages');
    }

    public function plan()
    {
        $this->render('plan');
    }

    ///??????
    public function panel_admin()
    {
        $this->render('panel_admin');
    }

    public function panel_director()
    {
        $this->render('panel_director');
    }

    public function panel_teacher()
    {
        $this->render('panel_teacher');
    }

}