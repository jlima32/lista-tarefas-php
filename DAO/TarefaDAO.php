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

    public function excluir($id)
    {
        $sql = "DELETE FROM tarefas WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        
    }
    public function editar($dadosTarefa)
    {
        $sql = "UPDATE tarefas SET nome = ?, custo = ?, data_limite = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dadosTarefa['nome']);
        $stmt->bindValue(2,$dadosTarefa['custo']);
        $stmt->bindValue(3,$dadosTarefa['data_limite']);
        $stmt->bindValue(4,$dadosTarefa['id']);
        $stmt->execute();
    }

    public function verificarNome($nome, $id = null)
    {
        $sql = "SELECT * FROM tarefas WHERE nome = ? ";
        if ($id){
            $sql .= "AND id != ?";
        }
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $nome);
        if($id){
            $stmt->bindValue(2, $id);
        }

        $stmt->execute();
        return $stmt->rowCount();
    }

    public function atualizarOrdemTarefas()
    {
        $dadosTarefa = file_get_contents('php://input');
        $atualizarTarefas = json_decode($dadosTarefa, true);

        usort($atualizarTarefas, function($a,$b){
            return $a['ordem'] <=> $b['ordem'];
        });

        $sql = "UPDATE tarefas SET ordem = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        foreach ($atualizarTarefas as $tarefa){
            $stmt->execute([ 
                $tarefa['ordem'],$tarefa['id']
            ]);
        }

    }

}
