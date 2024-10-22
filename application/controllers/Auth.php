<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'Usuario', 'trim|strtolower|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $this->load->model('usuarios_model');
            $usuario = set_value("usuario");
            $password = set_value("password");
            if ($uid = $this->usuarios_model->check_login($usuario, $password)) {
                $u = $this->usuarios_model->get_by_id($uid);
                $this->session->set_userdata("usuario", $u["usuario"]);
                    $this->session->set_userdata("rol_id", $u["rol_id"]);
                    redirect('contactos');
            } else {
                $this->session->set_flashdata("OP", "INCORRECTO");
                redirect('auth/login');
            }
        }
    }
}