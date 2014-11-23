		<tr>
			<td>Nome do Exame</td>
			<td><input type="text" name="nome" value="<?=$tipo_exame['nome']?>" class="form-control"/></td>
		</tr>

		<tr>
			<td>Valor de referência 1</td>
			<td><input type="text" name="valor1" value="<?=$tipo_exame['valor1']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Titulo do campo valor 1</td>
			<td><input type="text" name="desc1" value="<?=$tipo_exame['desc1']?>" class="form-control"/></td>
		</tr>

		<tr>
			<td>Valor de referência 2</td>
			<td><input type="text" name="valor2" value="<?=$tipo_exame['valor2']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Titulo do campo valor 2</td>
			<td><input type="text" name="desc2" value="<?=$tipo_exame['desc2']?>" class="form-control"/></td>
		</tr>

		<tr>
			<td>Valor de referência 3</td>
			<td><input type="text" name="valor3" value="<?=$tipo_exame['valor3']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Titulo do campo valor 3</td>
			<td><input type="text" name="desc3" value="<?=$tipo_exame['desc3']?>" class="form-control"/></td>
		</tr>

		<tr>
			<td>Valor de referência 4</td>
			<td><input type="text" name="valor4" value="<?=$tipo_exame['valor4']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Titulo do campo valor 4</td>
			<td><input type="text" name="desc4" value="<?=$tipo_exame['desc4']?>" class="form-control"/></td>
		</tr>

		<tr>
			<td>Valor de referência 5</td>
			<td><input type="text" name="valor5" value="<?=$tipo_exame['valor5']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Titulo do campo valor 5</td>
			<td><input type="text" name="desc5" value="<?=$tipo_exame['desc5']?>" class="form-control"/></td>
		</tr>


		<tr>
			<td>Unidade de Medida</td>
			<td>
				<select name="id_unimedida" class="form-control">
					<option value="-1">Selecione a Unidade de Medida</option>
					<?php foreach ($unimedidas as $unimedida) :
						$essaEhAUniMedida = $tipo_exame['id_unimedida'] ==  $unimedida['id_unimedida'];
						$selecao = $essaEhAUniMedida ? "selected='selected'" : "";
					?>
					<option value="<?=$unimedida['id_unimedida']?>"<?=$selecao?>><?=$unimedida['unidade']?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>