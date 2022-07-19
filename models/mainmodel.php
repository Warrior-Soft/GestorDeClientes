<?php


class MainModel extends Model
{
    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->db->conexion();
    }

    public function validarUsuario($nombre, $contrasena)
    {

        $sql = "select nombre from usuario
        where nombre = '$nombre' and clave ='$contrasena';";

        $result = mysqli_query($this->conn, $sql);
        $usuario = new stdClass;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $usuario->nombre = $row['nombre'];
        }

        return $usuario;
    }

    
}
