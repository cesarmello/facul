$(document).ready(function() {
	$('#areas').change(function() {
		$('#especialidades').load('especialidades.php?area=' + $('#areas').val());
	});
});


jQuery(function($){
	$("#telefone").mask("(99) 9999-9999");        // 14 Aqui montamos a mascara que queremos
	$("#tel").mask("(99) 9999-9999");             // 14 Aqui montamos a mascara que queremos
	$("#cep").mask("99999999");                   // 09 
});

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function getEndereco() {
	// Se o campo CEP não estiver vazio
	if($.trim($("#cep").val()) != ""){
		/*
		Para conectar no serviço e executar o json, precisamos usar a função
		getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
		dataTypes não possibilitam esta interação entre domínios diferentes
		Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
		http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
		*/
		$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
		// o getScript dá um eval no script, então é só ler!
		//Se o resultado for igual a 1
										
		if (resultadoCEP["tipo_logradouro"] != '') {
			if (resultadoCEP["resultado"]) {
			// troca o valor dos elementos
				$("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
				$("#bairro").val(unescape(resultadoCEP["bairro"]));
				$("#cidade").val(unescape(resultadoCEP["cidade"]));
				$("#uf").val(unescape(resultadoCEP["uf"]));
				$("#numero").focus();
				}
			}
		});
	}
}

// Exempo de chamada da função => <input type="text" name="cep" onkeypress="mascara(this, mcep);" maxlength="9" size="10"/>
function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}
function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
	v=v.replace(/\D/g,"")														//Remove tudo o que não é dígito
	v=v.replace(/^(\d{5})(\d)/,"$1-$2")							//Esse é tão fácil que não merece explicações
	return v
}
function mtel(v){
	v=v.replace(/\D/g,"")														//Remove tudo o que não é dígito
	v=v.replace(/^(\d\d)(\d)/g,"($1) $2")						//Coloca parênteses em volta dos dois primeiros dígitos
	v=v.replace(/(\d{4})(\d)/,"$1-$2")							//Coloca hífen entre o quarto e o quinto dígitos
	return v
}
function cnpj(v){
	v=v.replace(/\D/g,"")														//Remove tudo o que não é dígito
	v=v.replace(/^(\d{2})(\d)/,"$1.$2")							//Coloca ponto entre o segundo e o terceiro dígitos
	v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")	//Coloca ponto entre o quinto e o sexto dígitos
	v=v.replace(/\.(\d{3})(\d)/,".$1/$2")						//Coloca uma barra entre o oitavo e o nono dígitos
	v=v.replace(/(\d{4})(\d)/,"$1-$2")							//Coloca um hífen depois do bloco de quatro dígitos
	return v
}
function mcpf(v){
	v=v.replace(/\D/g,"")														//Remove tudo o que não é dígito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")							//Coloca um ponto entre o terceiro e o quarto dígitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")							//Coloca um ponto entre o terceiro e o quarto dígitos
																									//de novo (para o segundo bloco de números)
	v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")				//Coloca um hífen entre o terceiro e o quarto dígitos
	return v
}
function mdata(v){
	v=v.replace(/\D/g,"");													//Remove tudo o que não é dígito
	v=v.replace(/(\d{2})(\d)/,"$1/$2");       
	v=v.replace(/(\d{2})(\d)/,"$1/$2");       
																					 
	v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
	return v;
}
function mtempo(v){
	v=v.replace(/\D/g,"");													//Remove tudo o que não é dígito
	v=v.replace(/(\d{1})(\d{2})(\d{2})/,"$1:$2.$3");    
	return v;
}
function mhora(v){
	v=v.replace(/\D/g,"");													//Remove tudo o que não é dígito
	v=v.replace(/(\d{2})(\d)/,"$1h$2");
	return v;
}
function mrg(v){
	v=v.replace(/\D/g,"");													//Remove tudo o que não é dígito
	v=v.replace(/(\d)(\d{7})$/,"$1.$2");						//Coloca o . antes dos últimos 3 dígitos, e antes do verificador
	v=v.replace(/(\d)(\d{4})$/,"$1.$2");						//Coloca o . antes dos últimos 3 dígitos, e antes do verificador
	v=v.replace(/(\d)(\d)$/,"$1-$2");								//Coloca o - antes do último dígito
	return v;
}
function mnum(v){
		v=v.replace(/\D/g,"");												//Remove tudo o que não é dígito
		return v;
}
function mvalor(v){
	v=v.replace(/\D/g,"");													//Remove tudo o que não é dígito
	v=v.replace(/(\d)(\d{8})$/,"$1.$2");						//coloca o ponto dos milhões
	v=v.replace(/(\d)(\d{5})$/,"$1.$2");						//coloca o ponto dos milhares
	
	v=v.replace(/(\d)(\d{2})$/,"$1,$2");						//coloca a virgula antes dos 2 últimos dígitos
	return v;
}