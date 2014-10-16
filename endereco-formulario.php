<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('banco-telefone.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_parceiro = $_GET['id'];
?>
<h1>Alterando Endereço</h1>
<form action="adiciona-endereco.php" method="post">
	<input type="hidden" name="id_parceiro" value="<?=$id_parceiro?>">	
	<table class="table">

		<?php require_once ('parceiro-formulario-base-endereco.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>