


<div id="tabela-tarefas">
                <header>
                    <div class="h-id">ID</div>
                    <div class="h-ordem"></div>
                    <div class="h-nome">Nome</div>
                    <div class="h-custo">Custo</div>
                    <div class="h-data-limite">Data Limite</div>
                    <div class="h-data-acoes"></div>
                </header>
                <?php foreach($tarefas as $tarefa) :?>
                    <div class="tarefa <?php echo $tarefa['custo'] > 1000 ? 'maior' : ''; ?>">
                        <div class="tarefa-id"><?= $tarefa['id'] ?></div>
                        <div class="tarefa-ordem">
                            <button class="btn-up" onclick="moveUp(this)" >
                                <span class="material-symbols-outlined icon">
                                    keyboard_arrow_up
                                </span>
                            </button>
                            <button class="btn-down" onclick="moveDown(this)" >
                                <span class="material-symbols-outlined icon">
                                    keyboard_arrow_down
                                </span>
                            </button>
                        </div>
                        <div class="tarefa-nome"><?= $tarefa['nome'] ?></div>
                        <div class="tarefa-custo" >R$ <?= $tarefa['custo'] ?></div>
                        <div class="tarefa-data-limite"><?= $tarefa['data_limite'] ?></div>
                        <div class="tarefa-acoes">
                            <button class="btn-edit" data-nome="<?php echo $tarefa['nome']; ?>" data-custo="<?php echo $tarefa['custo']; ?>" data-limite="<?php echo $tarefa['data_limite']; ?>"data-id="<?php echo $tarefa['id']; ?>">
                                <span class="material-symbols-outlined icon edit">
                                    edit_square
                                </span>
                            </button>
                            <span class="material-symbols-outlined icon delete" onclick="excluir(<?= $tarefa['id'] ?>)">
                                delete
                            </span>
                        </div>
                    </div>
                <?php endforeach ?>
                

                <div class="add">
                    <a href="?pg=cadastrar" class="btn-add">Adicionar Tarefa</a> 
                </div>

            </div>


            <dialog id="dialogExcluir">
                   <div class="dialog-header">
                        <div class="dialog-header-titulo">
                            <h4>REMOVER TAREFA</h4>
                        </div>
                        <span class="material-symbols-outlined close" onclick="closeDialog()">
                            disabled_by_default
                        </span>
                   </div>
                   <div id="dialog-conteudo">

                   </div>
            </dialog>

            <dialog id="dialogEditar">
                <div class="dialog-header">
                    <div class="dialog-header-titulo">
                        <h4>EDITAR TAREFA</h4>
                    </div>
                    <span class="material-symbols-outlined close" onclick="closeDialog()">
                        disabled_by_default
                    </span>
                </div>

                <div id="dialog-form">
                    <form action="?pg=cadastrar&salvar=true" method="post">
                    <div class="form-input">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div class="form-input">
                        <label for="custo">Custo:</label>
                        <input type="number" name="custo" step="0.1" id="custo" placeholder="ex: 1000,00">
                    </div>
                    <div class="form-input">
                        <label for="data_limite">Data Limite:</label>
                        <input type="date" name="data_limite" id="data_limite">
                    </div>
                    <button type="submit" class="btn-add" >Editar</button>
                    </form>
                </div>

            </dialog>


<script>
    
    //Modal Excluir
    function excluir(id){
        const dialogExcluir = document.getElementById('dialogExcluir');
        const dialogConteudo = document.getElementById('dialog-conteudo');
        dialogExcluir.showModal();
        
        dialogConteudo.innerHTML = `
        <p>Tem certeza que deseja remover a tarefa com<strong> id ${id} </strong>?</p>
        <div class='dialog-btn'>
            <a href='index.php?excluir=true&id=${id}' class='btn-confirmar sim'>Sim</a>
            <a href='#' class='btn-confirmar nao' onclick='closeDialog()'>Não</a>
        </div>
        `;
    }
    
    // Modal Editar
        const dialogEditar = document.getElementById('dialogEditar');
    
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', () =>{
                document.getElementById('nome').value = button.getAttribute('data-nome');
                document.getElementById('custo').value = button.getAttribute('data-custo');
                document.getElementById('data_limite').value = button.getAttribute('data-limite');
                dialogEditar.showModal();
            })

        })
        


        

    
    function closeDialog(){
        dialogExcluir.close();
        dialogEditar.close();
    }

    //Reordenar tarefas
    function moveUp(button){
        const tarefa = button.parentElement.parentElement;
        
        if (tarefa.previousElementSibling === null || !tarefa.previousElementSibling.classList.contains("tarefa")){
            return;
        }

        const tarefaAnterior = tarefa.previousElementSibling

        tarefa.parentNode.insertBefore(tarefa,tarefaAnterior);

        atualizaBotoes();
    }

    function moveDown(button){
        const tarefa = button.parentElement.parentElement;
        
        if(tarefa.nextElementSibling == null || !tarefa.nextElementSibling.classList.contains("tarefa")){
            return;
        }

        const proximaTarefa = tarefa.nextElementSibling;
        
        tarefa.parentNode.insertBefore(proximaTarefa, tarefa);

        atualizaBotoes();
    }

    function atualizaBotoes(){
        const tarefas = document.querySelectorAll('.tarefa');

        tarefas.forEach((tarefa, i) => {
            const upButton = tarefa.querySelector('.btn-up');
            const downButton = tarefa.querySelector('.btn-down');
            
            upButton.style.visibility = i === 0 ? 'hidden' : 'visible';
            downButton.style.display = i === tarefas.length - 1 ? 'none' : 'inline-block';
        });
    }

    atualizaBotoes();

</script>

