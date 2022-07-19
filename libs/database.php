<?php
class Database
{
    private $host;
    private $db;
    private $password;
    private $user;
    //private $charset;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->password = constant('PASSWORD');
        $this->user = constant('USER');
        // $this->charset = constant('CHARSET');
    }

    public function conexion()
    {
        $conn = new mysqli($this->host, $this->user, $this->password,  $this->db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
