<?php
require_once ('conecta.php');

function buscaUsuario($conexao, $email, $senha) {
	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conexao,$email);
	$query = "SELECT L.*, MER.id_medico, MER.id_paciente
						FROM tb_login L
						LEFT JOIN mer_login MER ON L.id_login = MER.id_login
						WHERE email='{$email}' AND senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao,$query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}