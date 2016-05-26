<?php

/**
 * Created by PhpStorm.
 * User: zabdi
 * Date: 5/25/16
 * Time: 9:45 PM
 */
class Alumno_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    public function getAll(){
        $query = $this->db->get('alumnos');
        return $query->result_Array();
    }
    public function get($matricula){
        $this->db->where('matricula', $matricula);
        $query = $this->db->get('alumnos');
        return $query->result_Array();
    }
    public function tareas($matricula){
        $this->db->select('*');
        $this->db->from('alumnos');
        $this->db->join('tarea_alumno', 'alumnos.matricula = tarea_alumno.id_alumno');
        $this->db->join('tareas', 'tareas.id= tarea_alumno.id_tarea');
        $this->db->where('matricula', $matricula);
        $query = $this->db->get();
        return $query->result_Array();
    }
}