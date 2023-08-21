<?php
$conexion=mysqli_connect("jmequipos.com","jmequipo_admin","fuVwyXWMXxK5");
mysqli_select_db($conexion,"jmequipo_jm");
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

//MENSAJE CONTACTENOS
if($_POST["idSQL"]==1){

	if($_POST["resultadoOp"]!=$_POST["resultado"]){
		echo '<center>
				<div style="padding:10px; margin:20px; width:80%; height:200px; background-color:#c92d22; border-radius:10px; font-family:arial; text-align:justify;">
					<h1 style="color:#FFF;">Alerta</h1>
					<p style="color:#FFF;">El resultado de la suma no es correcto.</p>
				</div>
				<a href="javascript:history.go(-1);" style="padding:10px; margin:20px; background-color:#c92d22; border-radius:5px; font-family:arial; text-decoration:none; color:#FFF;">REGRESAR Y VERIFICAR</a>
			</center>';
		exit();
	}
	
	mysqli_query($conexion,"INSERT INTO f_contacto(fcon_nombre, fcon_asunto, fcon_email, fcon_msj, fcon_fecha, fcon_telefono)
	VALUES('".$_POST["nombre"]."','".$_POST["asunto"]."','".$_POST["email"]."','".$_POST["mensaje"]."', now(), '".$_POST["celular"]."')");
	
	
	$tituloMsj = "¡MENSAJE DE CONTACTO!";
	$bgTitulo = "#041551";
	$contenidoMsj = '
		<p>
			Hola!<br>
			<b>'.strtoupper($_POST["nombre"]).'</b>, Gracias por contactarnos!<br>
			A continuación le mostramos la información que suministró:<br><br>
			<b>Nombre:</b> '.strtoupper($_POST["nombre"]).'<br>
			<b>Documento/Nit:</b> '.$_POST["documento"].'<br>
			<b>Email:</b> '.strtolower($_POST["email"]).'<br>
			<b>Celular:</b> '.$_POST["celular"].'<br>
			<b>Ciudad:</b> '.$_POST["ciudad"].'<br>
			<b>Asunto:</b> '.$_POST["asunto"].'<br>
			<b>Mensaje:</b><br> 
			'.$_POST["mensaje"].'
		</p>

		<div align="center"><img src="http://jmequipos.com/img/bg/contacto.jpg" width="600"></div>

		<p>
			De todos los que hacemos parte de <b>JMEQUIPOS</b>...<br>
			...MUCHAS GRACIAS POR CONTACTARNOS!!!
		</p>
	';

		$fin =  '<html><body style="background-color:#FFF;">';
		$fin .= '
					<center>
						<div style="width:600px; text-align:justify; padding:15px;">
							<img src="https://jmequipos.com/img/logos/logo-white.png" width="100">
						</div>

						<div style="font-family:arial; background:'.$bgTitulo.'; width:600px; color:#FFF; text-align:center; padding:15px; border-radius: 10px 10px 0px 0px;">
							<h3>'.$tituloMsj.'</h3>
						</div>

						<div style="font-family:arial; background:#FAFAFA; width:600px; color:#000; text-align:justify; padding:15px;">
							'.$contenidoMsj.'
						</div>
						
						<div style="font-family:arial; background:'.$bgTitulo.'; width:600px; color:#eebd00; text-align:center; padding:5px; border-radius: 0px 0px 10px 10px;">
							<img src="https://jmequipos.com/img/logo.png" width="80"><br>
							<b>PBX:</b> (574) 322 06 19<br>
							<b>Celular:</b> (310) 798 35 26 - (320) 235 4380<br>
							<b>Email:</b> <a href="#" style="color:#eebd00;">ventas@jmequipos.com</a><br>
							<a href="https://jmequipos.com/" style="color:#eebd00;">www.jmequipos.com</a>
						</div>
					</center>
					<p>&nbsp;</p>
				';	
		$fin .='';						
		$fin .=  '<html><body>';							
		$sfrom="ventas@jmequipos.com"; //LA CUETA DEL QUE ENVIA EL MENSAJE			
		$sdestinatario=strtolower($_POST["email"]).", ventas@jmequipos.com, gerencia@jmequipos.com"; //CUENTA DEL QUE RECIBE EL MENSAJE			
		$ssubject=$_POST["asunto"]; //ASUNTO DEL MENSAJE 				
		$shtml=$fin; //MENSAJE EN SI			
		$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 			
		$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 			
		$sheader=$sheader."Mime-Version: 1.0\n"; 		
		$sheader=$sheader."Content-Type: text/html; charset=UTF-8\r\n"; 			
		@mail($sdestinatario,$ssubject,$shtml,$sheader);

	echo '<script type="text/javascript">window.location.href="contactenos.php?msg=1";</script>';
	exit();
}

//SUSCRITOS AL CORREO
if($_POST["idSQL"]==2){
	mysqli_query($conexion,"INSERT INTO suscritos(sus_email, sus_fecha)VALUES('".$_POST["email"]."', now())");
	

	echo '<script type="text/javascript">window.location.href="index.php?msg=1";</script>';
	exit();
}
//RECORDAR CLAVE
if($_POST["idSQL"]==3){
	include("gestorweb/db_conexion/conexioncrm.php");
	if(trim($_POST["email"])==""){
		echo '<center>
				<div style="padding:10px; margin:20px; width:80%; height:200px; background-color:#274abb; border-radius:10px; font-family:arial; text-align:justify;">
					<h1 style="color:#FFF;">Alerta</h1>
					<p style="color:#FFF;">Debe colocar el email para enviarle su clave.</p>
				</div>
				<a href="javascript:history.go(-1);" style="padding:10px; margin:20px; background-color:#274abb; border-radius:5px; font-family:arial; text-decoration:none; color:#FFF;">REGRESAR Y VERIFICAR</a>
			</center>';
		exit();
	}
	$datosCliente = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM clientes WHERE cli_email='".$_POST["email"]."'"));
	if($datosCliente[0]==0){
		echo '<center>
				<div style="padding:10px; margin:20px; width:80%; height:200px; background-color:#274abb; border-radius:10px; font-family:arial; text-align:justify;">
					<h1 style="color:#FFF;">Alerta</h1>
					<p style="color:#FFF;">Este email (<b>'.$_POST["email"].'</b>) no existe en nuestra base de datos. Por favor verifica.</p>
				</div>
				<a href="javascript:history.go(-1);" style="padding:10px; margin:20px; background-color:#274abb; border-radius:5px; font-family:arial; text-decoration:none; color:#FFF;">REGRESAR Y VERIFICAR</a>
			</center>';
		exit();
	}
	
	$fin =  '<html><body style="background-color:#E6E6E6;">';
	$fin .= '
				<center>
					<p align="center"><img src="https://jmequipos.com/img/logos/logo-white.png" width="100"></p>
					<div style="font-family:arial; background:#FFF; width:600px; color:#000; text-align:justify; padding:15px; border-radius:10px;">
						Saludos!<br>
						'.strtoupper($datosCliente["cli_nombre"]).', tus datos de acceso son:<br>
						<b>Usuario:</b> '.$datosCliente["cli_usuario"].'<br>
						<b>Clave:</b> '.$datosCliente["cli_clave"].'<br>
						
						Muchas gracias por utilizar nuestro sistema de recuperación de datos Jmequipos!.
						<p align="center" style="color:#399;">
							<img src="https://jmequipos.com/img/logos/logo-white.png" width="30"><br>
							¡Que tengas un excelente d&iacute;a!<br>
							<a href="http://jmequipos.com">www.jmequipos.com</a>
						</p>
					</div>
				</center>
				<p>&nbsp;</p>
			';	
	$fin .='';						
	$fin .=  '<html><body>';							
	$sfrom="info@jmequipos.com"; //LA CUETA DEL QUE ENVIA EL MENSAJE			
	$sdestinatario=$datosCliente["cli_email"].", tecmejia2010@gmail.com"; //CUENTA DEL QUE RECIBE EL MENSAJE			
	$ssubject="TU CLAVE DE ACCESO A JMEQUIPOS"; //ASUNTO DEL MENSAJE 				
	$shtml=$fin; //MENSAJE EN SI			
	$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 			
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 			
	$sheader=$sheader."Mime-Version: 1.0\n"; 		
	$sheader=$sheader."Content-Type: text/html; charset=UTF-8\r\n"; 			
	@mail($sdestinatario,$ssubject,$shtml,$sheader);

	echo '<script type="text/javascript">window.location.href="clientes.php?msg=1&email='.$datosCliente["cli_email"].'#msgR";</script>';
	exit();
}
//INSCRIPCIÓN A EVENTOS
if($_POST["idSQL"]==4){

	$datos = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM inscripcion WHERE ins_cedula='".$_POST["cedula"]."' AND ins_id_evento='".$_POST["idEve"]."'"));
	if($datos[0]!=0){
		echo '<center>
				<div style="padding:10px; margin:20px; width:80%; height:200px; background-color:#274abb; border-radius:10px; font-family:arial; text-align:justify;">
					<h1 style="color:#FFF;">Alerta</h1>
					<p style="color:#FFF;">Este usuario (<b>'.$_POST["cedula"].'</b>) ya se encuentra inscrito en este evento. Gracias.</p>
				</div>
				<a href="javascript:history.go(-1);" style="padding:10px; margin:20px; background-color:#274abb; border-radius:5px; font-family:arial; text-decoration:none; color:#FFF;">REGRESAR Y VERIFICAR</a>
			</center>';
		exit();
	}

	mysqli_query($conexion,"INSERT INTO inscripcion(ins_fecha, ins_asistente, ins_cedula, ins_celular, ins_email,  ins_id_evento, ins_asesor, ins_ciudad, ins_empresa)VALUES(now(), '".$_POST["asistente"]."', '".$_POST["cedula"]."', '".$_POST["cel"]."', '".$_POST["email"]."', '".$_POST["idEve"]."', '".$_POST["asesor"]."', '".$_POST["ciu"]."', '".$_POST["empresa"]."')");
	
	
	$tituloMsj = "¡INSCRIPCIÓN A EVENTOS!";
	$bgTitulo = "#041551";
	$contenidoMsj = '
		<p>
			Hola!<br>
			<b>'.strtoupper($_POST["asistente"]).'</b>, Gracias por inscribirse a nuestro evento!<br>
			A continuación le mostramos la información que suministró:<br><br>
			<b>Nombre:</b> '.strtoupper($_POST["asistente"]).'<br>
			<b>Cédula:</b> '.strtoupper($_POST["cedula"]).'<br>
			<b>Teléfono:</b> '.strtoupper($_POST["tel"]).'<br>
			<b>Email:</b> '.strtolower($_POST["email"]).'
		</p>


		<p>
			De todos los que hacemos parte de <b>JMEQUIPOS</b>...<br>
			...MUCHAS GRACIAS POR TU INTERÉS EN ESTE EVENTO!!!
		</p>
	';

		$fin =  '<html><body style="background-color:#FFF;">';
		$fin .= '
					<center>
						<div style="width:600px; text-align:justify; padding:15px;">
							<img src="https://jmequipos.com/img/logos/logo-white.png" width="100">
						</div>

						<div style="font-family:arial; background:'.$bgTitulo.'; width:600px; color:#FFF; text-align:center; padding:15px; border-radius: 10px 10px 0px 0px;">
							<h3>'.$tituloMsj.'</h3>
						</div>

						<div style="font-family:arial; background:#FAFAFA; width:600px; color:#000; text-align:justify; padding:15px;">
							'.$contenidoMsj.'
						</div>
						
						<div style="font-family:arial; background:'.$bgTitulo.'; width:600px; color:#eebd00; text-align:center; padding:5px; border-radius: 0px 0px 10px 10px;">
							<img src="https://jmequipos.com/img/logos/logo-white.png" width="80"><br>
							<b>PBX:</b> (574) 322 06 19<br>
							<b>Celular:</b> (310) 798 35 26 - (320) 235 4380<br>
							<b>Email:</b> <a href="#" style="color:#eebd00;">ventas@jmequipos.com</a><br>
							<a href="https://jmequipos.com/" style="color:#eebd00;">www.jmequipos.com</a>
						</div>
					</center>
					<p>&nbsp;</p>
				';	
		$fin .='';						
		$fin .=  '<html><body>';							
		$sfrom="ventas@jmequipos.com"; //LA CUETA DEL QUE ENVIA EL MENSAJE			
		$sdestinatario=strtolower($_POST["email"]).", ventas@jmequipos.com"; //CUENTA DEL QUE RECIBE EL MENSAJE			
		$ssubject="Inscripción al evento - JMEQUIPOS"; //ASUNTO DEL MENSAJE 				
		$shtml=$fin; //MENSAJE EN SI			
		$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 			
		$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 			
		$sheader=$sheader."Mime-Version: 1.0\n"; 		
		$sheader=$sheader."Content-Type: text/html; charset=UTF-8\r\n"; 			
		@mail($sdestinatario,$ssubject,$shtml,$sheader);
	/*
	echo "La inscripci&oacute;n fue realizada correctamente<br>
			<a href='eventos.php'>[Regresar]</a><br><br>
			<a href='https://biz.payulatam.com/L0baaa3CE18C459' style='color:blue; font-weigth:bold;'>[RESERVAR MI CUPO SÓLO PARA LAS CAPACITACIONES ($150.000)]</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='https://biz.payulatam.com/L0baaa3FC61AC4E' style='color:blue; font-weigth:bold;'>[RESERVAR MI CUPO Y LLEVARÉ MI EQUIPO PARA REVISIÓN ($100.000)]</a>
			";
			*/

	echo '<script type="text/javascript">window.location.href="eventos.php?msg=1";</script>';
	exit();
}
//INSCRIPCIÓN A EVENTOS BOLIVIA
if($_POST["idSQL"]==5){
	mysqli_query($conexion,"INSERT INTO inscripcion(ins_fecha, ins_asistente, ins_celular, ins_telefono, ins_email, ins_id_evento, ins_ciudad, ins_direccion_empresa)VALUES(now(),'".$_POST["nombre"]."','".$_POST["celular"]."','".$_POST["telefono"]."','".$_POST["email"]."','".$_POST["evento"]."', '".$_POST["ciudad"]."', '".$_POST["direccion"]."')");
	
	
	$tituloMsj = "¡INSCRIPCIÓN A EVENTOS!";
	$bgTitulo = "#041551";
	$contenidoMsj = '
		<p>
			Hola!<br>
			<b>'.strtoupper($_POST["nombre"]).'</b>, Gracias por inscribirse a nuestro evento!<br>
			A continuación le mostramos la información que suministró:<br><br>
			<b>Nombre:</b> '.strtoupper($_POST["nombre"]).'<br>
			<b>Celular:</b> '.strtoupper($_POST["celular"]).'<br>
			<b>Teléfono:</b> '.strtoupper($_POST["tel"]).'<br>
			<b>Email:</b> '.strtolower($_POST["email"]).'
		</p>


		<p>
			De todos los que hacemos parte de <b>JMEQUIPOS</b>...<br>
			...MUCHAS GRACIAS POR TU INTERÉS EN ESTE EVENTO!!!
		</p>
	';

		$fin =  '<html><body style="background-color:#FFF;">';
		$fin .= '
					<center>
						<div style="width:600px; text-align:justify; padding:15px;">
							<img src="https://jmequipos.com/img/logos/logo-white.png" width="100">
						</div>

						<div style="font-family:arial; background:'.$bgTitulo.'; width:600px; color:#FFF; text-align:center; padding:15px; border-radius: 10px 10px 0px 0px;">
							<h3>'.$tituloMsj.'</h3>
						</div>

						<div style="font-family:arial; background:#FAFAFA; width:600px; color:#000; text-align:justify; padding:15px;">
							'.$contenidoMsj.'
						</div>
						
						<div style="font-family:arial; background:'.$bgTitulo.'; width:600px; color:#eebd00; text-align:center; padding:5px; border-radius: 0px 0px 10px 10px;">
							<b>Teléfono:</b> 70307021<br>
							<b>Email:</b> <a href="#" style="color:#eebd00;">info@ingestores.com</a><br>
							<a href="https://ingestores.com/" style="color:#eebd00;">www.ingestores.com</a>
						</div>
					</center>
					<p>&nbsp;</p>
				';	
		$fin .='';						
		$fin .=  '<html><body>';
		/*
		$sfrom="ventas@jmequipos.com"; //LA CUETA DEL QUE ENVIA EL MENSAJE			
		$sdestinatario=strtolower($_POST["email"]).", ventas@jmequipos.com"; //CUENTA DEL QUE RECIBE EL MENSAJE			
		$ssubject="Inscripción al evento"; //ASUNTO DEL MENSAJE 				
		$shtml=$fin; //MENSAJE EN SI			
		$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 			
		$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 			
		$sheader=$sheader."Mime-Version: 1.0\n"; 		
		$sheader=$sheader."Content-Type: text/html; charset=UTF-8\r\n"; 			
		@mail($sdestinatario,$ssubject,$shtml,$sheader);
		*/

	echo '<script type="text/javascript">window.location.href="https://ingestores.com/index.php?msg=1";</script>';
	exit();
}
//INSCRIPCIÓN A EVENTOS FORMULARIO CORTO
if($_POST["idSQL"]==6){

	mysqli_query($conexion,"INSERT INTO inscripcion(ins_fecha, ins_asistente, ins_celular, ins_email, ins_id_evento, ins_nit)VALUES(now(), '".$_POST["nombre"]."', '".$_POST["celular"]."', '".$_POST["email"]."', '".$_POST["evento"]."', '".$_POST["documento"]."')");
	
	
	$idInsertU = mysqli_insert_id($conexion);

	//Insertamos en el CRM
	$conexionCRM = mysqli_connect("orioncrm.com.co","odermancom_jm_crm",")S{q9V7hBJv;");
	mysqli_select_db($conexion,"odermancom_jm_crm",$conexionCRM);

	mysqli_query($conexion,"INSERT INTO store_respuesta_pasarela(respz_pedido, respz_id_comercio)
	VALUES('".$idInsertU."', '24497')");
	


	?>

			<form method="post" name="frm_botonZona" action="https://store.jmequipos.com/pagos-online-pruebas/consumir.php">
								  <input name="str_descripcion_pago"   type="hidden"  value="Compra de curso LEVANTAMIENTO CON DRONE LIDAR">
								  <input name="str_id_pago" type="hidden"  value="<?=$idInsertU;?>" >
								  <input name="flt_total_con_iva"        type="hidden"  value="650000">
								  <input name="str_nombre_cliente" type="hidden"  value="<?=$_POST["nombre"];?>">
									<input name="str_apellido_cliente" type="hidden"  value="N/R">
								  <input name="str_email"    type="hidden"  value="<?=$_POST["email"];?>">
								  <input name="str_telefono_cliente"     type="hidden"  value="<?=$_POST["celular"];?>">
								  <input name="str_id_cliente"     type="hidden"  value="<?=$_POST["documento"];?>">
								</form>

		<script type="text/javascript">
			document.frm_botonZona.submit();
		</script>

	<?php
	

	echo '<script type="text/javascript">window.location.href="https://jmequipos.com/cursos/index.php?msg=1&msgtxt=ok";</script>';
	exit();
}
?>