CREATE TABLE tarefas (
    id int AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL UNIQUE,
    custo DECIMAL(7,2) NOT NULL,
    data_limite DATE NOT NULL,
    ordem int NOT NULL UNIQUE,
    
    PRIMARY KEY(id)
)