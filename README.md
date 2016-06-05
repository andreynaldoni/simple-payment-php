Simple Web Payment Transaction in PHP
===================

### Table of contents:

- [What you have to have in your system](#what-you-have-to-have-in-your-system)
- [What we recommend you to have in your system](#what-we-recommend-you-to-have-in-your-system)
- [Project structure (tree)](#project-structure-tree)
- [How to setup your environment](#how-to-setup-your-environment)
- [What if you want to test it online](#what-if-you-want-to-test-it-online)


#### What you have to have in your system:

 * Apache PHP 5.5.33+ and MySQL Server 5.0.11+
 * One good editor such as **[Visual Studio Code](https://code.visualstudio.com/)**, **[Atom](https://atom.io/)**, **[PHP Storm](https://www.jetbrains.com/phpstorm/)**, and so on
 
#### What we recommend you to have in your system:

* **[XAMPP *(5.6.19)*](https://www.apachefriends.org/pt_br/download.html)** :sunglasses:
* **[Visual Studio Code *(0.10.10+)*](https://code.visualstudio.com/)** :+1:
* **[Git *(1.7+)*](https://git-scm.com/downloads)** :heart:

#### Project structure (tree):
```
  |php-payment/
  |--business/
  |  |--categoriaNeg.php
  |  |--clienteNeg.php
  |  |--ingredienteNeg.php
  |  |--ingredienteprodutoNeg.php
  |  |--pagSeguroNeg.php
  |  |--pedidoNeg.php
  |  |--produtoNeg.php
  |  |--produtopedidoNeg.php
  |
  |--controllers/
  |  |--cliente-controller.php
  |  |--error-controller.php
  |  |--home-controller.php
  |  |--ingrediente-controller.php
  |  |--pagseguro-controller.php
  |  |--pedido-controller.php
  |  |--produto-controller.php
  |
  |--dao/
  |  |--categoriaDAO.php
  |  |--clienteDAO.php
  |  |--ingredienteDAO.php
  |  |--ingredienteprodutoDAO.php
  |  |--pedidoDAO.php
  |  |--produtoDAO.php
  |  |--produtopedidoDAO.php
  |
  |--documents/
  |  |--prototype/
  |    |--css/
  |      |--bootstrap's.css files
  |    |--fonts/
  |      |--glyphicons icons files
  |    |--img/
  |      |--all images.jpg files
  |    |--js/
  |      |--jquery & bootstrap .js files
  |    |--confirmacao.html
  |    |--index.html
  |    |--pagamento.html
  |    |--pedido.html
  |  |--sql/
  |    |--limpeza.sql
  |    |--simplepayment.sql
  |  |--UML/
  |    |--WebMonster - Tabelas.sql
  |    |--CD - simplepayment.asta
  |    |--CD simplepayment.pdf
  |    |--cd simplepayment.png
  |    |--model simplepayment.mwb
  |    |--model simplepayment.png
  |    |--UC Produto Pedido Cliente e Pagamento.asta
  |    |--UC Simple Payment.pdf
  |
  |--models/
  |  |--categoria.php
  |  |--cliente.php
  |  |--clientepedido.php
  |  |--ingrediente.php
  |  |--ingredienteproduto.php
  |  |--pagseguro.php
  |  |--pedido.php
  |  |--produto.php
  |  |--produtopedido.php
  |
  |--public/
  |  |--css/
  |     |--bootstrap css files.css
  |  |--fonts/
  |     |--glyphicons icons files
  |  |--img/
  |     |--all images.jpg files
  |  |--js/
  |     |--bootstrap & jquery.js files
  |
  |  |--views/
  |     |--cliente/
  |        |--cadastrar.php
  |        |--index.php
  |     |--errors/
  |        |--404.php
  |     |--home/
  |        |--admin.php
  |        |--index.php
  |        |--login.php
  |        |--logout.php
  |     |--ingrediente/
  |        |--index.php
  |     |--pagseguro/
  |        |--index.php
  |     |--pedido/
  |        |--checkout.php
  |        |--index.php
  |     |--produto/
  |        |--produto.php
  |     |--footer.php
  |     |--header.php
  |     |--menu.pgp
  |
  |--.htaccess
  |--app.php
  |--config.php
  |--connection.php
  |--database.php
  |--index.php
  |--LICENSE
  |--README.MD
```


## How to setup your environment

Navigate to *htdocs* folder, type this code below in your *console/terminal/command prompt:*

```git
git clone https://github.com/andreynaldoni/simple-payment-php.git
```

Start XAMPP Service 

Type in your browser <http://localhost/simple-payment-php/> then <kbd>Enter</kbd>


## What if you want to test it online?

Click here :arrow_right: <https://php-payment.herokuapp.com/>

> **Note:**
>
> - This application was made as a college project with **learning purpose**.
> - In order to make it work, you have to register at [UOL's pagseguro payment](https://pagseguro.uol.com.br/) service, and put your **SANDBOX** (Dedicated area test) credentials at the project.
