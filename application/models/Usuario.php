<?php
class Usuario extends CI_Model
{
    function obtenerPorUsuarioPassword($usuario_usu, $password_usu)
    {
        $this->db->where("usuario_usu", $usuario_usu);
        $this->db->where("password_usu", md5($password_usu));
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function obtenerPorCodigo($codigo_usu)
    {
        $this->db->where("codigo_usu", $codigo_usu);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function actualizar($data, $codigo_usu)
    {
        $this->db->where("codigo_usu", $codigo_usu);
        return $this->db->update("usuario", $data);
    }



    function obtenerTodos()
    {
        $query = $this->db->get("usuario");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
