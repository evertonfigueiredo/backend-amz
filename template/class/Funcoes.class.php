<?php

require_once 'Conexao.class.php';

abstract class Cadastrar
{
	static function Cliente($nome, $email, $fone, $dataNasc, $logradouro, $cidade, $bairro, $uf)
	{
		try {
			$pdo = BancoDados::conectar();
			$cadastro = $pdo->prepare('
                INSERT INTO client(
                    nome,
                    email,
                    fone,
                    dataNasc,
                    logradouro,
                    cidade,
                    bairro,
                    uf
                ) VALUES (
                    :nome,
                    :email,
                    :fone,
                    :dataNasc,
                    :logradouro,
                    :cidade,
                    :bairro,
                    :uf
                )
            ');
			$cadastro->bindValue(':nome',$nome);
            $cadastro->bindValue(':email',$email);
            $cadastro->bindValue(':fone',$fone);
            $cadastro->bindValue(':dataNasc',$dataNasc);
            $cadastro->bindValue(':logradouro',$logradouro);
            $cadastro->bindValue(':cidade',$cidade);
            $cadastro->bindValue(':bairro',$bairro);
            $cadastro->bindValue(':uf',$uf);
			$cadastro->execute();
			$resultado = $cadastro->fetch(PDO::FETCH_OBJ);
            $resultado = Lista::ultimoCliente();
            return $resultado;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}

abstract class Excluir
{
	static function Cliente($id)
	{
		try {
			$pdo = BancoDados::conectar();
			$excluir = $pdo->prepare('
                DELETE FROM client WHERE id=:id;
            ');
			$excluir->bindValue(':id',$id);
			$excluir->execute();
            return $excluir;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}


abstract class Lista
{

	static function Clientes(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare('SELECT * FROM client');
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetchAll(PDO::FETCH_OBJ);

			return $listaClientes;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

	static function Cliente($id){
		try {
			$pdo = BancoDados::conectar();
			$cliente = $pdo->prepare('SELECT * FROM client WHERE id = :id');
            $cliente->bindValue(':id',$id);
			$cliente->execute();
			$cliente = $cliente->fetch(PDO::FETCH_OBJ);

			return $cliente;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

    static function ultimoCliente(){
		try {
			$pdo = BancoDados::conectar();
			$cliente = $pdo->prepare('SELECT MAX(id) as idCliente FROM client');
			$cliente->execute();
			$cliente = $cliente->fetch(PDO::FETCH_OBJ);

			return $cliente->idCliente;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

    static function QuantidadeCadastrada(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare('SELECT COUNT(id) as quantidade FROM client');
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetch(PDO::FETCH_OBJ);

			return $listaClientes->quantidade;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

    static function QtdAniversarianteDoDia(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare("
                SELECT COUNT(id) as quantidade FROM client WHERE 
                    DATE_FORMAT(dataNasc,'%m-%d') >= DATE_FORMAT(NOW(),'%m-%d') 
                    AND DATE_FORMAT(dataNasc,'%m-%d') <= DATE_FORMAT(NOW(),'%m-%d');
            ");
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetch(PDO::FETCH_OBJ);

			return $listaClientes->quantidade;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

    static function AniversarianteDoDia(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare("
                SELECT * FROM client WHERE 
                    DATE_FORMAT(dataNasc,'%m-%d') >= DATE_FORMAT(NOW(),'%m-%d') 
                    AND DATE_FORMAT(dataNasc,'%m-%d') <= DATE_FORMAT(NOW(),'%m-%d');
            ");
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetchAll(PDO::FETCH_OBJ);

			return $listaClientes;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

    static function QtdAniversarianteDoMes(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare("
                SELECT COUNT(id) as quantidade FROM client   
                    WHERE Month(dataNasc) = Month(Now());
            ");
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetch(PDO::FETCH_OBJ);

			return $listaClientes->quantidade;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

    static function AniversarianteDoMes(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare("
                SELECT * FROM client   
                    WHERE Month(dataNasc) = Month(Now());
            ");
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetchAll(PDO::FETCH_OBJ);

			return $listaClientes;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}

abstract class Alterar
{
	static function Cliente($id, $nome, $email, $fone, $dataNasc, $logradouro, $cidade, $bairro, $uf)
	{
		try {
			$pdo = BancoDados::conectar();
			$alterar = $pdo->prepare('
                UPDATE client
                SET 
                    nome = :nome,
                    email = :email,
                    fone = :fone,
                    dataNasc = :dataNasc,
                    logradouro = :logradouro,
                    cidade = :cidade,
                    bairro = :bairro,
                    uf = :uf
                WHERE
                    id = :id
                ');
            $alterar->bindValue(':nome',$nome);
            $alterar->bindValue(':email',$email);
            $alterar->bindValue(':fone',$fone);
            $alterar->bindValue(':dataNasc',$dataNasc);
            $alterar->bindValue(':logradouro',$logradouro);
            $alterar->bindValue(':cidade',$cidade);
            $alterar->bindValue(':bairro',$bairro);
            $alterar->bindValue(':uf',$uf);
            $alterar->bindValue(':id',$id);
			$alterar->execute();
			$resultado = $alterar->fetch(PDO::FETCH_OBJ);
            return $resultado;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}

abstract class Converter
{
	static function DataTela($data)
	{
		try {
			$resultado = implode('/', array_reverse(explode('-', $data)));
            return $resultado;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
    static function DataBanco($data)
	{
		try {
			$resultado = implode('-', array_reverse(explode('/', $data)));
            return $resultado;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}
?>