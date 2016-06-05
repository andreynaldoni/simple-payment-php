-- CRIAÇÃO DAS TABELAS

CREATE TABLE tb_produto
(
    cd_produto   INTEGER NOT NULL AUTO_INCREMENT,
    nm_produto   VARCHAR(60) NOT NULL,
    ds_produto   VARCHAR(100) NOT NULL,
    vl_produto   DECIMAL(10,2) NOT NULL,
    qt_produto   INTEGER NOT NULL,
    im_produto   VARCHAR(25),
    cd_categoria INTEGER,
    PRIMARY KEY (cd_produto)
);

CREATE TABLE tb_ingrediente
(
    cd_ingrediente INTEGER NOT NULL AUTO_INCREMENT,
    nm_ingrediente VARCHAR(50) NOT NULL,
    ds_ingrediente VARCHAR(100),
    qt_ingrediente INTEGER,
    vl_ingrediente DECIMAL(10,2),
    cd_categoria   INTEGER,
    PRIMARY KEY(cd_ingrediente)
);

CREATE TABLE tb_cliente
(
    cd_cliente 			INTEGER NOT NULL AUTO_INCREMENT,
    nm_cliente 			VARCHAR(60) NOT NULL,
    nm_sobrenome 		VARCHAR(100),
    ic_admin_usuario    CHAR(1),
    dt_nascimento       DATE,
    cd_telefone 		INTEGER,
    cd_celular 		    BIGINT,
    ic_tipo_documento 	VARCHAR(2),
    cd_cpf 				VARCHAR(15),
    cd_cnpj 			VARCHAR(15),
    nm_pais 			VARCHAR(15),
    sg_estado 			CHAR(2),
    nm_cidade 			VARCHAR(60),
    cd_cep 				VARCHAR(8),
    nm_bairro 			VARCHAR(60),
    nm_rua    			VARCHAR(80),
    cd_numero 			INTEGER,
    ds_complemento 		VARCHAR(40),
    nm_email_cliente 	VARCHAR(100),
    cd_cartao_cliente 	VARCHAR(30),
    cd_operadora_cartao VARCHAR(30),
    dt_validade_cartao 	DATE,
    cd_senha			varchar(32),
    PRIMARY KEY(cd_cliente)
);

CREATE TABLE tb_pedido
(
    cd_pedido 			INTEGER NOT NULL AUTO_INCREMENT,
    dt_emissao 			DATETIME,
    vl_total_pedido 	DECIMAL(10,2) NOT NULL,   
    ic_cancelado 		CHAR(2),
    qt_total_parcela 	INTEGER,
    ds_pedido           VARCHAR(200),
    cd_cliente			INTEGER,
    PRIMARY KEY(cd_pedido)
);

CREATE TABLE tb_parcela 
(
    cd_pedido 	INTEGER NOT NULL AUTO_INCREMENT,
    dt_emissao 	DATETIME,
    cd_parcela 	INTEGER,
    vl_parcela 	DECIMAL(10,2),
    PRIMARY KEY(cd_pedido)
);

/*CREATE TABLE tb_transacao
(
 cd_transacao  			INTEGER NOT NULL AUTO_INCREMENT,
 cd_pedido 				INTEGER,
 cd_emissao 			INTEGER,
 dt_emissao 			DATETIME,
 nm_transacao 			VARCHAR(60),
 ic_tipo_pagamento 		VARCHAR(15),
 dt_transacao 			DATETIME,
 dt_ult_evento 			DATETIME,
 cd_ident_transacao 	INTEGER,
 ic_status_transacao 	INTEGER,
 nm_metodo_pagamento 	VARCHAR(60),
 PRIMARY KEY(cd_transacao)
);*/

-- CRIAÇÃO DAS TABELAS DE RESOLUÇÃO

CREATE TABLE tb_produto_pedido
(
	cd_produto_pedido		INTEGER NOT NULL AUTO_INCREMENT,
    cd_pedido 				INTEGER NOT NULL,
	cd_produto 				INTEGER NOT NULL,
    vl_total_produto_pedido DECIMAL(10,2),   
    ds_obs      			VARCHAR(200), 
    qt_produto_pedido 		INTEGER,
    PRIMARY KEY(cd_produto_pedido)        
);

CREATE TABLE tb_categoria
(
	cd_categoria INTEGER PRIMARY KEY AUTO_INCREMENT,
    nm_categoria VARCHAR(50),
    ds_categoria VARCHAR(150)
);

ALTER TABLE tb_produto
ADD CONSTRAINT FK_PRODUTO_CATEGORIA
FOREIGN KEY(cd_categoria)
REFERENCES tb_categoria(cd_categoria); 

ALTER TABLE tb_ingrediente
ADD CONSTRAINT FK_INGREDIENTE_CATEGORIA
FOREIGN KEY(cd_categoria)
REFERENCES tb_categoria(cd_categoria); 

ALTER TABLE tb_pedido
ADD CONSTRAINT FK_CLIENTE_PEDIDO
FOREIGN KEY(cd_cliente)
REFERENCES tb_cliente(cd_cliente);

ALTER TABLE tb_produto_pedido
ADD CONSTRAINT FK_PEDIDO_PRODUTO_PEDIDO
FOREIGN KEY(cd_pedido)
REFERENCES tb_pedido(cd_pedido);

ALTER TABLE tb_produto_pedido
ADD CONSTRAINT FK_PRODUTO_PRODUTO_PEDIDO
FOREIGN KEY(cd_produto)
REFERENCES tb_produto(cd_produto);

ALTER TABLE tb_parcela
ADD CONSTRAINT FK_PEDIDO_PARCELA
FOREIGN KEY(cd_pedido)
REFERENCES tb_pedido(cd_pedido);

/*ALTER TABLE tb_transacao
ADD CONSTRAINT FK_PEDIDO_TRANSACAO
FOREIGN KEY(cd_pedido)
REFERENCES tb_pedido(cd_pedido);*/

-- configuração do auto_increment

ALTER TABLE tb_produto  AUTO_INCREMENT = 0;
ALTER TABLE tb_ingrediente AUTO_INCREMENT = 0;
ALTER TABLE tb_cliente AUTO_INCREMENT = 0;
ALTER TABLE tb_pedido AUTO_INCREMENT = 0;
ALTER TABLE tb_parcela AUTO_INCREMENT = 0;
-- ALTER TABLE tb_transacao AUTO_INCREMENT = 0;
ALTER TABLE tb_produto_pedido AUTO_INCREMENT = 0;
ALTER TABLE tb_categoria AUTO_INCREMENT = 0;

-- CARGA DE DADOS
-- CATEGORIA PRODUTOS
INSERT INTO tb_categoria (nm_categoria, ds_categoria)
VALUES ('Bebidas','Sucos, Refrigerantes e etc.');

INSERT INTO tb_categoria (nm_categoria, ds_categoria)
VALUES ('Bebidas Alcoólicas','Ceverjas, Whiskeys, Vodkas, Vinhos, Cachaças e etc.');

INSERT INTO tb_categoria (nm_categoria, ds_categoria)
VALUES ('Sobremesas Doces','Sorvetes, Tortas, Bolos e etc.');

INSERT INTO tb_categoria (nm_categoria, ds_categoria)
VALUES ('Sobremesas Salgadas','Tortas salgadas, salgados de festa e etc.');

INSERT INTO tb_categoria (nm_categoria, ds_categoria)
VALUES ('Pizzas Doces','Pizzas de sabores doces.');

INSERT INTO tb_categoria (nm_categoria, ds_categoria)
VALUES ('Pizzas Salgadas','Pizzas tradicionais.');
 
-- PRODUTOS
-- Refrigerantes;
INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Coca Cola', 'Refrigerante de 600ml', 4.50, 10, '1.jpg', 1);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Coca Cola', 'Refrigerante de 1 litro', 6.00, 12, '2.jpg', 1);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Guaraná Antártica', 'Refrigerante de 600ml', 4.50, 10, '3.jpg', 1);


INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Guaraná Antártica', 'Refrigerante de 2 litros', 8.50, 10, '4.jpg', 1);

-- Cervejas

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Cerveja Brahma', 'Cerveja de 600ml', 6.50, 10, '5.jpg', 2);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Cerveja Brahma', 'Cerveja de litrão', 10.00, 12, '6.jpg', 2);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Cerveja Skol', 'Cerveja de 600ml', 4.50, 10, '7.jpg', 2);


INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Cerveja Skol', 'Cerveja de litrão', 9.00, 10, '8.jpg', 2);

-- Comidas

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Pizza Mussarela', 'Molho, mussarela e orégano.', 18.00, 10, '9.jpg', 6);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Pizza Napolitana', 'Molho, mussarela, tomate, parmesão e orégano.', 18.00, 10, '10.jpg', 6);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Pizza Portuguesa', 'Molho, mussarela, presunto, cebola, ovos, azeitona e orégano.', 17, 10, '11.jpg', 6);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Pizza Provolone', 'Molho, mussarela, provolone e orégano.', 25.00, 10, '12.jpg', 6);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Pizza Siciliana', 'Molho, mussarela, champignon, bacon, pimentão, azeitona e orégano., ', 35.00, 10, '13.jpg', 6);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Pizza Vegetariana', 'Molho, mussarela, escarola, tomate, milho, ervilha e orégano.', 25.00, 10, '14.jpg', 6);


-- Sobremesas

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Torta mousse de chocolate', 'Pedaço mousse de chocolate', 17.00, 10, '15.jpg', 3);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Rocambole de chocolate com doce de leite', 'Rocambole de chocolate com doce de leite', 20.00, 12, '16.jpg', 3);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Mousse de chocolate', 'Mousse de chocolate', 17.00, 10, '17.jpg', 3);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Sorvete 2 bolas', 'Sorvete 2 bolas', 13.00, 10, '18.jpg', 3);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Banana Brulee', 'Banana Brulee', 17.00, 10, '19.jpg', 3);

INSERT INTO tb_produto (nm_produto, ds_produto, vl_produto, qt_produto, im_produto, cd_categoria)
VALUES ('Picolé Diletto', 'Picolé Diletto', 10.00, 10, '20.jpg', 3);


-- IGREDIENTE

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('Borda de Catupiry', 'Borda de catupiry Original', 1, 5.10, 6);

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('Borda de Cheddar', 'Borda de Cheddar', 1, 5.10, 6);

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('Azeitona', 'Azeitona com caroço', 50, 2.50, 6);

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('O dobro de queijo', '2 vezes mais de queijo ', 10, 6.00, 6);

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('Oregano', 'Oregano', 100, 2.50, 6);

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('Limão', 'Rodelas', 100, 0.50, 1);

INSERT INTO tb_ingrediente (nm_ingrediente, ds_ingrediente, qt_ingrediente, vl_ingrediente, cd_categoria)
VALUES ('Laranja', 'Rodelas', 100, 0.50, 1);

-- CLIENTE 
INSERT INTO tb_cliente (nm_cliente, nm_sobrenome, ic_admin_usuario, dt_nascimento, cd_telefone, cd_celular, ic_tipo_documento, cd_cpf, cd_cnpj, nm_pais, sg_estado, nm_cidade, cd_cep, nm_bairro, nm_rua, cd_numero, ds_complemento, nm_email_cliente, cd_cartao_cliente, cd_operadora_cartao, dt_validade_cartao, cd_senha)
VALUES ('Genoveva', 'Santos', 'U', NULL, 1334738100, NULL, 'F', '26325872800', '', 'Brasil', 'SP', 'Praia Grande', '11700080', 'Boqueirão ', 'Avenida Paris ', '30', 'ap', 'genovevisdasilva@gmail.com', '', '', curdate(), '202cb962ac59075b964b07152d234b70') ;

INSERT INTO tb_cliente (nm_cliente, nm_sobrenome, ic_admin_usuario, dt_nascimento, cd_telefone, cd_celular, ic_tipo_documento, cd_cpf, cd_cnpj, nm_pais, sg_estado, nm_cidade, cd_cep, nm_bairro, nm_rua, cd_numero, ds_complemento, nm_email_cliente, cd_cartao_cliente, cd_operadora_cartao, dt_validade_cartao, cd_senha)
VALUES ('Gisele', 'Silva', 'A', NULL, 1134738180, NULL, 'F', '75786244407', '', 'Brasil', 'SP', 'Praia Grande', '11725380', 'Tude Bastos', 'Rua padre gastão', '444', 'casa', 'yunesnoronha@gmail.com', '', '', curdate(), '202cb962ac59075b964b07152d234b70');

INSERT INTO tb_cliente (nm_cliente, nm_sobrenome, ic_admin_usuario, dt_nascimento, cd_telefone, cd_celular, ic_tipo_documento, cd_cpf, cd_cnpj, nm_pais, sg_estado, nm_cidade, cd_cep, nm_bairro, nm_rua, cd_numero, ds_complemento, nm_email_cliente, cd_cartao_cliente, cd_operadora_cartao, dt_validade_cartao, cd_senha)
VALUES ('Gertrudes', 'Selfie', 'U', NULL, NULL, 13988849091, 'F', '57338831700', '', 'Brasil', 'SP', 'Praia Grande', '11700080', 'Boqueirão ', 'Rua Mário Tamashiro - até 299/300 ', '300', 'ap', 'a@a.com', '', '', curdate(), '202cb962ac59075b964b07152d234b70');

/*
-- CABECA
INSERT INTO tb_pedido	(cd_pedido, dt_emissao,vl_total_pedido, ic_cancelado,qt_total_parcela)
VALUES ()	
-- ITEM
INSERT INTO tb_produto_pedido 	(cd_pedido, cd_produto, vl_unitario_produto,vl_total_produto_pedido,ds_obs,qt_produto_pedido) 
VALUES ()

-- PARCELA
INSERT INTO tb_parcela cd_pedido,dt_emissao DATETIME,cd_parcela INTEGER,vl_parcela DECIMAL(10,2)
VALUES ()
*/