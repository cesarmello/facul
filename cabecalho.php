<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once ('mostra-alerta.php');
?>
<html>
<head>
	<title>Aussel Guia On-line</title>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/custom.css" rel="stylesheet" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/docs.min.js"></script>
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Guia Online</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="area-lista.php">Areas</a></li>
						<li><a href="especialidade-lista.php">Especialidades</a></li>
						<li><a href="parceiro-lista.php">Médicos</a></li>
						<li><a href="paciente-lista.php">Pacientes</a></li>
						<li><a href="logout.php">Sair</a></li>
					</ul>
				</div>
			</div>
		</div>

	<div class="container">

		<div class="principal">
			<?php
				mostraAlerta("success");
				mostraAlerta("danger");
			?>