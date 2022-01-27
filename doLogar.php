<?php 
    require_once 'template/class/Login.class.php';
    $pdo = BancoDados::conectar();
    $login  = $_POST["login"];
    $password = $_POST["password"];
    if (Sessao::login($login,$password))
    {	
        header("Location: template/index.php");
    } else {
        header("Location: index.php");
    }