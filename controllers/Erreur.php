<?php

class Erreur extends Controller{
    protected $exception;

    public function __construct(Exception $e) {
        $this->exception = $e;
    }

    public function index(){
        $message = $this->exception->getMessage();
        $type_message = "danger";
        $this->render('index', compact('message', 'type_message'));
    }

}