<?php

//namespace repository;

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;

    public function __construct(){  // można przerobić na singleton
        $this ->database = new Database();
    }


}