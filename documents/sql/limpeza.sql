SET foreign_key_checks = 0;
-- SET @@auto_increment_increment=1;

delete from tb_produto   ;
delete from tb_ingrediente ;
delete from tb_cliente ;
delete from tb_pedido ;
delete from tb_pedido_parcela ;
delete from tb_transacao ;
delete from tb_ingrediente_produto;
delete from tb_cliente_pedido ;
delete from tb_produto_pedido ;

-- SET foreign_key_checks = 1;

select * from tb_produto   ;
select * from  tb_ingrediente ;
select * from  tb_cliente ;
select * from  tb_pedido ;
select * from  tb_pedido_parcela ;
select * from  tb_transacao ;
select * from  tb_ingrediente_prod;
select * from  tb_cliente_pedido ;
select * from  tb_produto_pedido ;