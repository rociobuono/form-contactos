<?php

class Usuarios_model extends CI_Model {
    public function get_by_id($id)
    {
        $this->db->select("usuarios.*");
        $this->db->from("usuarios");
        $this->db->where("usuario_id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function check_login($usuarios, $password){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$usuarios);
        $this->db->where("password", md5($password));
        $query = $this->db->get("usuarios");
        if ($query->num_rows() > 0) {
            $tmp = $query->row_array();
            return $tmp["usuario_id"];
        } else {
            return false;
        }
    }
}