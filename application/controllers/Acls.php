<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acls extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('acl');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata("Conectad0")) {
            redirect("security/logout");
        }
    }

    public function index()
    {
        $acls = new grocery_CRUD();


        $acls->set_table('acls')
            ->set_subject('Acls')
            ->columns('id_acl', 'nombre_acl', 'expresiones_acl', 'estado_acl', 'observacion_acl', 'fecha_creacion_acl', 'fk_id_usu')
            ->display_as('id_acl', 'COD')
            ->display_as('nombre_acl', 'Nombre')
            ->display_as('expresiones_acl', 'Expresiones ACLS')
            ->display_as('estado_acl', 'Estado')
            ->display_as('observacion_acl', 'Observaciones')
            ->display_as('fecha_creacion_acl', 'Fecha Creacion ACLS')
            ->display_as('fk_id_usu', 'Usuario Restringido');


        $acls->set_language("spanish");
        $acls->set_theme("flexigrid");

        $acls->unset_clone();
        $acls->unset_delete();

        $acls->field_type('estado_acl', 'dropdown', array("ACTIVO" => "ACTIVO", "INACTIVO" => "INACTIVO"));

        $acls->fields('nombre_acl', 'expresiones_acl', 'estado_acl', 'observacion_acl', 'fk_id_usu');
        $acls->required_fields('nombre_acl', 'expresiones_acl', 'estado_acl', 'observacion_acl', 'fk_id_usu');

        $acls->set_relation('fk_id_usu', 'usuario', 'nombre_usu');

        $output = $acls->render();
        $this->load->view('header');
        $this->load->view('acls/index', $output);
        $this->load->view('footer');
    }
}
