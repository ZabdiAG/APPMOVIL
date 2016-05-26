<?php

/**
 * Created by PhpStorm.
 * User: zabdi
 * Date: 5/25/16
 * Time: 11:25 PM
 */
class Tarea extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Tarea_model');
        header('Content-type: application/json');
    }
    public function index(){
        echo json_encode($this->Tarea_model->getAll() );
    }
    public function get($id){
        echo json_encode( $this->Tarea_model->get($id) );
    }
    public function alumnos($id){
        echo json_encode( $this->Tarea_model->alumnos($id) );
    }
    public function create(){
        $result = $this->Tarea_model->create($_POST['titulo'],$_POST['descripcion'],$_POST['entrega'],$_POST['id_maestro'],$_POST['alumnos']);
    }
    public function rate(){
        $this->Tarea_model->rate($_POST['id'],$_POST['calificacion'],$_POST['observacion'],$_POST['terminado']);
    }
}