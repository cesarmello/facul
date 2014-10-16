		<tr>
			<td>Área</td>
			<td>
				<select name="id_area" class="form-control">
					<option value="-1">Selecione a Área</option>
					<?php foreach ($areas as $area) :
						$essaEhAArea = $especialidade['id_area'] ==  $area['id_area'];
						$selecao = $essaEhAArea ? "selected='selected'" : "";
					?>
					<option value="<?=$area['id_area']?>"<?=$selecao?>><?=$area['nome']?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Especialidade</td>
			<td><input type="text" name="especialidade" value="<?=$especialidade['especialidade']?>" class="form-control"/></td>
		</tr>