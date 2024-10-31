


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
                            <span class="material-symbols-outlined icon">
                                keyboard_arrow_up
                            </span>
                            <span class="material-symbols-outlined icon">
                                keyboard_arrow_down
                            </span>
                        </div>
                        <div class="tarefa-nome"><?= $tarefa['nome'] ?></div>
                        <div class="tarefa-custo">R$ <?= $tarefa['custo'] ?></div>
                        <div class="tarefa-data-limite"><?= $tarefa['data_limite'] ?></div>
                        <div class="tarefa-acoes">
                            <span class="material-symbols-outlined icon edit">
                                edit_square
                            </span>
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


<script>
    const dialogExcluir = document.getElementById('dialogExcluir');
    const dialogConteudo = document.getElementById('dialog-conteudo');
    
    function excluir(id){
        dialogExcluir.showModal();
        dialogConteudo.innerHTML = `
        <p>Tem certeza que deseja remover a tarefa com<strong> id ${id} </strong>?</p>
        <div class='dialog-btn'>
            <a href='index.php?excluir=true&id=${id}' class='btn-confirmar sim'>Sim</a>
            <a href='#' class='btn-confirmar nao' onclick='closeDialog()'>Não</a>
        </div>
        `;
    }

    function closeDialog(){
        dialogExcluir.close();
    }
</script>

