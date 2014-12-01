<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');
verificaUsuario();
$tipoExames = listaTipoExames($conexao); ?>

<h1>Selecione qual exame deseja realizar</h1></td>

<table class="table">
	<?php foreach ($tipoExames as $tipoExame) : ?>
		<tr>
			<td><a href="exame-formulario-adiciona.php?id=<?=$tipoExame['id_tipo_exame']?>"><?=$tipoExame['nome']?></a></td>
		</tr>
	<?php endforeach ?>
</table>
<?php require_once ('rodape.php'); ?>