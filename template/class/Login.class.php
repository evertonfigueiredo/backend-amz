<?php

require_once 'Conexao.class.php';

abstract class Sessao
{
	function __construct()
	{
		
	}
	
	static function estaLogado()
	{
		if(!isset($_SESSION)) {
			session_start();
		}
		if (!isset($_SESSION['logado'])) {
			Sessao::logout();
			return false;
		} else {
			return true;
		}
	}
	static function logout()
	{
		
		if(!isset($_SESSION)) {
			session_start();
		}
		
		$_SESSION['Name'] = NULL;
		$_SESSION['logado'] = NULL;
		unset ($_SESSION['Name']);
		unset ($_SESSION['logado']);
		session_destroy();
	}

	static function login($user,$password)
	{
		$pdo = BancoDados::conectar();
		$handler = $pdo->prepare('SELECT * FROM user WHERE login = :user AND password = PASSWORD(:password)');
		
		$handler->bindValue(':user',$user);
		$handler->bindValue(':password',$password);
		$handler->execute();
		$usuario = $handler->fetch(PDO::FETCH_OBJ);
		$logado = $handler->rowCount();
		if ($logado)
		{ 
			session_start();
			$_SESSION['logado'] = 1;
			$_SESSION['id_idx'] = $usuario->id;
			$_SESSION['Name'] = $usuario->login;
			return true;
		} else {
			Sessao::logout();
			return false;
		}
	}
}