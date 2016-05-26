<?php

/**
 * Created by PhpStorm.
 * User: zabdi
 * Date: 5/25/16
 * Time: 10:38 PM
 */
class Maestro extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Maestro_model');
        header('Content-type: application/json');
    }
    public function index(){

        echo json_encode($this->Maestro_model->getAll() );
    }
    public function get($matricula){
        echo json_encode( $this->Maestro_model->get($matricula) );
    }
    public function tareas($matricula){
        echo json_encode( $this->Maestro_model->tareas($matricula) );
    }
}