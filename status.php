
    

        <?php

        if (isset($_GET['status'])){
            $status = $_GET['status'];
            echo '<div class="status-box">';


            switch($status){
                case 'data':
                    echo "Informe uma data maior ou igual a data de hoje </div>";
                break;
                case 'nome':
                    echo 'Já existe uma tarefa cadastrada com esse nome. </div>';
                break;
                case 'campos':
                    echo "Preencha todos os campos. </div>";
                break;
            }

        }

        ?>  

    

