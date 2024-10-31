


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
                    <div class="tarefa">
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
                            <span class="material-symbols-outlined icon delete">
                                delete
                            </span>
                        </div>
                    </div>
                <?php endforeach ?>
                

                <div class="add">
                    <a href="?pg=cadastrar" class="btn-add">Adicionar Tarefa</a> 
                </div>

            </div>