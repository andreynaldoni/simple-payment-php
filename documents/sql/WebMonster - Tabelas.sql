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

CREATE TABLE tb_cliente
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
);

CREATE TABLE tb_transacao
(
 cd_transacao  INTEGER NOT NULL AUTO_INCREMENT,
 cd_pedido INTEGER,
 cd_emissao INTEGER,
 dt_emissao DATETIME,
 nm_transacao VARCHAR(60),
 ic_tipo_pagamento VARCHAR(15),
 dt_transacao DATETIME,
 dt_ult_evento DATETIME,
 cd_ident_transacao INTEGER,
 ic_status_transacao INTEGER,
 nm_metodo_pagamento VARCHAR(60),
 PRIMARY KEY(cd_transacao)
);


--CRIAÇÃO DAS TABELAS DE RESOLUÇÃO;

CREATE TABLE tb_ingrediente_produto
(
	cd_produto INTEGER NOT NULL,
    cd_ingrediente INTEGER NOT NULL,
    qt_ingrediente_produto INTEGER NOT NULL
);

CREATE TABLE tb_cliente_pedido
(
	cd_cliente INTEGER NOT NULL,
    cd_pedido INTEGER NOT NULL
);

CREATE TABLE tb_produto_pedido
(
    cd_pedido INTEGER NOT NULL,
	cd_produto INTEGER NOT NULL,
    vl_unitario_produto DECIMAL(10,2),   
    vl_total_produto_pedido DECIMAL(10,2),    
    ds_obs      VARCHAR(200),  
    qt_produto_pedido INTEGER        
);

ALTER TABLE tb_ingrediente_produto
ADD CONSTRAINT FK_PRODUTO_INGREDIENTE_PRODUTO
FOREIGN KEY(cd_produto)
REFERENCES tb_produto(cd_produto);

ALTER TABLE tb_ingrediente_produto
ADD CONSTRAINT FK_INGREDIENTE_INGREDIENTE_PRODUTO
FOREIGN KEY(cd_ingrediente)
REFERENCES tb_ingrediente(cd_ingrediente);

ALTER TABLE tb_cliente_pedido
ADD CONSTRAINT FK_PEDIDO_CLIENTE_PEDIDO
FOREIGN KEY(cd_pedido)
REFERENCES tb_pedido(cd_pedido);

ALTER TABLE tb_cliente_pedido
ADD CONSTRAINT FK_CLIENTE_CLIENTE_PEDIDO
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

-- configuração do auto_increment

ALTER TABLE tb_produto  AUTO_INCREMENT = 0;
ALTER TABLE tb_ingrediente AUTO_INCREMENT = 0;
ALTER TABLE tb_cliente AUTO_INCREMENT = 0;
ALTER TABLE tb_pedido AUTO_INCREMENT = 0;
ALTER TABLE tb_pedido_parcela AUTO_INCREMENT = ;
ALTER TABLE tb_transacao AUTO_INCREMENT = ;
ALTER TABLE tb_ingrediente_produto AUTO_INCREMENT = 0;
ALTER TABLE tb_cliente_pedido AUTO_INCREMENT = 0;
ALTER TABLE tb_produto_pedido AUTO_INCREMENT = 0;

-- CARGA DE DADOS 
-- PRODUTOS
-- refrigerantes;
INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Coca Cola','Refrigerante de 600ml',6.50,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Coca Cola','Refrigerante de 1 litro',10.00,12);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Guarana Antartica','Refrigerante de 600ml',4.50,10);


INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Guarana Antartica','Refrigerante de 2 litros',8.50,10);
select * from tb_produto;

-- cervejas

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Cerveja Brahma','Cerveja de 600ml',6.50,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Cerveja Brahma','Cerveja de litrao',10.00,12);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Cerveja Skol','Cerveja de 600ml',4.50,10);


INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Cerveja Skol','Cerveja de litrao',9.00,10);

-- comidas

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pizza Mussarela','Molho, mussarela e orégano.',18.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pizza Napolitana','Molho, mussarela, tomate, parmesão e orégano.',18.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pizza Portuguesa','Molho, mussarela, presunto, cebola, ovos, azeitona e orégano.',30.50,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pizza Provolone','Molho, mussarela, provolone e orégano.',25.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pizza Siciliana','Molho, mussarela, champignon, bacon, pimentão, azeitona e orégano.',35.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pizza Vegetariana','Molho, mussarela, escarola, tomate, milho, ervilha e orégano.',25.00,10);


-- sobremesas

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Pedaço Torta mousse de chocolate','Pedaço mousse de chocolate',17.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Rocambole de chocolate com doce de leite','Rocambole de chocolate com doce de leite',20.00,12);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Mousse de chocolate','Mousse de chocolate',17.00,10);


INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Sorvete 2 bolas','Sorvete 2 bolas',13.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Banana Brule','Banana Brule',17.00,10);

INSERT INTO tb_produto (nm_produto,ds_produto,vl_produto,qt_produto)
values ('Picole Diletto','Picole Diletto',10.00,10);


-- IGREDIENTE

INSERT INTO tb_ingrediente (nm_ingrediente,ds_ingrediente,qt_ingrediente,vl_ingrediente)
values ('Borda de Catupiry ','Borda de catupiry Original',1,5.10);

INSERT INTO tb_ingrediente (nm_ingrediente,ds_ingrediente,qt_ingrediente,vl_ingrediente)
values ('Borda de Cheddar ','Borda de Cheddar',1,5.10);

INSERT INTO tb_ingrediente (nm_ingrediente,ds_ingrediente,qt_ingrediente,vl_ingrediente)
values ('Azeitona','Azeitona com caroço',50,2.50);

INSERT INTO tb_ingrediente (nm_ingrediente,ds_ingrediente,qt_ingrediente,vl_ingrediente)
values ('O dobro de queijo','2 vezes mais de queijo ',10,6.00);

INSERT INTO tb_ingrediente (nm_ingrediente,ds_ingrediente,qt_ingrediente,vl_ingrediente)
values ('Oregano','Oregano',100,2.50);


-- CLIENTE 
INSERT INTO tb_cliente  (nm_cliente ,nm_sobrenome ,cd_ddd ,cd_telefone ,ic_tipo_documento ,cd_cpf ,cd_cnpj ,nm_pais ,nm_estado ,nm_cidade ,cd_cep ,nm_bairro ,nm_rua    ,cd_numero ,ds_complemento ,nm_email_cliente ,cd_cartao_cliente ,cd_operadora_cartao ,dt_validade_cartao)
values ('Genoveva' ,'Santos' ,13 ,34738100 ,'F' ,'26325872800' ,'' ,'Brasil' ,'SP','Praia Grande','11700080' ,'Boqueirão ' ,'Avenida Paris ','30' ,'ap' ,'genovevisdasilva@gmail.com' ,'' ,'' ,curdate() ) ;

INSERT INTO tb_cliente  (nm_cliente ,nm_sobrenome ,cd_ddd ,cd_telefone ,ic_tipo_documento ,cd_cpf ,cd_cnpj ,nm_pais ,nm_estado ,nm_cidade ,cd_cep ,nm_bairro ,nm_rua    ,cd_numero ,ds_complemento ,nm_email_cliente ,cd_cartao_cliente ,cd_operadora_cartao ,dt_validade_cartao)
values ('Gisele' ,'Silva' ,11 ,34738180 ,'F' ,'75786244407' ,'' ,'Brasil' ,'SP','Praia Grande','11725380' ,'Tude Bastos' ,'Rua padre gastão','444' ,'casa' ,'yunesnoronha@gmail.com' ,'' ,'' ,curdate());

INSERT INTO tb_cliente  (nm_cliente ,nm_sobrenome ,cd_ddd ,cd_telefone ,ic_tipo_documento ,cd_cpf ,cd_cnpj ,nm_pais ,nm_estado ,nm_cidade ,cd_cep ,nm_bairro ,nm_rua    ,cd_numero ,ds_complemento ,nm_email_cliente ,cd_cartao_cliente ,cd_operadora_cartao ,dt_validade_cartao)
values ('Gertrudes' ,'Selfie' ,13 ,988849091 ,'F' ,'57338831700' ,'' ,'Brasil' ,'SP','Praia Grande','11700080' ,'Boqueirão ' ,'Rua Mário Tamashiro - até 299/300 ','300' ,'ap' ,'yunesnoronha@gmail.com' ,'' ,'' ,curdate());


-- CABECA
INSERT INTO tb_pedido	(cd_pedido ,dt_emissao,vl_total_pedido ,ic_cancelado,qt_total_parcela)
values ()	
-- ITEM
INSERT INTO tb_produto_pedido 	(cd_pedido ,cd_produto ,vl_unitario_produto,vl_total_produto_pedido,ds_obs,qt_produto_pedido) 
values ()

-- PARCELA
INSERT INTO tb_pedido_parcela cd_pedido,dt_emissao DATETIME,cd_parcela INTEGER,vl_parcela DECIMAL(10,2)
values ()