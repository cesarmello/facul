		<?php
		if (!empty($exame['id_exame'])) {
		echo '
		<tr>
			<td>Exame Nº</td>
			<td>'.$exame['id_exame'].'</td>
		</tr>';
		}
		?>
		<tr>
			<td>Paciente</td>
				<?php
					if (!empty($exame['nome'])) {
						echo '<td>'.$exame['nome'].'</td>';
					}else{
						echo '
						<td>
							<select name="id_paciente" class="form-control">
								<option value="-1">Selecione o Paciente</option>';
									foreach ($pacientes as $paciente) :
										$essaEhAArea = $paciente['id_paciente'] == $exame['id_paciente'];
										$selecao = $essaEhAArea ? "selected= 'selected '" : "";
										echo '<option value="'.$paciente['id_paciente'].'" '.$selecao.'>'.$paciente['nome'].'</option>';
									endforeach;
									echo '
							</select>
						</td>';
					}
				?>
		</tr>
		<?php foreach ($exameCampos as $exameCampo) : $x++?>
			<tr>
				<td><?php echo $exameCampo['nome_campo']; ?></td>
				<td><input type="text" name="valor<?=$x?>" class="form-control"/></td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td>Diagnostico</td>
			<td>
				<div class="form-group">
					<textarea class="form-control" rows="5" id="diagnostico" name="diagnostico"><?=$exame['diagnostico']?></textarea>
				</div>
		</tr>