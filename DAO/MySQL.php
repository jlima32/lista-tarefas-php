<?php

class MySQL extends PDO
{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $db = "tarefas";
    private $porta = 3312;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};port={$this->porta};dbname={$this->db}";

        return parent::__construct($dsn, $this->usuario, $this->senha);
    }
}