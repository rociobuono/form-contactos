<?php

class Contactos_model extends CI_Model{
    private $usuario_id = null;
    public function set_usuario_id($valor){
        $this->usuario_id = $valor;
    }
    public function listar(){
        $this->db->select('contactos.*', FALSE);
        $this->db->from('contactos');
        $this->db->order_by('apellido','DESC');
        return $this->db->get()->result_array();
    }
    public function nuevo($nombre,$apellido, $correo, $telefono)
        {
            $this->db->set('nombre', $nombre);
            $this->db->set('apellido', $apellido); 
            $this->db->set('correo', $correo);
            $this->db->set('telefono', $telefono);
            $this->db->insert('contactos');
            
            return $this->db->insert_id(); //devuelve que inserto la ultima consulta
        }
}