<?php include( 'Connections/config.php' );?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cambiar Datos para Expohobby Septiembre 2013 Fiestas y Decoraci&oacute;n</title>
<style>
body{
background: url(body.png) repeat #923388;
 
}
.contGen{
width: 823px;
margin:0px auto;
display:block;
}

form{
	width:790px;
	margin:0px auto;
	border:#881663  solid thin;
	overflow:auto;
	font-family:Verdana, Geneva, sans-serif;
	padding:15px;
	background:#ead5e7;
	text-shadow: 0px 1px 2px #FFF;
	-webkit-border-bottom-right-radius: 10px;
-webkit-border-bottom-left-radius: 10px;
-moz-border-radius-bottomright: 10px;
-moz-border-radius-bottomleft: 10px;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
  box-shadow: 0px 3px 26px rgba(0, 0, 0, 0.30);
    -moz-box-shadow: 0px 3px 26px rgba(0, 0, 0, 0.30);
    -webkit-box-shadow: 0px 3px 26px rgba(0, 0, 0, 0.30);
	
	
}
.verinfo{
	margin:5px auto;
	padding:15px;
	background:#e1e1e2;
	border:#adadae solid thin;
	text-align:center;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:15px;
	color:#900;
	width:780px;
	
}
form label{
	float:left;
	width:532px;
	text-align:right;
	padding:18px 5px 5px 5px;
		text-shadow: 0px 0px 2px #FFF;
	
}
form label input{
	width:170px;
	margin-left:45px;
	margin-right:6px;
	
	
}

.ver{
	padding:3px;
	float:left;
	width:783px;
	height: 58px;
	
	
}
.ver2{
	padding:3px;
	float:left;
	width:783px;
	height: 96px;
	
	
}
.ver2 label {
padding:52px 5px 5px 5px !important;
	
}
.ver2 .capt{
	margin-left: 70px;
float: right;
position: absolute;
top:374px;
border:#CCC solid thin;
}

.ver2:hover{
	color:#FFF;
		background:#650066;
	
	
}
.ver:hover{
	color:#FFF;
		background:#650066;
	
	
}
input{
	-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
	
	
}
.btn{
	background:url(boton.png);
	border-style:none;
	width:150px;
		height:46px;
	
	
}
.btn:hover{
	background:url(boton2.png);
	cursor:pointer;
}
h1{
	margin:0px auto 0px auto;
	font-family:Verdana, Geneva, sans-serif;
	font-size:20px;
	width:790px;
	padding:15px;
	text-align:center;
	color:#FFF;
	background:#F9C;
	text-shadow: 0px 1px 0px #881663;
	border-top:#881663 solid thin;
		border-left:#881663  solid thin;
		border-right:#881663  solid thin;
		border-bottom:#FFF  solid thin;
		-webkit-border-top-left-radius: 10px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;
}

#mal2{
	margin-top: -273px;
	position:relative;
float:left;
	z-index:99;
	width:500px;
	height:300px;

	background:#000;
	-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
opacity: 0.6;
filter: "alpha(opacity=60)"; /* expected to work in IE 8 */
filter: alpha(opacity=60);   /* IE 4-7 */
zoom: 1;                     /* needed in IE up to version 7, or set width or height to trigger "hasLayout" */
border:#FFF solid thin;
	
	
}
#resultado{
	position:relative;
	z-index:70;
	margin:60px auto;
	height:150px;
	width:300px;
	color:#333;
	font-family:Verdana, Geneva, sans-serif;
	background:#CCC;
	border:#000 solid thin;
	text-align:center;
	z-index:300;

border:#000 solid thin;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;

	
}
#resultado2{
	height: 189px;
    margin: 23px auto;
    position: relative;
    text-align: center;
    width: 419px;
    z-index: 300;
	position:relative;
	color:#333;
	font-family:Verdana, Geneva, sans-serif;
	background:#CCC;
	border:#000 solid thin;
	text-align:justify;


border:#000 solid thin;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
padding:3px 10px;
font-size:13px;

	
}
#resultadotext{
	margin-top:23px;
	line-height: 1.6em;
	
	
}
#resultadotext2{
	margin-top:36px;
	line-height: 1.6em;
	
	
}
p{
	color:#900;
	padding:0px;
	margin:0px;
	width:auto;
	
	
}
#fijo{
	width:505px;
	height:305px;
	position:relative;
	z-index:2;
margin: 0px auto;
top: -601px;
	
	
}
#cerr_lom{
	float:right;
	position:relative;
	margin:-45px 25px 0px 0px;

	z-index:300;
	
}
#contemafilms{
	    width: 800px;
		height:26px;
    margin: 10px auto;
    background: #F3F3F3;
    border: 5px solid white;
    position:relative;
      box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.40);
    -moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.40);
    -webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.40);
	font-size: 13px;
	-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
	
}

#emafilms a{
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-style:none;
	text-decoration:none;


}
#emafilms a:hover{
	color:#060;
}

#emafilms{
	float:right;
	color:#333;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:12px;
	margin-top:5px;
		    margin-right:10px;

}
#resultadotext2 span {
color: #900;
padding: 0px;
margin: 0px;
width: auto;
}
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<?php
	if(isset($_GET['codigoC'])){
	$codigoC=$_GET['codigoC'];
	$codigo=$_GET['codigo'];
	$consulta=mysql_query("SELECT COUNT(*) FROM usuarioe WHERE codigoC='$codigoC' and codigo='$codigo' ");
	if (mysql_result($consulta,0) == 1){ 
	$usu_id= mysql_query("SELECT * FROM usuarioe WHERE codigoC='$codigoC' and codigo='$codigo'");
    $row_usu_nombre = mysql_fetch_assoc($usu_id );
	$nombre=$row_usu_nombre['nombre'];
	$apellido=$row_usu_nombre['apellido'];
	$mail=$row_usu_nombre['email'];
	$dni=$row_usu_nombre['dni'];
	}
	}
?>

<body>
<div class="contGen">
<h1>Expohobby Septiembre 2013<br/> Fiestas y Decoraci&oacute;n</h1>

<?php
if(isset($mail)){

 if(isset($nombre) and isset($apellido)){?>

<form action="guardar2.php" method="post" >
<input type="hidden" name="codigoC" value="<?php if(isset($codigoC)){echo $codigoC;}?>"/>
<div class="ver">
 
  <label> Nombre :
    <input type="text" name="nombre" disabled="disabled"title="No se puede modificar" value="<?php if(isset($nombre)){echo $nombre;}?>"/>
  </label>
 
  </div>
  <div class="ver">
 
  <label> Apellido :
  <input type="text"  name="apellido" disabled="disabled"  title="No se puede modificar" value="<?php if(isset($apellido)){echo $apellido;}?>"/>
  </label>
  
 </div>
   <div class="ver">
  <span id="sprytextfield3">
  <label> (Solo valores num&eacute;ricos) D.N.I. :
    <input type="text" name="dni" value="<?php if(isset($dni)){echo $dni;}?>" />
  </label>
  <span class="textfieldRequiredMsg"><img src="valor.png" title="Se necesita un valor!"  width="150"/></span><span class="textfieldInvalidFormatMsg"><img src="incorr.png" title="Formato no válido!" width="150" /></span></span>
   </div>
   <div class="ver">
 
  <label> E-mail :
    <input type="text" name="email" id="email"  disabled="disabled" title="No se puede modificar" value="<?php if(isset($mail)){echo $mail;}?>" />
  </label>
  
   </div>
    
  <div class="ver2">
 <span id="sprytextfield6">
 <label> Codigo de seguridad

  <img  class="capt" src="captcha.php" />
   <input type="text" size="16" name="captcha" /></label>
<span class="textfieldRequiredMsg"><img src="valor.png" title="Se necesita un valor!" width="150"/></span></span> 
 </div>
  <div class="ver">
  <label> Desea recibir las novedades<input type="checkbox"  name="info" value="1" checked="checked"/></label>
  </div>

 
 
 
<label><input type="submit" onsubmit="return false;" class="btn" value="" id="verificar" /></label>
  
</form>
<?php }else{
echo '<div class="verinfo">C&oacute;digo de seguridad no encontrado, por favor ingr&eacute;selo nuevamente.<br/>
Recuerde que este c&oacute;digo se envi&oacute; a su casilla de email luego de haberse registrado.</div>
';	
}
}?>
<div id='contemafilms'>
<div id='emafilms'>
<a  href="http://emafilms.com.ar/">Estudios Multimedia EB</a>
</div>

</div>

<script type="text/javascript">

function cerrarfijo() {

div = document.getElementById('fijo');

div.style.display='none';

}
</script>
<?php
if(isset($_GET['m']) and $_GET['m']==2){
?>
<div  id="fijo" style='display:"";'> 

<div  id="cerr_lom">
<a  id= "cerar" title= "Cerrar" href="javascript:cerrarfijo();" ><img src="mal.png"  width="25" title="cerrar"/></a>
</div>
<div id="resultado2">
<div id="resultadotext2">
La direcci&oacute;n de <span>E-MAIL ya existe</span>, si necesita modificar alg&uacute;n dato lo puede hacer mediante el link proporcionado en el mail que fue enviado anteriormente a su casilla de correo. Si necesita ayuda, puede enviar un mail con su consulta a <strong>info@expohobby.net</strong>. Saludos Cordiales!. 
</div>
</div>
<div id="mal2">

</div>
</div>
<?php
}else{
	if(isset($_GET['m']) and $_GET['m']==1){?>
<div  id="fijo" style='display:"";'> 

<div  id="cerr_lom">
<a  id= "cerar" title= "Cerrar" href="javascript:cerrarfijo();" ><img src="mal.png"  width="25" title="cerrar"/></a>
</div>
<div id="resultado">
<div id="resultadotext">
Hay campos vac&iacute;os
</div>
</div>
<div id="mal2">

</div>
</div>
<?php	}else{
	
	if(isset($_GET['m']) and $_GET['m']==3){?>
		<div  id="fijo" style='display:"";'> 

<div  id="cerr_lom">
<a  id= "cerar" title= "Cerrar" href="javascript:cerrarfijo();" ><img src="mal.png"  width="25" title="cerrar"/></a>
</div>
<div id="resultado">
<div id="resultadotext">
Se produjo un error al enviar el email, intente nuevamente
</div>
</div>
<div id="mal2">

</div>
</div>
<?php	}else{
	if(isset($_GET['m']) and $_GET['m']==4){?>
<div  id="fijo" style='display:"";'> 

<div  id="cerr_lom">
<a  id= "cerar" title= "Cerrar" href="javascript:cerrarfijo();" ><img src="mal.png"  width="25" title="cerrar"/></a>
</div>
<div id="resultado">
<div id="resultadotext">
Codigo de seguridad incorrecto
</div>
</div>
<div id="mal2">

</div>
</div>
<?php
}
}
	
}
	
	
}

if(isset($_GET['b']) and $_GET['b']==1){?>
<div  id="fijo" style='display:"";'> 
<div  id="cerr_lom">
<a  id= "cerar" title= "Cerrar" href="javascript:cerrarfijo();" ><img src="mal.png"  width="25" title="cerrar"/></a>
</div>
<div id="resultado2">
<div id="resultadotext2">
Se efectu&oacute; correctamente el cambio para la acreditaci&oacute;n a <strong>Expohobby Septiembre 2013 Fiestas y Decoraci&oacute;n</strong>.
En la brevedad le llegara un e-mail con su cup&oacute;n de descuento.
Si no lo recibió en la casilla de correo, es probable que este en el correo no deseado.
Ante cualquier duda consulte a nuestro e-mail <strong>info@expohobby.net</strong>.

</div>
</div>
<div id="mal2">

</div>
</div>

<?php	}
?>
</div>
<script type="text/javascript">
<!--
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
//-->
</script>

</body>
</html>