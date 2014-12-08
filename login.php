<?php
require_once('banco-usuario.php');
require_once('logica-usuario.php');

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if ($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("Location: index.php");
} else {
	$_SESSION["success"] = "Usuário logado com sucesso.";
	logaUsuario($usuario["email"]);
	$_SESSION["id_usuario"]  = $usuario['id_login'];
	$_SESSION["id_medico"]   = $usuario['id_medico'];
	$_SESSION["id_paciente"] = $usuario['id_paciente'];
	$_SESSION["permissao"]   = $usuario['permissao'];
	header("Location: index.php");
}
die();