<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ips extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ip');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata("Conectad0")) {
            redirect("security/logout");
        }
    }

    public function index()
    {
        $ips = new grocery_CRUD();


        $ips->set_table('ip');
        $ips->set_subject('Ips');
        $ips->columns('codigo_ip', 'nombre_ip', 'palabra_ip', 'estado_ip', 'observacion_ip', 'fecha_creacion_ip', 'fk_id_usu');
        $ips->display_as('codigo_ip', 'COD');
        $ips->display_as('nombre_ip', 'Nombre');
        $ips->display_as('palabra_ip', 'Palabras');
        $ips->display_as('estado_ip', 'Estado');
        $ips->display_as('observacion_ip', 'Observaciones');
        $ips->display_as('fecha_creacion_ip', 'Fecha Creacion Palabras');
        $ips->display_as('fk_id_usu', 'Usuario Restringido');


        $ips->set_language("spanish");
        $ips->set_theme("flexigrid");

        $ips->unset_clone();
        $ips->unset_delete();

        $ips->field_type('estado_ip', 'dropdown', array("ACTIVO" => "ACTIVO", "INACTIVO" => "INACTIVO"));

        $ips->fields('nombre_ip', 'palabra_ip', 'estado_ip', 'observacion_ip', 'fk_id_usu');
        $ips->required_fields('nombre_ip', 'palabra_ip', 'estado_ip', 'observacion_ip', 'fk_id_usu');

        $ips->set_relation('fk_id_usu', 'usuario', 'nombre_usu');

        $output = $ips->render();
        $this->load->view('header');
        $this->load->view('ips/index', $output);
        $this->load->view('footer');
    }
}
