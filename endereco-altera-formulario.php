<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('banco-telefone.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_endereco = $_GET['id'];
$id_parceiro = $_GET['p'];
$endereco = buscaEndereco($conexao, $id_endereco);
$telefone = buscaTelefone($conexao, $id_endereco);

?>

<h1>Alterando Endereço</h1>
<form action="altera-endereco.php" method="post">
	<input type="hidden" name="id_endereco" value="<?=$endereco['id_endereco']?>">
	<input type="hidden" name="id_parceiro" value="<?=$endereco['id_parceiro']?>">	
	<table class="table">

		<?php require_once ('parceiro-formulario-base-endereco.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>