$(function(){ // declaro o início do jquery
	$("input[name='usuario']").blur( function(){  
		var nomeEdit = $("input[name='usuario']").val();
		var idUsuario = $("input[name='id']").val();
		$.post('validacoes.php',{usuario: nomeEdit,id: idUsuario},function(data){
			alert(data);
			var res = data.split("|");
			if (res[0]==1){
				alert(res[1]);
				$("#usuario").val(res[2]);//onde vou escrever o resultado
			} 
		});	
	});
});