<?php

class MySQL extends PDO
{
    private $host = "";
    private $usuario = "";
    private $senha = "";
    private $db = "";

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db}";

        return parent::__construct($dsn, $this->usuario, $this->senha);
    }
}