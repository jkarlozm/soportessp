/**
 * @author Karloz
 */

//logueo inicio de sesion (Index.html)
function acceso(){
	var u = $("#Usuario").val();
	var p = $("#Pass").val();			
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
	}	
	xmlhttp.onreadystatechange = function(){
	  if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	  	if(xmlhttp.responseText == 'bien'){
	  		window.location='Standar/Menu.php';
	  	}
	  	else{
	  		if(xmlhttp.responseText == 'bien2'){
	  			window.location='Administrador/Menu.php';
	  		}
	  		else{
	  			alert(xmlhttp.responseText);	  				
	  		}	  			
	  	}	  		  	
	  }
	};
	xmlhttp.open("GET", "AccionesBD/Acceso.php?us="+u+"&pa="+p, "TRUE");	
	xmlhttp.send();
}

//Menu principal (Standar/Munu.php)
$(document).ready(function(){
   $("#Formulario").click(function(evento){
      evento.preventDefault();
      $("#destino").load("Formulario.php");
   });
});

$(document).ready(function(){
   $("#Buscar").click(function(evento){
      evento.preventDefault();
      $("#destino").load("Busqueda.php");
   });
});

$(document).ready(function(){
   $("#Reporte").click(function(evento){
      evento.preventDefault();
      $("#destino").load("ReporteEstandar.php");
   });
});

$(document).ready(function(){
   $("#Grafica").click(function(evento){
      evento.preventDefault();
      $("#destino").load("GraficaEstandar.php");
   });
});

$(document).ready(function(){
   $("#Responsiva").click(function(evento){
      evento.preventDefault();
      $("#destino").load("PDFresponsiva.html");
   });
});

//Registro Formulario Soporte(Standar/Formulario.php)
function proRegistro(){	
	var a = $("#Recepcion").val();
	var b = $("#Entrega").val();
	var c = $("#Estado").val();
	var d = $("#Usuario").val();
	var e = $("#Departamento").val();
	var f = $("#Direccion").val();
	var g = $("#Equipo").val();
	var h = $("#Marca").val();
	var i = $("#Modelo").val();
	var j = $("#Serie").val();
	var k = $("input[name='Servicio']:checked").val();
	var l = $("#Problema").val();
	var m = $("#Diagnostico").val();
	var n = $("#Solucion").val();
	var o = $("#Atendio").val();
	var p = $("#Observaciones").val();					
	var parametros = {"fr":a, "fe":b, "est":c, "us":d, "dep":e, "dir":f, "eq":g, "mar":h, "mod":i, "ser":j, "serv":k, "pro":l, "dia":m, "sol":n, "at":o, "obs":p};
	$.ajax({
		data: parametros,
		url: '../AccionesBD/Registro.php',
		type: 'POST',
		dataType: 'json',
		success:function(response){
			$('#Idfolio').val(response.folio);
            $('#resultado').val(response.respuesta);
            alert(response.respuesta);
		}
	});
}

//Limpiar Formulario
function proNuevo(){
	$("#Recepcion").val("");
	$("#Entrega").val("");
	$("#Estado").val("");
	$("#Usuario").val("");
	$("#Departamento").val("");
	$("#Direccion").val("");
	$("#Equipo").val("");
	$("#Marca").val("");
	$("#Modelo").val("");
	$("#Serie").val("");	
	$("#Problema").val("");
	$("#Diagnostico").val("");
	$("#Solucion").val("");	
	$("#Observaciones").val("");
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

//Reportes Usuario(Standar/ReporteEstandar.php)
//reporte dia
function Reportedia(){
	var dia = $('#fecha').val();
	var usuariodia = $('#User').val();
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
	xmlhttp.open("GET", "../AccionesBD/reporte.php?d="+dia+"&u="+usuariodia, "TRUE");	
	xmlhttp.send();
}

//reporte semana
function Reportesemana() {
	var semana = $("#sSemana").val();
	var usuariosemana = $("#User").val();
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
	xmlhttp.open("GET", "../AccionesBD/reporte.php?s="+semana+"&u="+usuariosemana+"&anisem="+an, "true");
	xmlhttp.send();		
}

//mes
function Reportemes() {
	var mes = $("#emes").val();
	var usermes = $("#User").val();
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
	xmlhttp.open("GET", "../AccionesBD/reporte.php?u="+usermes+"&m="+mes+"&anim="+an, "true");
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
	xmlhttp.open("GET", "../AccionesBD/reporte.php?u="+usuariotrimestre+"&t="+trimestre+"&anit="+an, "true");
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
	xmlhttp.open("GET", "../AccionesBD/reporte.php?a="+anio+"&u="+usuarioanio, "true");
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
	xmlhttp.open("GET", "../AccionesBD/reporte.php?seis="+sem+"&u="+usuariosemestre+"&anis="+an, "true");
	xmlhttp.send();	
}

//Grafica Usuario (Standar/GraficaEstandar.php)
//mes
function Graficames() {
	var mes = $("#emes").val();
	var usermes = $("#User").val();
	var an = $('#seanm').val();
	window.open("../AccionesBD/graficas/grafica.php?atendio="+usermes+"&m="+mes+"&anim="+an);	
}

//trimestre
function Graficatrimestre() {
	var trimestre = $("#Stri").val();		
	var usertrimestre = $("#User").val();
	var an = $("#seant").val();
	window.open("../AccionesBD/graficas/grafica.php?atendio="+usertrimestre+"&t="+trimestre+"&anit="+an);		
}

//anio
function Graficanio() {
	var anio = $("#sa").val();
	var useranio = $("#User").val();
	window.open("../AccionesBD/graficas/grafica.php?atendio="+useranio+"&a="+anio);			
}

//dia
function Graficadia() {
	var dia = $("#fecha").val();
	var userdia = $("#User").val();
	window.open("../AccionesBD/graficas/grafica.php?atendio="+userdia+"&d="+dia);		
}

//semana
function Graficasemana() {
	var semana = $("#sSemana").val();
	var usersemana = $("#User").val();
	var an = $('#seansem').val();
	window.open("../AccionesBD/graficas/grafica.php?atendio="+usersemana+"&s="+semana+"&anisem="+an);			
}

//semestre
function Graficasemestre() {
	var sem = $("#semestre").val();
	var usersemestre = $("#User").val();
	var an = $("#seans").val();
	window.open("../AccionesBD/graficas/grafica.php?atendio="+usersemestre+"&seis="+sem+"&anis="+an);			
}

//Manda plantilla actualizar a modal
function mostrarInfo(parametro){
	var folio = parametro;
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){			
			document.getElementById("ventanaActualizar").innerHTML = xmlhttp.responseText;
			datosForm(folio);			
		}
	};
	xmlhttp.open("GET", "../Standar/Actualizar.php", "true");
	xmlhttp.send();			
}

//Carga datos a formulario
function datosForm(folio)
{
	var fo = folio;	
   	var parametros = {"f":fo};
   	$.ajax({
   		data:parametros,
   		url:"../AccionesBD/buscaractualizar.php",
    	type:"post",
      	dataType:"json",
      	success:function(response){      		      		
            $('#Idfolio').val(response.folio);
			$('#Recepcion').val(response.recepcion);
			$('#Estado').val(response.estado);
			$('#Entrega').val(response.entrega);
			$('#UserComp').val(response.usuario);
			$('#Departamento').val(response.departamento);
			$('#Direccion').val(response.direccion);
			$('#EquipoUser').val(response.equipo);
			$('#Marca').val(response.marca);
			$('#Serie').val(response.serie);
			$('#Modelo').val(response.modelo);
			if(response.servicio == 'Asesoría'){$('#Asesoria').attr('checked', true);}
			if(response.servicio == 'Correctivo'){$('#Correctivo').attr('checked', true);}
			if(response.servicio == 'Especial'){$('#Especial').attr('checked',true);}
			if(response.servicio == 'Preventivo'){$('#Preventivo').attr('checked', true);}
			if(response.servicio == 'Red'){$('#Red').attr('checked', true);}			
			if(response.servicio == 'Telefonía'){$('#Telefonia').attr('checked', true);}
			if(response.servicio == 'Otros'){$('#Otros').attr('checked', true);}			
			$('#Problema').val(response.problema);
			$('#Diagnostico').val(response.diagnostico);
			$('#Solucion').val(response.solucion);
			$('#Atendio').val(response.atendio);
			$('#Observaciones').val(response.observaciones);			
			$('#resultado').val(response.resultado);
			alert(response.resultado);
         }
   });
}

/*Actualizar*/
function actualizarRegistro(){
	 <!--formulario-->
	 var fol = $('#Idfolio').val();
     var f1 = $('#Recepcion').val();
     var e = $('#Estado').val();
     var f2 = $('#Entrega').val();     
     
     <!--usuario-->
     var u = $('#UserComp').val();
     var d1 = $('#Departamento').val();
     var d2 = $('#Direccion').val();

     <!--equipo-->
     var equi = $('#EquipoUser').val();
     var mar = $('#Marca').val();
     var ser = $('#Serie').val();
     var mod = $('#Modelo').val();
     var serv = $("input[name='Servicio']:checked").val();

     <!--tdiagnostico-->
     var prob = $('#Problema').val();
     var diag = $('#Diagnostico').val();
     var solu = $('#Solucion').val();
     var obser = $('#Observaciones').val();
     var atendio = $('#Atendio').val();
     var parametros={ "f": fol, "fe1": f1, "est": e, "fe2": f2, "us":u, "dep":d1, "dir":d2, "equ":equi, "ma":mar, "se":ser, "mo":mod, "src":serv, "pro":prob, "dia":diag, "sol":solu, "obs":obser, "a":atendio};
     $.ajax({
     	data: parametros,
     	url: '../AccionesBD/actualizarinfo.php',
     	type: 'POST',
     	success:function(response){
     		$('#resultado').html(response);     		
     	}
     });
}

//Activa plantilla MostrarForm en Busqueda
function CargarForm(parametro){
	var folio = parametro;
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObjet("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){			
			document.getElementById("Datos").innerHTML = xmlhttp.responseText;
			datosForm(folio);						
		}
	};
	xmlhttp.open("GET", "../Standar/MostrarForm.php", "true");
	xmlhttp.send();			
}