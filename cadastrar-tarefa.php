<?php

include_once 'DAO/TarefaDAO.php';
$tarefaDao = new TarefaDAO();
$tarefas = $tarefaDao->listar();
$dataAtual = date('Y-m-d');

if(isset($_GET['salvar'])){
    // Verifica se existe tarefa cadastrada no banco de dados
    if(count($tarefas) > 0){
        //se sim, retorna o número do campo ordem da última tarefa
        $orem = $tarefas[count($tarefas)-1]['ordem'];
    }else{
        //caso contrário, ordem recebe 0
        $ordem = 0;
    }

    // Verifica se a data é menor que a data atual
    if($_POST['data_limite'] < $dataAtual){
        echo "Informe uma data maior ou igual a data de hoje";
    }else{
        //Verifica se existe campos vazios
        if (!isset($_POST['nome']) || ($_POST['nome'] == '') || !isset($_POST['custo']) || ($_POST['custo'] == '') || !isset($_POST['data_limite'])){
            echo "Preencha todos os campos";
        }else{
            $dados = array(
                'nome' => $_POST['nome'],
                'custo' => $_POST['custo'],
                'data_limite' => $_POST['data_limite'],
                'ordem' => $ordem + 1
            );

            $tarefaDao->inserir($dados);
            echo "Tarefa adicionada";
        }
    }
}


?>


<form action="?salvar=true" method="post">
    <input type="text" name="nome">
    <input type="number" name="custo" step="0.1">
    <input type="date" name="data_limite" id="">
    <button type="submit">Adicionar</button>
</form>