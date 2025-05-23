<?php


if(isset($_GET['salvar'])){
    // Verifica se existe tarefa cadastrada no banco de dados
    if(count($tarefas) > 0){
        //se sim, retorna o número do campo ordem da última tarefa
        $ordem = $tarefas[count($tarefas)-1]['ordem'];
    }else{
        //caso contrário, ordem recebe 0
        $ordem = 0;
    }

        //Verifica se existe campos vazios
        if (!isset($_POST['nome']) || ($_POST['nome'] == '') || !isset($_POST['custo']) || ($_POST['custo'] == '') || !isset($_POST['data_limite'])){
            header("Location: index.php?status=campos");
        }else{
            $row = $tarefaDao->verificarNome($_POST['nome']) > 0;
            if($row){
                header("Location: index.php?status=nome");
            }else{
                $dados = array(
                    'nome' => trim($_POST['nome']),
                    'custo' => $_POST['custo'],
                    'data_limite' => $_POST['data_limite'],
                    'ordem' => $ordem + 1
                );
    
                $tarefaDao->inserir($dados);
                header("Location: index.php");
            }
        }
        
}


?>
    <div id="form">
        <h2>Adicionar Tarefa</h2>
        <form action="?pg=cadastrar&salvar=true" method="post">
            <div class="form-input">
                <label for="nome">Nome:</label>
                <input autofocus type="text" name="nome" id="nome" required>
            </div>
            <div class="form-input">
                <label for="custo">Custo:</label>
                <input type="number" name="custo" step="0.01" id="custo" placeholder="ex: 1000,00" required>
            </div>
            <div class="form-input">
                <label for="data_limite">Data Limite:</label>
                <input type="date" name="data_limite" id="data_limite" required>
            </div>
            <button type="submit" class="btn-add" >Adicionar</button>
        </form>
    </div>