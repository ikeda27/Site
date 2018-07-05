$(function(){ // declaro o início do jquery
	$("input[name='usuario']").blur( function(){  
		var nomeEdit = $("input[name='usuario']").val();
		var idUsuario = $("input[name='id']").val();
		$.post('validacoes.php',{usuario: nomeEdit,id: idUsuario},function(data){
			var res = data.split("|");
			if (res[0]==1){
				$("#usuario").val(res[2]);//onde vou escrever o resultado
			} 
		});	
	});
});

$(function(){ // declaro o início do jquery
	$("input[name='email']").blur( function(){  
		var emailEdit = $("input[name='email']").val();
		var idUsuario = $("input[name='id']").val();
		$.post('validacoes.php',{email: emailEdit,id: idUsuario},function(data){
			var res = data.split("|");
			if (res[0]==1){
				$("#email").val(res[2]);//onde vou escrever o resultado
			} 
		});	
	});
});