<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$tipo_exame = array("nome" => "", "minimo" => "", "normal" => "", "maximo" => "");
$unimedidas  = listaUniMedidas($conexao); ?>

		<form action="adiciona-tipo-exame.php" method="post">
			<table class="table">
				<input type="hidden" name="id" class="form-control"/>
				<tr>
					<td colspan="2"><h1>Tipo Exame</h1></td>
				</tr>
				<tr>
					<td>Nome Tipo de Exame</td>
					<td><input type="text" name="nome" class="form-control"/></td>
				</tr>
				<tr>
					<td>Auto Exame</td>
					<td>
						<select name="auto_exame" class="form-control">
							<option value="-1">É auto exame?</option>
							<option value="1" >Sim</option>
							<option value="0" >Não</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="center">
						<input type="submit" value="Cadastrar" class="btn btn-primary" title="Cadastrar Tipo Exame"/>
					</td>
				</tr>
			</table>
		</form>
<?php require_once ('rodape.php'); ?>