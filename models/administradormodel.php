<?php
require_once("models/cliente.php");
require_once("models/direccion.php");


class AdministradorModel extends Model
{
    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->db->conexion();
    }

    function consultarCliente($idCliente)
    {
        $cliente = new Cliente();

        $sql = "
        select idCliente,nombre,apellido from cliente where estado = true and idCliente = '$idCliente';
        ";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cliente->idCliente = $row['idCliente'];
                $cliente->nombre = $row['nombre'];
                $cliente->apellido = $row['apellido'];
            }
        }
        //mysqli_close($this->conn);
        return $cliente;
    }

    function consultarClientes()
    {
        $clientes = [];

        $sql = "
        select idCliente,nombre,apellido from cliente where estado = true;
        ";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cliente = new Cliente();
                $cliente->idCliente = $row['idCliente'];
                $cliente->nombre = $row['nombre'];
                $cliente->apellido = $row['apellido'];

                array_push($clientes, $cliente);
            }
        }
        //mysqli_close($this->conn);
        return $clientes;
    }

    function guardarCliente($nombre, $apellido)
    {
        $exito = false;
        $sql = "insert into cliente(nombre,apellido,estado)
        values('$nombre','$apellido',true);";
        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        //$this->conn->close();
        return $exito;
    }

    function actualizarDireccion($idDireccion,$direccion)
    {
        $exito = false;
        $sql = "update direccion set direccion = '$direccion'
        where idDireccion = '$idDireccion';";
        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        //$this->conn->close();
        return $exito;
    }

    function actualizarCliente($nombre,$apellido,$idCliente)
    {
        $exito = false;
        $sql = "update cliente set nombre = '$nombre',apellido = '$apellido'
        where idCliente = '$idCliente';";
        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        //$this->conn->close();
        return $exito;
    }

    function obtenerUltimoCliente()
    {
        $sql = "select idCliente
        from cliente
       order by idCliente desc
       limit 1;";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Registro no existe";
        }

        // mysqli_close($this->conn);
        return $row['idCliente'];
    }

    function guardarDireccion($direccion)
    {
        $exito = false;
        $sql = "insert into direccion(direccion)
        values('$direccion');";
        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        //$this->conn->close();
        return $exito;
    }

    function obtenerUltimaDireccion()
    {
        $sql = "select idDireccion
        from direccion
       order by idDireccion desc
       limit 1;";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Registro no existe";
        }

        // mysqli_close($this->conn);
        return $row['idDireccion'];
    }

    function guardarClienteDireccion($idCliente, $idDireccion)
    {
        $exito = false;
        $sql = "insert into cliente_direccion(idCliente,idDireccion)
        values('$idCliente','$idDireccion');";
        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        //$this->conn->close();
        return $exito;
    }

    function borrarCliente($idCliente)
    {
        $exito = false;
        $sql = "update cliente set estado = false where idCliente = $idCliente";

        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error updating record: " . $this->conn->error;
        }

        return $exito;
    }

    function consultarDirecciones($idCliente)
    {
        $direcciones = [];

        $sql = "
        select dr.idDireccion,dr.direccion from direccion dr JOIN
        cliente_direccion cd on dr.idDireccion = cd.idDireccion
        where cd.idCliente ='$idCliente';
        ";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $direccion = new Direccion();
                $direccion->idDireccion = $row['idDireccion'];
                $direccion->direccion = $row['direccion'];

                array_push($direcciones, $direccion);
            }
        }
        //mysqli_close($this->conn);
        return $direcciones;
    }

    function consultarDireccion($idDireccion)
    {
        $direccion = new Direccion();

        $sql = "
        select dr.idDireccion,dr.direccion from direccion dr JOIN
        cliente_direccion cd on dr.idDireccion = cd.idDireccion
        where dr.idDireccion ='$idDireccion';
        ";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $direccion->idDireccion = $row['idDireccion'];
                $direccion->direccion = $row['direccion'];

            }
        }
        //mysqli_close($this->conn);
        return $direccion;
    }


    function borrarClienteDireccion($idDireccion)
    {
        $exito = false;
        $sql = "delete from cliente_direccion where idDireccion = '$idDireccion';";

        if ($this->conn->query($sql) === TRUE) {
            $exito = $this->borrarDireccion($idDireccion);
        } else {
            echo "Error updating record: " . $this->conn->error;
        }

        return $exito;
    }

    
    function borrarDireccion($idDireccion)
    {
        $exito = false;
        $sql = "delete from direccion where idDireccion = '$idDireccion';";

        if ($this->conn->query($sql) === TRUE) {
            $exito = true;
        } else {
            echo "Error updating record: " . $this->conn->error;
        }

        return $exito;
    }
}
