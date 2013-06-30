<?php
include( 'Connections/config.php' );
if(isset($_GET['codigo']) and $_GET['codigo']!=''){
$variable=$_GET['codigo']; 
$variable2=sizeof(explode("-", $variable)); 
if($variable2==2){
	$variable = explode ("-", $variable);
	
	if(!empty($variable[1])){
		
	                   
                      
					  
					  $consulta=mysql_query("SELECT COUNT(*) FROM usuarioe WHERE codigo='$variable[0]' and dni='$variable[1]'");
	if (mysql_result($consulta,0) == 1){ 
	$query = "SELECT * FROM usuarioe WHERE codigo='$variable[0]' and dni='$variable[1]'";
	$entrada = mysql_query($query, $exp) or die(mysql_error());
	$row_entrada = mysql_fetch_assoc($entrada);
?>
	<html oncontextmenu="return false" onkeydown="return false"> 

<head> 

<style type='text/css'>
<!--
body{
	height:auto;
	width:auto;
	margin:0px;
	padding:5px;
}
#todomens{
	margin:5px auto;
	height:auto;
	width:715px;
	border:#000 solid thin;
	

}
h1{
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	color:#333;
	margin-bottom:0px;
}
h2{
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	color:#333;
	font-size:14px;
}
#contentrada{
	margin:5px auto;
	height:auto;
	width:613px;
	border:#333   dashed thin;
	padding:0px;

}
#entrada{

	width:600px;
	height:201px;
	margin:5px auto;

	
}
#nombre{
	margin:-104px 0px 0px 230px;
	float:left;
	width:228px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	z-index:50;
	position:relative;

	
}
#dni{
	margin:-78px 0px 0px 230px;
	float:left;
	width:175px;
		font-family:Verdana, Geneva, sans-serif;
			font-size:14px;
			z-index:50;
			position:relative;
}
#marcaag{
	position:relative;
	z-index:55;
	width:195px;
	height:92px;
	float:left;
	margin:-138px 225px -162px;
	
}
#contnf{
	padding:10px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	margin-top:8px;
	color:#333;
	border-top:#333 solid thin;
	
	
}
#conimpr{
	margin:1px auto;
	height:autopx;
	padding:3px;
	width:auto;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
	text-align:center;

}
#imprimir{
	background: url(imprimir.png);
	width:150px;
	height:150px;
	border-style:none;

}
#imprimir:hover{
	cursor:pointer;
}
#contemafilms{
	    width: 900px;
		height:26px;
    margin: 10px auto;
    background: #F3F3F3;
    border: 5px solid white;
    position:relative;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.20);
    -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.20);
    -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.20);
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
		    margin-right: 124px;

}

-->
</style>
<script>
if(window.console && window.console.firebug)
{
 alert("you are using firebug");
}
function doPrint(theForm) {
var i; 
for(i=0; i<theForm.elements.length ; i++) { 
// Agregar en esta lista de condiciones 
// todos aquellos tipos de Input que se quieren ocultar 
if( (theForm.elements[i].type == "submit") || 
(theForm.elements[i].type == "reset") || 
(theForm.elements[i].type == "button") ) 
theForm.elements[i].style.visibility = 'hidden'; 
} 
window.print(); 

for(i=0; i<theForm.elements.length ; i++) { 
if( (theForm.elements[i].type == "submit") || 
(theForm.elements[i].type == "reset") || 
(theForm.elements[i].type == "button") ) 
theForm.elements[i].style.visibility = 'visible'; 
} 
} 
</script>
   <title>Expohobby Septiembre 2013 Fiestas y Decoraci&oacute;n</title> 
</head> 
<body oncontextmenu="return false" onkeydown="return false"> 
<div id='todomens'>
<div id='titulo'><h1>Expohobby Septiembre 2013  <br/> </h1><h2>Fiestas y Decoraci&oacute;n</h2></div> 


<div id='contentrada'>
<div id='entrada'>
<img src='entradaDES.jpg'>
<img  id='marcaag' src='body.png'>
<div id='nombre'>
<?php echo $row_entrada['nombre'].'   '.$row_entrada['apellido'];?>
</div>
<div id='dni'>
<?php echo $row_entrada['dni'];?>
</div>
</div>
</div>


<div id='conimpr'>

<form>
<input type="button" id="imprimir" value="" name="cmdPrint" onClick="doPrint(this.form);" title="IMPRIMIR">
</form>
</div>

<div id='contnf'>
Hola <strong><?php echo $row_entrada['nombre'].'   '.$row_entrada['apellido'];?> :</strong><br>

Gracias por acreditarse  a <strong>Expohobby Septiembre 2013 Fiestas y Decoraci&oacute;n</strong>.<br>

Corte la entrada por las l&iacute;neas discontinuas, esta entrada es personal y deber&aacute; presentarse con su DNI o Cedula de identidad en mano para que tenga validez.<br><br>
* Cup&oacute;n con 50% de descuento, personal e intransferible.<br /> 
 
* Menores de 6 a&ntilde;os entrada sin cargo.<br />
 
* <strong>Expohobby</strong> se reserva el derecho de admisi&oacute;n y permanencia.
<br>
* No valida para el d&iacute;a Domingo 15/09/13.<br/>

* Prohibida su reproducci&oacute;n y comercializaci&oacute;n

</div>

</div>
<div id='contemafilms'>
<div id='emafilms'>
 <a  href="http://emafilms.com.ar/">Estudios Multimedia EB</a>
</div>

</div>
</body></html>
<?php	
   }else{
	header( 'Location:entradas.php' );
		}
		
	                         }else{
			                  	header( 'Location:entradas.php' );
	                              }
                          }else{
                    	header( 'Location:entradas.php' );
                                }
	
                                                    }?>