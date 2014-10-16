<?php
require_once ('cabecalho.php');
require_once ('banco-parceiro.php');
require_once ('banco-tipo-parceiro.php');
require_once ('logica-usuario.php');

verificaUsuario();

$parceiros = array("id_parceiro" => "", "nome" => "", "razao" => "", "crm" => "", "senha" => "", "site" => "", "email" => "");
$tipoParceiros = listaTipoParceiros($conexao);
?>
<h1>Adicionando Parceiro</h1>
<form action="adiciona-parceiro.php" method="post">
	<table class="table">
	
		<?php require_once ('parceiro-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php');?>