<?php 
	require('php/configuracion.php');
	session_start();
	$php=array('$var','$exp','$exp,','"','preg_match');
	$js=array('val','var exp','','','exp.test');
	$sustituir=array("VAR","EXP","EX,",'"',"FUNC");
	if(file_exists("funciones.txt")){  
		if(!file_exists('php/funciones.php')){
			copy('funciones.txt','php/funciones.txt');
			$archivo=file_get_contents("php/funciones.txt");
			$archivo=str_replace($sustituir,$php,$archivo);
			$archivo2="<?php";
			$archivo2.=$archivo;
			$archivo2.='?>';
			file_put_contents('php/funciones.php', $archivo2, FILE_APPEND);
			unlink('php/funciones.txt');
		}
		if(!file_exists('js/funciones.js')){
			copy('funciones.txt','js/funciones.txt');
			$archivo=file_get_contents("js/funciones.txt");
			$archivo=str_replace($sustituir,$js,$archivo);
			file_put_contents('js/funciones.js', $archivo, FILE_APPEND);
			unlink('js/funciones.txt');
		}
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Formulario de pedido</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<link href='https://fonts.googleapis.com/css?family=Lemon' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="font/stylesheet.css" type="text/css" charset="utf-8" />
</head>
<body>
<div>
<h1>COMPLETÁ CON TUS DATOS</h1>
	<?php
		if(isset($_GET['estado'] ) ){
			switch($_GET['estado']){
				case 'Gracias': 
					foreach($_SESSION as $nombre => $cont){
						if($nombre!='carpeta'){
							$_SESSION[$nombre]='';
						}
					} 
					if($_SESSION['carpeta']){
							if(file_exists("usuarios/".$_SESSION['carpeta']."/".$_SESSION['carpeta'].".html")){
								echo "<div id='datos'>";
								echo '<p>Gracias, sus datos se han recibido con éxito.</p>';
								echo "<img src='usuarios/".$_SESSION['carpeta']."/".$_SESSION['carpeta']."-mini.jpg' alt='foto de usuario' title='foto de usuario'/>";
								require("usuarios/".$_SESSION['carpeta']."/".$_SESSION['carpeta'].".html");	
								echo "</div>";
							}
					}	
				break;
				case 'Foto':
					echo '<p>Foto faltante</p>';
				break;
				case 'tamanio':
					echo '<p>El tamaño de la foto supera el permitido. Máximo 2MB. </p>';				
				break;
				default:
					echo '<p>El valor de '.$_GET['estado'].' es incorrecto.</p>';
				break;
			}
		}
	?>
	<form action="" method="post" id="comprar" enctype="multipart/form-data">
		<fieldset><legend>DATOS PERSONALES</legend>
			<div><span>Nombre*</span><input type="text" name="nombre" id="nombre" <?php if(isset($_SESSION['nombre'])){echo "value='".$_SESSION['nombre']."'";}?>/></div>
			<div><span>Apellido*</span><input type="text" name="apellido" id="apellido" <?php if(isset($_SESSION['apellido'])){echo "value='".$_SESSION['apellido']."'";}?>/></div>
			<div><span>DNI*</span><input type="text" name="dni" id="dni" <?php if(isset($_SESSION['dni'])){echo "value='".$_SESSION['dni']."'";}?>/></div>
			<div><span>Nacimiento*</span><input type="text" name="fecha" id="fecha" <?php if(isset($_SESSION['fecha'])){echo "value='".$_SESSION['fecha']."'";}?>/></div>
			<div><span>Foto*</span><input type="file" name="foto" id="foto" /></div>
		</fieldset>
		
		<fieldset><legend>REGISTRO PARA SEGUIMIENTO</legend>
			<div><span>Email</span><input type="text" name="email" id="email" <?php if(isset($_SESSION['email'])){echo "value='".$_SESSION['email']."'";}?>/></div>
			<div><span>Usuario</span><input type="text" name="usuario" id="usuario" <?php if(isset($_SESSION['usuario'])){echo "value='".$_SESSION['usuario']."'";}?>/></div>
			<div><span>Clave</span><input type="text" name="clave" id="clave" <?php if(isset($_SESSION['clave'])){echo "value='".$_SESSION['clave']."'";}?>/></div>
		</fieldset>
		
		<fieldset><legend>DOMICILIO DE ENTREGA</legend>
			<div><span>Calle</span><input type="text" name="calle" id="calle" <?php if(isset($_SESSION['calle'])){echo "value='".$_SESSION['calle']."'";}?> /></div>
			<div><span>Numero</span><input type="text" name="numero" id="numero" <?php if(isset($_SESSION['numero'])){echo "value='".$_SESSION['numero']."'";}?>/></div>
			<div><span>Piso</span><input type="text" name="piso" id="piso" <?php if(isset($_SESSION['piso'])){echo "value='".$_SESSION['piso']."'";}?>/></div>
			<div><span>Depto</span><input type="text" name="depto" id="depto" <?php if(isset($_SESSION['depto'])){echo "value='".$_SESSION['depto']."'";}?>/></div>
		</fieldset>
		<div><input type="submit" value="COMPRAR" id="enviar"/></div>
	</form>
	<?php 
		if(file_exists('js/funciones.js')){
			echo "<script type='text/javascript' src='js/funciones.js'></script>";
		}	
	?>
	<script type="text/javascript" src='js/validacion.js'></script>
	</div>
</body>
</html>