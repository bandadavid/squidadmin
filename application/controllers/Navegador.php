<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navegador extends CI_Controller
{
    /*public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario');
        $this->load->library('user_agent');
    }*/

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navegador/index');
        $this->load->view('footer');
    }
}
