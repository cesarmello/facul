<?php
require_once ('cabecalho.php');
require_once ('logica-usuario.php');
?>

<h1>Cadastrar Paciente</h1>
<table class="table">
	<tr>
		<td>Nome</td>
		<td><input type="text" id="nome" name="nome" class="form-control"/></td>
	</tr>
	<tr>
		<td>CPF</td>
		<td><input type="text" id="cpf" name="cpf" class="form-control"/></td>
	</tr>
	<tr>
		<td>RG</td>
		<td><input type="text" id="rg" name="rg" class="form-control"/></td>
	</tr>
	<tr>
		<td>CEP</td>
		<td><input type="text" id="cep" name="cep" class="form-control" onblur="getEndereco()" onkeypress="mascara(this, mnum);"  maxlength="8"/></td>
	</tr>
	<tr>
		<td>Rua</td>
		<td><input type="text" id="rua" name="rua" class="form-control" readonly/></td>
	</tr>
	<tr>
		<td>Número</td>
		<td><input type="text" id="numero" name="numero" class="form-control" onkeypress="mascara(this, mnum);"/></td>
	</tr>
	<tr>
		<td>Complemento</td>
		<td><input type="text" id="complemento" name="complemento" class="form-control"/></td>
	</tr>
	<tr>
		<td>Bairro</td>
		<td><input type="text" id="bairro" name="bairro" class="form-control" readonly/></td>
	</tr>
	<tr>
		<td>Cidade</td>
		<td><input type="text" id="cidade" name="cidade" class="form-control" readonly/></td>
	</tr>
	<tr>
		<td>UF</td>
		<td><input type="text" id="uf" name="uf" class="form-control" readonly/></td>
	</tr>
	<tr>
		<td>Telefone Fixo</td>
		<td><input type="text" id="fixo" name="fixo" class="form-control" onkeypress="mascara(this, mnum);"  maxlength="11"/></td>
	</tr>
	<tr>
		<td>Telefone Movel</td>
		<td><input type="text" id="movel" name="movel" class="form-control" onkeypress="mascara(this, mnum);"  maxlength="10"/></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td><input type="text" id="email" name="email" class="form-control"/></td>
	</tr>
	<tr>
		<td>Senha</td>
		<td><input type="text" id="senha" name="senha" class="form-control"/></td>
	</tr>
	<tr>
	<td colspan="2">
		<button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Cadastra Paciente">Cadastrar</button>
	</td>
	</tr>
</table>
<script src="js/masc.js"></script>
<?php require_once ('rodape.php');?>