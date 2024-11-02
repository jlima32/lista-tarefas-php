<?php
include_once 'DAO/TarefaDAO.php';

$dataAtual = date('Y-m-d');
$tarefaDao = new TarefaDAO();



if(isset($_GET['salvar'])){
    
    // Verifica se a data é menor que a data atual
    if($_POST['data_limite'] < $dataAtual){
        header("Location: index.php?erro=data");
        echo "Informe uma data maior ou igual a data de hoje";
    }else{
        //Verifica se existe campos vazios
        if (!isset($_POST['nome']) || ($_POST['nome'] == '') || !isset($_POST['custo']) || ($_POST['custo'] == '') || !isset($_POST['data_limite'])){
            header("Location: index.php");
            echo "Preencha todos os campos";
        }else{
            $dados = array(
                'nome' => $_POST['nome'],
                'custo' => $_POST['custo'],
                'data_limite' => $_POST['data_limite'],
                'id' => $_POST['id']
            );

            $tarefaDao->editar($dados);
            echo "Tarefa Editada";
            header("Location: index.php");
        }
    }
}
