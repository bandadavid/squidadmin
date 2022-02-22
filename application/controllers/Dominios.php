<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dominios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dominio');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata("Conectad0")) {
            redirect("security/logout");
        }
    }

    public function index()
    {
        $dominios = new grocery_CRUD();


        $dominios->set_table('dominio');
        $dominios->set_subject('Dominio');
        $dominios->columns('codigo_dom', 'nombre_dom', 'dominio_dom', 'estado_dom', 'observacion_dom', 'fecha_creacion_dom', 'fk_id_usu');
        $dominios->display_as('codigo_dom', 'COD');
        $dominios->display_as('nombre_dom', 'Nombre');
        $dominios->display_as('dominio_dom', 'Dominio');
        $dominios->display_as('estado_dom', 'Estado');
        $dominios->display_as('observacion_dom', 'Observaciones');
        $dominios->display_as('fecha_creacion_dom', 'Fecha Creacion Dominio');
        $dominios->display_as('fk_id_usu', 'Usuario Restringido');


        $dominios->set_language("spanish");
        $dominios->set_theme("flexigrid");

        $dominios->unset_clone();
        $dominios->unset_delete();

        $dominios->field_type('estado_dom', 'dropdown', array("ACTIVO" => "ACTIVO", "INACTIVO" => "INACTIVO"));

        $dominios->fields('nombre_dom', 'dominio_dom', 'estado_dom', 'observacion_dom', 'fk_id_usu');
        $dominios->required_fields('nombre_dom', 'dominio_dom', 'estado_dom', 'observacion_dom', 'fk_id_usu');

        $dominios->set_relation('fk_id_usu', 'usuario', 'nombre_usu');

        $output = $dominios->render();
        $this->load->view('header');
        $this->load->view('dominios/index', $output);
        $this->load->view('footer');
    }
}
