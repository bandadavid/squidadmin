<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata("Conectad0")) {
            redirect("security/logout");
        }
    }

    public function index()
    {
        $usuarios = new grocery_CRUD();


        $usuarios->set_table('usuario')
            ->set_subject('Usuarios')
            ->columns('codigo_usu', 'apellido_usu', 'nombre_usu', 'usuario_usu', 'perfil_usu', 'estado_usu')
            ->display_as('codigo_usu', 'COD')
            ->display_as('apellido_usu', 'Apellido')
            ->display_as('nombre_usu', 'Nombre')
            ->display_as('usuario_usu', 'Usuario')
            ->display_as('perfil_usu', 'Perfil')
            ->display_as('estado_usu', 'Estado')
            ->display_as('password_usu', 'Contraseña');


        $usuarios->set_language("spanish");
        $usuarios->set_theme("flexigrid");

        $usuarios->unset_clone();
        $usuarios->unset_delete();
        $usuarios->field_type('perfil_usu', 'dropdown', array("ADMINISTRADOR" => "ADMINISTRADOR", "INVITADO" => "INVITADO"));
        $usuarios->field_type('estado_usu', 'dropdown', array("ACTIVO" => "ACTIVO", "INACTIVO" => "INACTIVO"));
        $usuarios->field_type('password_usu', 'password');
        $usuarios->fields('apellido_usu', 'nombre_usu', 'usuario_usu', 'password_usu', 'perfil_usu', 'estado_usu');
        $usuarios->required_fields('apellido_usu', 'nombre_usu', 'usuario_usu', 'password_usu', 'perfil_usu', 'estado_usu');
        $usuarios->callback_before_insert(array($this, 'encrypt_password_callback'));

        if ($usuarios->getState() != "add") {
            $usuarios->field_type("password_usu", "hidden");
        }
        $output = $usuarios->render();
        $this->load->view('header');
        $this->load->view('usuarios/index', $output);
        $this->load->view('footer');
    }


    function encrypt_password_callback($post_array)
    {
        $post_array['password_usu'] = md5($post_array['password_usu']);
        return $post_array;
    }
}
