<?php
	require_once 'template/class/Login.class.php';
	Sessao::logout();
	header('Location: index.php');