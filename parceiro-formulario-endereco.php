<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('banco-telefone.php');
require_once ('logica-usuario.php');

verificaUsuario();

$telefone = array("telefone" => "");

$endereco = array("cep" => "", "rua" => "", "numero" => "", "complemento" => "", "bairro" => "", "cidade" => "", "uf" => "");
?>
<h1>Adicionando Endereço</h1>
<form action="adiciona-parceiro-endereco.php" method="post">
	<table class="table">
	
		<?php require_once ('parceiro-formulario-base-endereco.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>

<?php require_once ('rodape.php');?>