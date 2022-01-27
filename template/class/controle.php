<?php
    require_once 'Funcoes.class.php';

    if (isset($_POST['alterar'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $fone = $_POST['fone'];
        $dataNasc = $_POST['data'];
        $logradouro = $_POST['logradouro'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $uf = $_POST['uf'];
        $resultado = Alterar::Cliente($id, $nome, $email, $fone, $dataNasc, $logradouro, $cidade, $bairro, $uf);
        if ($resultado) {
            header('Location: ../alterarCliente.php?id='.$id.'&resposta=0');
        }else{
            header('Location: ../alterarCliente.php?id='.$id.'&resposta=1');
        }
    }else if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $fone = $_POST['fone'];
        $dataNasc = $_POST['data'];
        $logradouro = $_POST['logradouro'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $uf = $_POST['uf'];
        $resultado = Cadastrar::Cliente($nome, $email, $fone, $dataNasc, $logradouro, $cidade, $bairro, $uf);
        if ($resultado) {
            header('Location: ../alterarCliente.php?id='.$resultado.'&resposta=0');
        }else{
            header('Location: ../clientes.php?resposta=1');
        }
    }else if(isset($_GET['excluir'])){
        $id = $_GET['excluir'];
        $resultado = Excluir::Cliente($id);
        if ($resultado) {
            header('Location: ../clientes.php?resposta=0');
        }else{
            header('Location: ../clientes.php?resposta=1');
        }
    }else{
        //header('Location: ../index.php');
    }

    echo $_SESSION['logado'];



    