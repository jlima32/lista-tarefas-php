<?php

include_once 'DAO/TarefaDAO.php';

$tarefas = new TarefaDAO();

var_dump($tarefas->listar());