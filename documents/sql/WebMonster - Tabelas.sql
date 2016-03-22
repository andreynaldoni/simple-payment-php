--CRIAÇÃO DAS TABELAS

CREATE TABLE tb_produto
(
    cd_produto INTEGER NOT NULL AUTO_INCREMENT,
    nm_produto VARCHAR(50) NOT NULL,
    ds_produto VARCHAR(50) NOT NULL,
    vl_produto DECIMAL(10,2) NOT NULL,
    qt_produto INTEGER NOT NULL,
    PRIMARY KEY (cd_produto)
);

CREATE TABLE tb_ingrediente
(
    cd_ingrediente INTEGER NOT NULL AUTO_INCREMENT,
    nm_ingrediente VARCHAR(50) NOT NULL,
    PRIMARY KEY(cd_ingrediente)
);

CREATE TABLE tb_pedido
(
    cd_pedido INTEGER NOT NULL AUTO_INCREMENT,
    vl_total_pedido DECIMAL(10,2) NOT NULL,
    dt_emissao DATETIME,
    PRIMARY KEY(cd_pedido)
);

CREATE TABLE cliente
(
    cd_cliente INTEGER NOT NULL AUTO_INCREMENT,
    nm_cliente VARCHAR(50) NOT NULL,
    nm_email_cliente VARCHAR(100),
    cd_cartao_cliente VARCHAR(30),
    cd_operadora_cartao VARCHAR(30),
    PRIMARY KEY(cd_cliente)
);

--CRIAÇÃO DAS TABELAS DE RESOLUÇÃO

CREATE TABLE ingrediente_produto
(
	cd_produto INTEGER NOT NULL,
    cd_ingrediente INTEGER NOT NULL,
    qt_ingrediente_produto INTEGER NOT NULL
);

CREATE TABLE cliente_pedido
(
	cd_cliente INTEGER NOT NULL,
    cd_pedido INTEGER NOT NULL
);

CREATE TABLE produto_pedido
(
	cd_produto INTEGER NOT NULL,
    cd_pedido INTEGER NOT NULL
);

ALTER TABLE ingrediente_produto
ADD CONSTRAINT FK_PRODUTO_INGREDIENTE_PRODUTO
FOREIGN KEY(cd_produto)
REFERENCES produto(cd_produto);

ALTER TABLE ingrediente_produto
ADD CONSTRAINT FK_INGREDIENTE_INGREDIENTE_PRODUTO
FOREIGN KEY(cd_ingrediente)
REFERENCES ingrediente(cd_ingrediente);

ALTER TABLE cliente_pedido
ADD CONSTRAINT FK_PEDIDO_CLIENTE_PEDIDO
FOREIGN KEY(cd_pedido)
REFERENCES pedido(cd_pedido);

ALTER TABLE cliente_pedido
ADD CONSTRAINT FK_CLIENTE_CLIENTE_PEDIDO
FOREIGN KEY(cd_cliente)
REFERENCES cliente(cd_cliente);

ALTER TABLE produto_pedido
ADD CONSTRAINT FK_PEDIDO_PRODUTO_PEDIDO
FOREIGN KEY(cd_pedido)
REFERENCES pedido(cd_pedido);

ALTER TABLE produto_pedido
ADD CONSTRAINT FK_PRODUTO_PRODUTO_PEDIDO
FOREIGN KEY(cd_produto)
REFERENCES produto(cd_produto);