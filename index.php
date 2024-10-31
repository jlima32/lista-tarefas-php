
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <main>
        <div id="lista-tarefas">
            <header>
                <h1><a href="index.php">Lista de Tarefas</a></h1>
            </header>
            
            <?php 
                include_once 'DAO/TarefaDAO.php';
                
                $tarefaDao = new TarefaDAO();
                $tarefas = $tarefaDao->listar();

                $pg = '';

                if(isset($_GET['pg'])){
                    $pg = $_GET['pg'];
                }
                
                if(isset($_GET['excluir'])){
                    $tarefaDao->excluir($_GET['id']);
                    header("Location: index.php");
                }
            
                
                switch($pg){
                    case 'cadastrar':
                        include 'cadastrar-tarefa.php';
                        break;
                    default:
                        include 'home.php';
                }
            ?>

        </div>
    </main>
</body>
</html>