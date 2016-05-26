<?php

/**
 * Created by PhpStorm.
 * User: zabdi
 * Date: 5/25/16
 * Time: 11:20 PM
 */
class Tarea_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    public function getAll(){
        $query = $this->db->get('tareas');
        return $query->result_Array();
    }
    public function get($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tareas');
        return $query->result_Array();
    }
    public function alumnos($id){
        $this->db->select('*');
        $this->db->from('alumnos');
        $this->db->join('tarea_alumno', 'alumnos.matricula = tarea_alumno.id_alumno');
        $this->db->join('tareas', 'tareas.id= tarea_alumno.id_tarea');
        $this->db->where('tareas.id', $id);
        $query = $this->db->get();
        return $query->result_Array();
    }
    public function create($titulo,$descripcion,$entrega,$id_maestro,$alumnos){
        $data = array(
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'entrega' => $entrega,
            'id_maestro' => $id_maestro
        );
        $this->db->insert('tareas', $data);
        // TODO : GET INSERTED ID, insert on tarea_alumno and returns something
        $this->db->where($data);
        $query = $this->db->get('tareas');
        $id_tarea =$query->result_Array()[0]['id'];
        $alumnos_array = explode(',',$alumnos);
        $query_insert_alumnos_tareas = array();
        foreach ($alumnos_array as $alumno) {
            array_push($query_insert_alumnos_tareas, array(
                    'id_tarea' => (int)$id_tarea,
                    'id_alumno'=> (int)$alumno,
                )
            );
        }
        $this->db->insert_batch('tarea_alumno', $query_insert_alumnos_tareas);
    }
    public function rate($id, $calificacion, $observacion, $terminado){
        $data = array(
            'id' => $id,
            'calificacion'  => $calificacion,
            'observacion'  => $observacion,
            'terminado'  => $terminado
        );
        $this->db->replace('tarea_alumno', $data);
    }
}