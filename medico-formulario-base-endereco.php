		<tr>
			<td>CEP</td>
			<td><input type="text" id="cep" name="cep" value="<?=$endereco['cep']?>" class="form-control" onblur="getEndereco()" onkeypress="mascara(this, mnum);"  maxlength="8"/></td>
		</tr>
		<tr>
			<td>Rua</td>
			<td><input type="text" id="rua" name="rua" value="<?=$endereco['rua']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Número</td>
			<td><input type="text" id="numero" name="numero" value="<?=$endereco['numero']?>" class="form-control" onkeypress="mascara(this, mnum);"/></td>
		</tr>
		<tr>
			<td>Complemento</td>
			<td><input type="text" id="complemento" name="complemento" value="<?=$endereco['complemento']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Bairro</td>
			<td><input type="text" id="bairro" name="bairro" value="<?=$endereco['bairro']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Cidade</td>
			<td><input type="text" id="cidade" name="cidade" value="<?=$endereco['cidade']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>UF</td>
			<td><input type="text" id="uf" name="uf" value="<?=$endereco['uf']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Telefone</td>
			<td><input type="text" name="fixo" id="fixo" value="<?=$endereco['fixo']?>" class="form-control" onkeypress="mascara(this, mnum);"  maxlength="10"/></td>
		</tr>
		<tr>
			<td>Celular</td>
			<td><input type="text" name="movel" id="movel" value="<?=$endereco['movel']?>" class="form-control" onkeypress="mascara(this, mnum);"  maxlength="11"/></td>
		</tr>