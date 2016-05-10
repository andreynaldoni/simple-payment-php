<?php
    //DAO->Cliente
    //include "dao/clienteDAO.php";
    include_once "business/clienteNeg.php";
    if(isset($_POST['user']))
    {
        $login = new clienteNeg();
        $login->Login();
    }
?>

    <div class="container">
        <form class="form-login" method="POST">
            <h2>Login</h2>
            <input type="email" name="user[email]" class="form-control" placeholder="Email" required autofocus>
            <input type="password" name="user[password]" class="form-control" placeholder="Senha" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar-me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>