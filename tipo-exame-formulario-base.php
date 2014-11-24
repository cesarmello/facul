		<form action="altera-tipo-exame.php" method="post">
			<table class="table">
				<?php $tipoExame = buscaTipoExame($conexao, $id_tipo_exame); ?>
				<input type="hidden" name="id" value="<?=$tipoExame['id_tipo_exame']?>" class="form-control"/>
				<tr>
					<td colspan="2"><h1>Tipo Exame</h1></td>
				</tr>
				<tr>
					<td>Nome Tipo de Exame</td>
					<td><input type="text" name="nome" value="<?=$tipoExame['nome']?>" class="form-control"/></td>
				</tr>
				<tr>
					<td>Auto Exame</td>
					<td>
						<?php
							if ($tipoExame['auto_exame'] ==  "1") {
								$selecaoSim = "selected";
							}elseif ($tipoExame['auto_exame'] ==  "0"){
								$selecaoNao = "selected='selected'";
							}
						?>
						<select name="auto_exame" class="form-control">
							<option value="-1">É auto exame?</option>
							<option value="1" <?php echo $selecaoSim;?> selected >Sim</option>
							<option value="0" <?php echo $selecaoNao;?> >Não</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="center">
						<input type="submit" value="Atualizar" class="btn btn-primary" title="Atualiza Tipo Exame"/>
					</td>
				</tr>
			</table>
		</form>

		<table class="table">
			<tr>
				<td style="with: 60%;"><h1>Campos Cadastradas</h1></td>
				<td style="with: 10%;"></td>
				<td style="with: 10%;"></td>
				<td style="with: 20%;" class="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exameCampos">Adicionar</button></td>
			</tr>
			<?php $campos = buscaExameCampos($conexao, $id_tipo_exame);
			foreach ($campos as $campo) : ?>
			<tr>
				<td><?=$campo['nome_campo'];?></td>
				<td></td>
				<td></td>
				<td  class="center">
					<form action="desativa-exame-campos.php" method="post">
						<input type="hidden" name="id_tipo_exame" value="<?=$id_tipo_exame?>">
						<input type="hidden" name="id_exame_campos" value="<?=$campo['id_exame_campos']?>">
						<button class="btn btn-danger btn-sm">Desativar</button>
					</form>
				</td>
			</tr>
			<?php endforeach;?>
		</table>

		<table class="table">
			<tr>
				<td style="with: 60%;"><h1>Valores de Referencia</h1></td>
				<td style="with: 10%;"></td>
				<td style="with: 10%;"></td>
				<td style="with: 20%;" class="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#valorReferencia">Adicionar</button></td>
			</tr>
			<?php $campos = buscaValorReferencias($conexao, $id_tipo_exame);
			foreach ($campos as $campo) : ?>
			<tr>
				<td><?=$campo['nome_campo'];?></td>
				<td><?=$campo['valor_referencia'];?></td>
				<td><?=$campo['uni_medida'];?></td>
				<td class="center">
					<form action="desativa-valor-referencia.php" method="post">
						<input type="hidden" name="id_tipo_exame" value="<?=$id_tipo_exame?>">
						<input type="hidden" name="id_valor_referencia" value="<?=$campo['id_valor_referencia']?>">
						<button class="btn btn-danger btn-sm">Desativar</button>
					</form>
				</td>
			</tr>
			<?php endforeach;?>
		</table>


<!-- Modal Cadastrar Novo Campo -->
<div class="modal fade" id="exameCampos" tabindex="-1" role="dialog" aria-labelledby="exameCampos" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="exameCampos">Adicionar novo Campo</h4>
			</div>
			<form action="adiciona-exame-campo.php" method="post">
				<input type="hidden" name="id_tipo_exame" value="<?=$id_tipo_exame?>" class="form-control"/>
				<div class="modal-body">
					<table class="table">
						<tr>
							<td>Nome do Campo</td>
							<td><input type="text" name="nome_campo" class="form-control"/></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<input type="submit" value="Adicionar" class="btn btn-primary" title="Adicionar"/>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Cadastrar Novo Valor de Rerefencia -->
<div class="modal fade" id="valorReferencia" tabindex="-1" role="dialog" aria-labelledby="valorReferencia" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="valorReferencia">Adicionar novo valor de referencia</h4>
			</div>
			<form action="adiciona-valor-referencia.php" method="post">
				<input type="hidden" name="id_tipo_exame" value="<?=$id_tipo_exame?>" class="form-control"/>
				<div class="modal-body">
					<table class="table">
						<tr>
							<td>Nome do Campo</td>
							<td><input type="text" name="nome_campo" class="form-control"/></td>
						</tr>
						<tr>
							<td>Valor de Referencia</td>
							<td><input type="text" name="valor_referencia" class="form-control"/></td>
						</tr>
						<tr>
							<td>Unidade de Medida</td>
							<td><input type="text" name="uni_medida" class="form-control"/></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<input type="submit" value="Adicionar" class="btn btn-primary" title="Adicionar"/>
				</div>
			</form>
		</div>
	</div>
</div>