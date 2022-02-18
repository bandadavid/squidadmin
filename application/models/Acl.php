<?php
class Acl extends CI_Model
{
    function obtenerPorCodigo($id_acl)
    {
        $this->db->where("id_acl", $id_acl);
        $query = $this->db->get('acls');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function actualizar($data, $id_acl)
    {
        $this->db->where("id_acl", $id_acl);
        return $this->db->update("acls", $data);
    }



    function obtenerTodos()
    {
        $query = $this->db->get("acls");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
