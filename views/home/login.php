<?php
    //DAO->Cliente
    //include "dao/clienteDAO.php";
    include_once "business/clienteNeg.php";
    if(isset($_POST['user']))
    {
        $login = new clienteNeg();
        $login->login();
    }
?>

    <div class="container">
        <form class="form-login" method="POST">
            <h2>Login</h2>
            <div class="input-group" style="margin-bottom: 10px">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                <input type="email" name="user[email]" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                <input type="password" name="user[password]" class="form-control" placeholder="Senha" required>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar-me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>