<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contactos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            $this->session->set_flashdata("OP", "PROHIBIDO");
            redirect('auth/login');
        }
        $this->load->model("contactos_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        redirect('contactos/principal');
    }
    public function principal()
    {
        $datos = array();
        $this->contactos_model->set_usuario_id($this->session->userdata('usuario_id'));
        $datos['contactos'] = $this->contactos_model->listar();
        $this->load->view('contactos', $datos);
    }
    public function nuevo()
    {
        /*$nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $email = $this->input->post('correo');
        $tel = $this->input->post('telefono');
        $uid = $this->session->userdata('usuario_id');
        $this->contactos_model->nuevo($nombre, $apellido, $email, $tel, $uid);
        $this->session->set_flashdata('OP', 'OK');
        redirect('contactos/principal');*/
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nombre", "Nombre", "trim|required");
        $this->form_validation->set_rules("apellido", "Apellido", "trim|required");
        $this->form_validation->set_rules("correo", "Correo", "trim|required");
        $this->form_validation->set_rules("telefono", "Telefono", "trim|required");
        $uid = $this->session->userdata('usuario_id');
        if ($this->form_validation->run() == false) {
            redirect('contactos/principal');
        } else {
            $nombre = set_value("nombre");
            $apellido = set_value("apellido");
            $correo = set_value("correo");
            $telefono = set_value("telefono");
            $this->contactos_model->nuevo($nombre, $apellido, $correo, $telefono, $uid);
            $this->session->set_flashdata('OP', 'OK');
            redirect('contactos/principal');
        }
    }

    public function borrar($id)
    {
        $this->contactos_model->borrar($id);
        $this->session->set_flashdata('OP', 'BORRADO');
        redirect('contactos/principal');
    }
}