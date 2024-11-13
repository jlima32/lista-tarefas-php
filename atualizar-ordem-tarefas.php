<?php

header('Content-Type: application/json'); 

include_once 'DAO/TarefaDAO.php';


try{
    $tarefaDao = new TarefaDAO();
    
    $tarefaDao->atualizarOrdemTarefas();

    echo json_encode(["status" => "sucesso", "message" => "Ordem das tarefas atualizada com sucesso"]);

}catch (Exception $e) {

    echo json_encode(["status" => "erro", "message" => $e->getMessage()]);

}
