		<tr>
			<td>Tipo de Parceria</td>
			<td>
				<select name="id_tipo_parceiro" class="form-control">
					<option value="-1">Selecione</option>
					<?php foreach ($tipoParceiros as $tipoParceiro) :
						$essaEhAArea = $parceiro['id_tipo_parceiro'] ==  $tipoParceiro['id_tipo_parceiro'];
						$selecao = $essaEhAArea ? "selected='selected'" : "";
					?>
					<option value="<?=$tipoParceiro['id_tipo_parceiro']?>"<?=$selecao?>><?=$tipoParceiro['nome']?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nome</td>
			<td><input type="text" name="nome" value="<?=$parceiro['nome']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Razão Social</td>
			<td><input type="text" name="razao" value="<?=$parceiro['razao']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Número de Registo</td>
			<td><input type="text" name="crm" value="<?=$parceiro['crm']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Senha</td>
			<td><input type="text" name="senha" value="<?=$parceiro['senha']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Site</td>
			<td><input type="text" name="site" value="<?=$parceiro['site']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="email" value="<?=$parceiro['email']?>" class="form-control"/></td>
		</tr>