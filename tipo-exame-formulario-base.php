		<tr>
			<td>Nome</td>
			<td><input type="text" name="nome" value="<?=$tipo_exame['nome']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Mínimo</td>
			<td><input type="text" name="minimo" value="<?=$tipo_exame['minimo']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Normal</td>
			<td><input type="text" name="normal" value="<?=$tipo_exame['normal']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Máximo</td>
			<td><input type="text" name="maximo" value="<?=$tipo_exame['maximo']?>" class="form-control"/></td>
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