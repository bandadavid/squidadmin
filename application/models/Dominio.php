<?php
class Dominio extends CI_Model
{
    function obtenerPorCodigo($codigo_dom)
    {
        $this->db->where("codigo_dom", $codigo_dom);
        $query = $this->db->get('dominio');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function actualizar($data, $codigo_dom)
    {
        $this->db->where("codigo_dom", $codigo_dom);
        return $this->db->update("dominio", $data);
    }



    function obtenerTodos()
    {
        $query = $this->db->get("dominio");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
