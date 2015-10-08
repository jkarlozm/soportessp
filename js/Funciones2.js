/**
 * @author Karloz
 */
//Menu principal (Standar/Munu.php)
$(document).ready(function(){
   $("#RegUser").click(function(evento){
      evento.preventDefault();
      $("#destino").load("RegistrarUsuario.php");
   });
});

$(document).ready(function(){
   $("#VerUsers").click(function(evento){
      evento.preventDefault();
      $("#destino").load("Usuarios.php");
   });
});

$(document).ready(function(){
   $("#RepTodos").click(function(evento){
      evento.preventDefault();
      $("#destino").load("ReporteAdministrador.php");
   });
});

//Limpiar campos Formulario
function proNuevo(){
	$("#namec").val("");
	$("#nName").val("");
	$("#pass1").val("");
	$("#pass2").val("");
	$("#stc").val("");
}

//Registrar Usuario
function proRegistro(){
	var a = $("#namec").val();
	var b = $("#nName").val();
	var c = $("#pass1").val();
	var d = $("#pass2").val();
	var e = $("#stc").val();
	var parametros = {"n":a, "nn":b, "p":c, "rp":d, "tc":e};
	$.ajax({
		data: parametros,
		url: '../AccionesBD/RegistrarUsuario.php',
		type: 'POST',
		success:function(response){
			alert(response);
			proNuevo();
		}
	});
}

//Buscar Datos(Standar/Busqueda.php)
function proBuscar(){
	var u = $("#Usuario").val();
	var f = $("#Folio").val();			
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
	}	
	xmlhttp.onreadystatechange = function(){
	  if(xmlhttp.readyState == 4 && xmlhttp.status == 200){	  	
	  		document.getElementById("Datos").innerHTML = xmlhttp.responseText;	
	  	}	  		  	
	 };
	
	xmlhttp.open("GET", "../AccionesBD/BuscarDatos.php?us="+u+"&fo="+f, "TRUE");	
	xmlhttp.send();
}

//Reportes Usuario(Administrador/ReporteAdministrador.php)
//reporte dia
function Reportedia(){
	var dia = $('#fecha').val();	
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
	}	
	xmlhttp.onreadystatechange = function(){
	  if(xmlhttp.readyState == 4 && xmlhttp.status == 200){	  	
	  	document.getElementById("respuesta").innerHTML = xmlhttp.responseText;	  		  		  	
	  }
	};
	xmlhttp.open("GET", "../AccionesBD/ReporteAdmin.php?d="+dia, "TRUE");	
	xmlhttp.send();
}

//reporte semana
function Reportesemana() {
	var semana = $("#sSemana").val();	
	var an = $('#seansem').val();
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../AccionesBD/ReporteAdmin.php?s="+semana+"&anisem="+an, "true");
	xmlhttp.send();		
}

//mes
function Reportemes() {
	var mes = $("#emes").val();	
	var an = $("#seanm").val();
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../AccionesBD/ReporteAdmin.php?m="+mes+"&anim="+an, "true");
	xmlhttp.send();			
}

//reporte trimestre
function Reportetrimestre(){
	var trimestre = $("#Stri").val();
	var usuariotrimestre = $("#User").val();
	var an = $("#seant").val();
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../AccionesBD/ReporteAdmin.php?t="+trimestre+"&anit="+an, "true");
	xmlhttp.send();
}

//reporte anual
function Reporteanual(){
	var anio = $('#sa').val();
	var usuarioanio = $('#User').val();
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../AccionesBD/ReporteAdmin.php?a="+anio, "true");
	xmlhttp.send();	
}

//reporte semestral
function Reportesemestre(){
	var sem = $('#semestre').val();
	var usuariosemestre = $('#User').val();
	var an = $('#seans').val();
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../AccionesBD/ReporteAdmin.php?seis="+sem+"&anis="+an, "true");
	xmlhttp.send();	
}

//Cargar Datos para Actuaizar
function actualizarDatos(parametro){
	var i = parametro;	
	var parametros = {"iduser": i};
	$.ajax({
		data: parametros,
		url: '../AccionesBD/BuscarDatosUsuario.php',
		type: 'POST',
		dataType: 'json',
		success:function(response){
			$('#iduser').val(response.id);
			$('#Actnom').val(response.nombre);			
			$('#Actnick').val(response.nickname);
			$('#Acttc').val(response.tipocuenta);			
		}
	});	
}

//Actualizar Datos
function ActualizarUser(){
	var aidu = $('#iduser').val();
	var anom = $('#Actnom').val();
	var anic = $('#Actnick').val();
	var atc = $('#Acttc').val();
	var parametros = {"a":anom, "b":anic, "c":atc, "d":aidu};
	$.ajax({
		data: parametros,
		url: '../AccionesBD/ActualizarDatosUser.php',
		type: 'POST',
		success:function(response){
			alert(response);
			cargartabla();
		}
	});
}

//Eliminar Usuario
function eliminaruser(parametro){
	var x = parametro;	
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			alert(xmlhttp.responseText);
			cargartabla();
		}
	};
	xmlhttp.open("GET", "../AccionesBD/EliminarUser.php?s="+x, "true");
	xmlhttp.send();
}

//cargar FormContrasena.php en el modal 
function pasarId(parametro){
	var id = parametro;
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){			
			document.getElementById("cuerpoModal").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../Administrador/FormContrasena.php?di="+id, "true");
	xmlhttp.send();	
}

//Cambiar contrasena
function nContrasena(){
	var p1 = $("#c1").val();
	var rp = $("#rc").val();
	var i1 = $("#idu").val();
	var parametros = {"ap1":p1, "arp":rp, "ai1":i1};
	$.ajax({
		data: parametros,
		url: '../AccionesBD/CambiarContrasena.php',
		type: 'POST',
		success:function(response){
			alert(response);
		} 
	});
}

//cargar tabla
function cargartabla(){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){			
			document.getElementById("destino").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../Administrador/Usuarios.php", "true");
	xmlhttp.send();
}
