		<tr>
			<td>Exame número</td>
			<td><?=$exame['id_exame']?></td>
		</tr>
		<tr>
			<td>Tipo Exame</td>
			<td>
				<select name="id_tipo_exame" class="form-control">
					<option value="-1">Selecione o Exame</option>
					<?php foreach ($tipoExames as $tipoExame) :
						$essaEhAArea = $tipoExame['id_tipo_exame'] ==  $exame['id_tipo_exame'];
						$selecao = $essaEhAArea ? "selected='selected'" : "";
					?>
					<option value="<?=$tipoExame['id_tipo_exame']?>"<?=$selecao?>><?=$tipoExame['nome']?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Resultado do Exame</td>
			<td><input type="text" name="valor_exame" value="<?=$exame['valor_exame']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Diagnostico</td>
			<td><textexame class="form-control" rows="5" id="diagnostico" name="diagnostico"><?=$exame['diagnostico']?></textexame></td>
		</tr>
		<input type="hidden" name="qm_exame" value="<?=$exame['qm_exame']?>">
		<tr>
			<td></td>
			<td><label class="checkbox-inline"><input id="auto_exame" type="checkbox" value="<?=$exame['auto_exame']?>">Auto Exame</label></td>
		</tr>
