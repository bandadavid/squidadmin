<?php
class Palabra extends CI_Model
{
    function obtenerPorCodigo($codigo_pal)
    {
        $this->db->where("codigo_pal", $codigo_pal);
        $query = $this->db->get('palabra');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function actualizar($data, $codigo_pal)
    {
        $this->db->where("codigo_pal", $codigo_pal);
        return $this->db->update("palabra", $data);
    }

    function obtenerTodos()
    {
        $query = $this->db->get("palabra");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
