<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Palabras extends CI_Controller
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
        $palabras = new grocery_CRUD();


        $palabras->set_table('palabra');
        $palabras->set_subject('Palabras');
        $palabras->columns('codigo_pal', 'nombre_pal', 'palabra_pal', 'estado_pal', 'observacion_pal', 'fecha_creacion_pal', 'fk_id_usu');
        $palabras->display_as('codigo_pal', 'COD');
        $palabras->display_as('nombre_pal', 'Nombre');
        $palabras->display_as('palabra_pal', 'Palabras');
        $palabras->display_as('estado_pal', 'Estado');
        $palabras->display_as('observacion_pal', 'Observaciones');
        $palabras->display_as('fecha_creacion_pal', 'Fecha Creacion Palabras');
        $palabras->display_as('fk_id_usu', 'Usuario Restringido');


        $palabras->set_language("spanish");
        $palabras->set_theme("flexigrid");

        $palabras->unset_clone();
        $palabras->unset_delete();

        $palabras->field_type('estado_pal', 'dropdown', array("ACTIVO" => "ACTIVO", "INACTIVO" => "INACTIVO"));

        $palabras->fields('nombre_pal', 'palabra_pal', 'estado_pal', 'observacion_pal', 'fk_id_usu');
        $palabras->required_fields('nombre_pal', 'palabra_pal', 'estado_pal', 'observacion_pal', 'fk_id_usu');

        $palabras->set_relation('fk_id_usu', 'usuario', 'nombre_usu');

        $output = $palabras->render();
        $this->load->view('header');
        $this->load->view('palabras/index', $output);
        $this->load->view('footer');
    }
}
