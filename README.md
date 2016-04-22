## Simple Web Payment Transaction in PHP

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
  |--dao/
  |  |--clienteDAO.php
  |
  |--documents/
  |  |--prototype/
  |    |--css/
  |      |--bootstrap.min.css
  |    |--fonts/
  |      |--glyphicons-halflings-regular.eot
  |      |--glyphicons-halflings-regular.svg
  |      |--glyphicons-halflings-regular.ttf
  |      |--glyphicons-halflings-regular.woff
  |      |--glyphicons-halflings-regular.woff2
  |    |--img/
  |      |--1.jpg
  |      |--2.jpg
  |      |--3.jpg
  |    |--js/
  |      |--bootstrap.min.js
  |      |--jquery-2.2.2.min.js
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
  |--model/
  |  |--cliente.php
  |  |--clientepedido.php
  |  |--ingrediente.php
  |  |--ingredienteproduto.php
  |  |--pedido.php
  |  |--produto.php
  |  |--produtopedido.php
  |--pagseguro/
  |    |--[UOL's PagSeguro PHP module]
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

Click here :arrow_right: <http://php-payment.herokuapp.com/>
