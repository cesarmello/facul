		<tr>
			<td>Nome</td>
			<td><input type="text" id="nome" name="nome" value="<?=$paciente['nome']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>CPF</td>
			<td><input type="text" id="cpf" name="cpf" value="<?=$paciente['cpf']?>" class="form-control" maxlength="11"/></td>
		</tr>
		<tr>
			<td>RG</td>
			<td><input type="text" id="rg" name="rg" value="<?=$paciente['rg']?>" class="form-control" maxlength="15"/></td>
		</tr>
		<tr>
			<td>CEP</td>
			<td><input type="text" id="cep" name="cep" value="<?=$paciente['cep']?>" class="form-control" onblur="getEndereco()" onkeypress="mascara(this, mnum);"  maxlength="8"/></td>
		</tr>
		<tr>
			<td>Rua</td>
			<td><input type="text" id="rua" name="rua" value="<?=$paciente['rua']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Número</td>
			<td><input type="text" id="numero" name="numero" value="<?=$paciente['numero']?>" class="form-control" onkeypress="mascara(this, mnum);"/></td>
		</tr>
		<tr>
			<td>Complemento</td>
			<td><input type="text" id="complemento" name="complemento" value="<?=$paciente['complemento']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Bairro</td>
			<td><input type="text" id="bairro" name="bairro" value="<?=$paciente['bairro']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Cidade</td>
			<td><input type="text" id="cidade" name="cidade" value="<?=$paciente['cidade']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>UF</td>
			<td><input type="text" id="uf" name="uf" value="<?=$paciente['uf']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Telefone Fixo</td>
			<td><input type="text" id="fixo" name="fixo" value="<?=$paciente['fixo']?>" class="form-control" onkeypress="mascara(this, mnum);" maxlength="10"/></td>
		</tr>
		<tr>
			<td>Telefone Movel</td>
			<td><input type="text" id="movel" name="movel" value="<?=$paciente['movel']?>" class="form-control" onkeypress="mascara(this, mnum);" maxlength="11"/></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" id="email" name="email" value="<?=$paciente['email']?>" class="form-control"/></td>
		</tr>
		<tr>
			<td>Senha</td>
			<td><input type="password" id="senha" name="senha" value="<?=$paciente['senha']?>" class="form-control"/></td>
		</tr>