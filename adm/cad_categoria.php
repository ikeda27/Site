﻿<?php
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
?>

<script type="text/javascript">

function addEvent(obj, evType, fn) {
 if (typeof obj == "string") {
if (null == (obj = document.getElementById(obj))) {
  throw new Error("Cannot add event listener: HTML Element not found.");
}
 }
 if (obj.attachEvent) {
return obj.attachEvent(("on" + evType), fn);
 } else if (obj.addEventListener) {
return obj.addEventListener(evType, fn, true);
 } else {
throw new Error("Your browser doesn't support event listeners.");
 }
}



function iniciarMudancaDeEnterPorTab() {
 var i, j, form, element;
 for (i = 0; i < document.forms.length; i++) {
form = document.forms[i];
for (j = 0; j < form.elements.length; j++) {
  element = form.elements[j];
  if ((element.tagName.toLowerCase() == "input")
	&& (element.getAttribute("type").toLowerCase() == "submit")) {
	form.onsubmit = function() {
	  return false;
	};
	element.onclick = function() {
	  if (this.form) {
		this.form.submit();
	  }
	};
  } else {
	element.onkeypress = mudarEnterPorTab;
  }
}
 }
}



function mudarEnterPorTab(e) {
 if (typeof e == "undefined") {
var e = window.event;
 }
 var keyCode = e.keyCode ? e.keyCode : (e.wich ? e.wich : false);
 if (keyCode == 13) {
if (this.form) {
  var form = this.form, i, element;
  // se o tabindex do campo for maior que zero, irá obrigatoriamente
  // procurar o campo com o próximo tabindex
  if (this.tabIndex > 0) {
	var indexToFind = (this.tabIndex + 1);
	for (i = 0; i < form.elements.length; i++) {
	  element = form.elements[i];
	  if (element.tabIndex == indexToFind) {
		element.focus();
		break;
	  }
	}
  }
  // se o tabindex do campo for igual a zero, irá procurar o campo com tabindex
  // igual a 1. Caso não encontre, colocará o foco no próximo campo do formulário.
  else {
	for (i = 0; i < form.elements.length; i++) {
	  element = form.elements[i];
	  if (element.tabIndex == 1) {
		element.focus();
		return false;
	  }
	}
	// se não encontrou pelo tabIndex, procura o próximo elemento da lista
	for (i = 0; i < form.elements.length; i++) {
	  if (form.elements[i] == this) {
		if (++i < form.elements.length) {
		  form.elements[i].focus();
		}
		break;
	  }
	}
  }
}
return false;
 }
}


// quando terminar o carregamento da página, executa a "iniciarMudancaDeEnterPorTab"
addEvent(window, "load", iniciarMudancaDeEnterPorTab);

</script>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Categoria</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=7'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_cat_prod.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Categoria" tabindex="0">
			</div>
		  </div>
		  
		
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="description" placeholder="Máximo 180 letras" tabindex="1">
			</div>
		  </div>
		  
		  <input type="hidden" class="form-control" name="slug" placeholder="Nome da categoria tudo minúsculo" value="-">
		
		  <input type="hidden" class="form-control" name="tag" placeholder="Palavra chave" value="-">

		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

