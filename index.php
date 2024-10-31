<?php

include_once 'DAO/TarefaDAO.php';

$tarefas = new TarefaDAO();

echo "<pre>";
var_dump($tarefas->listar());
echo "</pre>";