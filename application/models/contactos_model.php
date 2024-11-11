<?php

class Contactos_model extends CI_Model
{
    private $usuario_id = null;
    public function set_usuario_id($valor)
    {
        $this->usuario_id = $valor;
    }
    public function listar()
    {
        $this->db->select('contactos.*');
        $this->db->from('contactos');
        $this->db->where('usuario_id', $this->usuario_id);
        $this->db->order_by('apellido', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function nuevo($nombre, $apellido, $correo, $telefono, $uid)
    {
        $this->db->set('nombre', $nombre);
        $this->db->set('apellido', $apellido);
        $this->db->set('correo', $correo);
        $this->db->set('telefono', $telefono);
        $this->db->set('usuario_id', $uid);
        $this->db->insert('contactos');

        return $this->db->insert_id(); //devuelve que inserto la ultima consulta
    }

    public function borrar($cid)
    {
        $this->db->where("contacto_id", $cid);
        $this->db->delete("contactos");
        return $this->db->affected_rows();
    }
}