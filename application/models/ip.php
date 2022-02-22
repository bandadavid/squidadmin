<?php
class Ip extends CI_Model
{
    function obtenerPorCodigo($codigo_ip)
    {
        $this->db->where("codigo_ip", $codigo_ip);
        $query = $this->db->get('ip');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function actualizar($data, $codigo_ip)
    {
        $this->db->where("codigo_ip", $codigo_ip);
        return $this->db->update("ip", $data);
    }

    function obtenerTodos()
    {
        $query = $this->db->get("ip");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
