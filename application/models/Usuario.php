<?php
class Usuario extends CI_Model
{
    function obtenerTodos()
    {
        $query = $this->db->get("squidadmin_usuarios");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
