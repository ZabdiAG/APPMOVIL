<?php

/**
 * Created by PhpStorm.
 * User: zabdi
 * Date: 5/25/16
 * Time: 9:48 PM
 */
class Alumno extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Alumno_model');
        header('Content-type: application/json');
    }
    public function index(){
        echo json_encode($this->Alumno_model->getAll() );
    }
    public function get($matricula){
        echo json_encode( $this->Alumno_model->get($matricula) );
    }
    public function tareas($matricula){
        echo json_encode( $this->Alumno_model->tareas($matricula) );
    }
}