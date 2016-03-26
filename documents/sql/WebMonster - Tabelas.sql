--CRIAÇÃO DAS TABELAS

CREATE TABLE tb_produto
(
    cd_produto INTEGER NOT NULL AUTO_INCREMENT,
    nm_produto VARCHAR(60) NOT NULL,
    ds_produto VARCHAR(100) NOT NULL,
    vl_produto DECIMAL(10,2) NOT NULL,
    qt_produto INTEGER NOT NULL,
    PRIMARY KEY (cd_produto)
);

CREATE TABLE tb_ingrediente
(
    cd_ingrediente INTEGER NOT NULL AUTO_INCREMENT,
    nm_ingrediente VARCHAR(50) NOT NULL,
    ds_ingrediente VARCHAR(100),
    qt_ingrediente INTEGER,
    vl_ingrediente DECIMAL(10,2),
    PRIMARY KEY(cd_ingrediente)
);

CREATE TABLE cliente
(
    cd_cliente INTEGER NOT NULL AUTO_INCREMENT,
    nm_cliente VARCHAR(60) NOT NULL,
    nm_sobrenome VARCHAR(100),
    cd_ddd INTEGER,
    cd_telefone INTEGER,
    ic_tipo_documento VARCHAR(2),
    cd_cpf VARCHAR(15),
    cd_cnpj VARCHAR(15),
    nm_pais VARCHAR(15),
    nm_estado VARCHAR(2),
    nm_cidade VARCHAR(60),
    cd_cep VARCHAR(8),
    nm_bairro VARCHAR(60),
    nm_rua    VARCHAR(80),
    cd_numero INTEGER,
    ds_complemento VARCHAR(40),
    nm_email_cliente VARCHAR(100),
    cd_cartao_cliente VARCHAR(30),
    cd_operadora_cartao VARCHAR(30),
    dt_validade_cartao DATE,
    PRIMARY KEY(cd_cliente)
);

CREATE TABLE tb_pedido
(
    cd_pedido INTEGER NOT NULL AUTO_INCREMENT,
    dt_emissao DATETIME,
    vl_total_pedido DECIMAL(10,2) NOT NULL,    
    ic_cancelado CHAR(2),
    qt_total_parcela INTEGER,
    PRIMARY KEY(cd_pedido)
);

CREATE TABLE tb_pedido_parcela 
(
    cd_pedido INTEGER NOT NULL AUTO_INCREMENT,
    dt_emissao DATETIME,
    cd_parcela INTEGER,
    vl_parcela DECIMAL(10,2),
    PRIMARY KEY(cd_pedido)
)

CREATE TABLE tb_transacao
(
    
)

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