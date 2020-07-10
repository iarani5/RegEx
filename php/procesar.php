<?php
	require ("funciones.php");
	$i=0;
	$MB = 2;
	session_start();
	if(isset($_POST['nombre'])){
		$_SESSION['nombre'] = $_POST['nombre']; 
		if(!nombre_apellido($_POST['nombre'])){
			header("Location: ../formulario.php?estado=Nombre");
		}
		else{
			$i++;
		}
		if(isset($_POST['apellido'])){
			$_SESSION['apellido'] = $_POST['apellido']; 
			if(!nombre_apellido($_POST['apellido'])){
				header("Location: ../formulario.php?estado=Apellido");
			}
			else{
				$i++;
			}
			if(isset($_POST['dni'])){
				$_SESSION['dni'] = $_POST['dni'];
				if(!dni_f($_POST['dni'])){
					header("Location: ../formulario.php?estado=DNI");
				}
				else{
					$i++;
				}
				if(isset($_POST['fecha'])){
					$_SESSION['fecha'] = $_POST['fecha'];
					if(!fecha_f($_POST['fecha'])){
						header("Location: ../formulario.php?estado=Fecha");
					}
					else{
						$i++;
					}
					if(isset($_POST['email'])){
						$_SESSION['email'] = $_POST['email'];
						if(!email_f($_POST['email'])){
							header("Location: ../formulario.php?estado=Email");
						}
						else{
							$i++;
						}
						if(isset($_POST['usuario'])){
							$_SESSION['usuario'] = $_POST['usuario'];
							if(!usuario_f($_POST['usuario'])){
								header("Location: ../formulario.php?estado=Usuario");
							}
							else{
								$i++;
							}
							if(isset($_POST['clave'])){
								$_SESSION['clave'] = $_POST['clave'];
								if(!clave_f($_POST['clave'])){
									header("Location: ../formulario.php?estado=Clave");
								}
								else{
									$i++;
								}
								if(isset($_POST['calle'])){
									$_SESSION['calle'] = $_POST['calle'];
									if(!calle_f($_POST['calle'])){
										header("Location: ../formulario.php?estado=Calle");
									}
									else{
										$i++;
									}
									if(isset($_POST['numero'])){
										$_SESSION['numero'] = $_POST['numero'];
										if(!numero_f($_POST['numero'])){
											header("Location: ../formulario.php?estado=Numero");
										}
										else{
											$i++;
										}
										if(isset($_POST['piso'])){
											$_SESSION['piso'] = $_POST['piso'];
											if(!piso_f($_POST['piso'])){
												header("Location: ../formulario.php?estado=Piso");
											}
											else{
												$i++;
											}
											if(isset($_POST['depto'])){
												$_SESSION['depto'] = $_POST['depto'];
												if(!depto_f($_POST['depto'])){
													header("Location: ../formulario.php?estado=Depto");
												}
												else{
													$i++;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	if($_FILES['foto']['name']){
		if( $_FILES['foto']['size'] > $MB * 1024 * 1024 ){
			header("Location: ../formulario.php?estado=tamanio");
		}
		if(foto_f($_FILES['foto']['name'])){
			$i++;
		}
	}
	else{
		header("Location: ../formulario.php?estado=Foto");
	}
	if($i==12){
		$titulo = time( );
		$_SESSION['carpeta']=$titulo;
		mkdir("../usuarios/$titulo");
		file_put_contents( "../usuarios/$titulo/$titulo.html", "<ul>\n", FILE_APPEND );
		foreach($_POST as $nombre => $cont){
			if($cont==''){
				$cont='--';
			}	
			file_put_contents( "../usuarios/$titulo/$titulo.html", "<li>".ucwords($nombre)." : $cont</li>\n", FILE_APPEND  );
		}
		file_put_contents( "../usuarios/$titulo/$titulo.html", "</ul>" , FILE_APPEND ); 
		$temp=$_FILES['foto']['tmp_name'];
		move_uploaded_file($temp, "../usuarios/$titulo/$titulo.jpg"); 
		$name="../usuarios/$titulo/$titulo-mini.jpg";
		header('Content-Type: image/jpeg');
		$img=imagecreatefromjpeg("../usuarios/$titulo/$titulo.jpg");
		$alto = imagesy($img);
		$ancho = imagesx($img);
		$alto_n = 200;
		$ancho_n = round($alto_n*$ancho/$alto);	
		$duplicado = imagecreatetruecolor($ancho_n, $alto_n);
		imagecopyresampled( $duplicado, $img, 0,0,0,0, $ancho_n, $alto_n, $ancho, $alto );
		imagejpeg($duplicado,$name,100);
		imagedestroy($duplicado);
		imagedestroy($img);
		header("Location: ../formulario.php?estado=Gracias"); 
	}
?>