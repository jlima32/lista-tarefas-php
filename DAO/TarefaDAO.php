<?php

class TarefaDAO
{
    private $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';
        $this->conexao = new MySQL();
    }

    public function listar()
    {
        $sql = "SELECT * FROM tarefas ORDER BY ordem ASC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function inserir($dadosTarefa)
    {
        $sql = "INSERT INTO tarefas (nome, custo, data_limite, ordem) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dadosTarefa['nome']);
        $stmt->bindValue(2,$dadosTarefa['custo']);
        $stmt->bindValue(3,$dadosTarefa['data_limite']);
        $stmt->bindValue(4,$dadosTarefa['ordem']);
        $stmt->execute();
    }

}