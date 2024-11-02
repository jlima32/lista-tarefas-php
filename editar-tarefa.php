<?php
include_once 'DAO/TarefaDAO.php';

$dataAtual = date('Y-m-d');
$tarefaDao = new TarefaDAO();



if(isset($_GET['salvar'])){
    
    // Verifica se a data é menor que a data atual
    if($_POST['data_limite'] < $dataAtual){
        header("Location: index.php?status=data");
    }else{
        //Verifica se existe campos vazios
        if (!isset($_POST['nome']) || ($_POST['nome'] == '') || !isset($_POST['custo']) || ($_POST['custo'] == '') || !isset($_POST['data_limite'])){
            header("Location: index.php?status=campos");
        }else{
            $row = $tarefaDao->verificarNome(trim($_POST['nome']), $_POST['id']) > 0;
            if($row){
                header("Location: index.php?status=nome");
            }else{
            $dados = array(
                'nome' => trim($_POST['nome']),
                'custo' => $_POST['custo'],
                'data_limite' => $_POST['data_limite'],
                'id' => $_POST['id']
            );

            $tarefaDao->editar($dados);
            header("Location: index.php");
            }
        }
    }

}   