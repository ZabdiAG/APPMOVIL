<?php

/**
 * Created by PhpStorm.
 * User: zabdi
 * Date: 5/25/16
 * Time: 10:39 PM
 */
class Maestro_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    public function getAll(){
        $query = $this->db->get('maestros');
        return $query->result_Array();
    }
    public function get($matricula){
        $this->db->where('matricula', $matricula);
        $query = $this->db->get('maestros');
        return $query->result_Array();
    }
    public function tareas($matricula){
        $this->db->select('*');
        $this->db->from('maestros');
        $this->db->join('tareas', 'tareas.id_maestro= maestros.matricula');
        $this->db->where('maestros.matricula', $matricula);
        $query = $this->db->get();
        return $query->result_Array();
    }
}