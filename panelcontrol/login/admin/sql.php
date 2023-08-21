<?php
include("../../modelo/conexion.php");
//include("../../modelo/conexionjm.php");
include("../../informacion.php");
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
//-----------------------------------------------------------------POST-----------------------------------------------------------------------------------------------------------------------------------------------------------------
//EDITAR INFORMACION EMPRESA
if ($_POST["id"] == 1) {
	//IMAGENES
	$conextra = "";
	$archivo = $_FILES['logo']['tmp_name'];
	$nombre = $_FILES['logo']['name'];
	$destino = "../../files/logo/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT info_logo FROM informacion WHERE info_id=1;"));
		//@unlink("../../files/logo/".$refoto["info_logo"]."");
		$conextra = ", info_logo='" . $nombre . "'";
	}
	if (trim($_POST["nomEmpresa"]) == "" or trim($_POST["emailp"]) == "" or trim($_POST["telp"]) == "" or trim($_POST["pagina"]) == "") {
		echo '<script type="text/javascript">window.location.href="confirmacion.php?msj=200"</script>';
		exit();
	}
	mysqli_query($conexion,"UPDATE informacion SET info_nombre_empresa='" . $_POST["nomEmpresa"] . "' " . $conextra . " , info_email_principal='" . $_POST["emailp"] . "', info_telefono_principal='" . $_POST["telp"] . "', info_emails='" . $_POST["emails"] . "', info_telefonos='" . $_POST["telefonos"] . "', info_terminos_condiciones='" . $_POST["terminos"] . "', info_proteccion_datos='" . $_POST["proteccionDatos"] . "', info_preguntas_frecuentes='" . $_POST["preguntas"] . "', info_direccion='" . $_POST["dir"] . "', info_mapa='" . $_POST["mapa"] . "', info_pagina_web='" . $_POST["pagina"] . "', info_logo_ancho='" . $_POST["logoAncho"] . "', info_logo_alto='" . $_POST["logoAlto"] . "' WHERE info_id=1");
	
	echo '<script type="text/javascript">window.location.href="informacion.php"</script>';
	exit();
}
//CREAR SLIDER
if ($_POST["id"] == 2) {

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/slider/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysqli_query($conexion,"INSERT INTO slider(sli_nombre, sli_imagen,  sli_activo, sli_posicion, sli_url)VALUES('" . $_POST["titulo"] . "','" . $nombre . "'," . $_POST["activo"] . "," . $_POST["posicion"] . ", '" . $_POST["url"] . "')");
	
	echo '<script type="text/javascript">window.location.href="slider.php"</script>';
	exit();
}
//EDITAR SLIDER
if ($_POST["id"] == 3) {
	$conextra = "";

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/slider/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	if ($nombre != "") {
		$conextra = ", sli_imagen='" . $nombre . "'";
	}
	// echo "UPDATE slider SET sli_nombre='".$_POST["titulo"]."' ".$conextra." , sli_url='".$_POST["url"]."', sli_activo=".$_POST["activo"].", sli_posicion=".$_POST["posicion"]." WHERE sli_id=".$_GET["id"].";";
	mysqli_query($conexion,"UPDATE slider SET sli_nombre='" . $_POST["titulo"] . "' " . $conextra . " , sli_activo=" . $_POST["activo"] . ", sli_posicion=" . $_POST["posicion"] . ", sli_url='" . $_POST["url"] . "', sli_titulo='" . $_POST["tituloP"] . "', sli_texto_corto='" . $_POST["textoCorto"] . "', sli_boton='" . $_POST["boton"] . "' 
	WHERE sli_id=" . $_GET["id"] . ";");
	
	echo '<script type="text/javascript">window.location.href="slider.php"</script>';
	exit();
}
//CREAR EVENTO
if ($_POST["id"] == 4) {

	//IMAGENES
	$destino = "../../../eventos/imagenes/";

	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	move_uploaded_file($archivo, $destino . "/" . $nombre);


	$archivo2 = $_FILES['imagen2']['tmp_name'];
	$nombre2 = $_FILES['imagen2']['name'];
	move_uploaded_file($archivo2, $destino . "/" . $nombre2);

	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".eventos(eve_nombre, eve_fecha, eve_cupo, eve_activo, eve_imagen_web, eve_imagen, eve_descripcion)VALUES('" . $_POST["titulo"] . "','" . $_POST["fecha"] . "','" . $_POST["cupos"] . "',1,'" . $_FILES['imagen']['name'] . "', '" . $_FILES['imagen2']['name'] . "', '" . $_POST["descripcion"] . "')");
	$idIte = mysqli_insert_id($conexion);
	

	echo '<script type="text/javascript">window.location.href="eventos.php"</script>';
	exit();
}
//EDITAR EVENTO
if ($_POST["id"] == 5) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../eventos/imagenes/";


	if ($nombre != "") {
		move_uploaded_file($archivo, $destino . "/" . $nombre);
		mysqli_query($conexion,"UPDATE " . $bdJM . ".eventos SET eve_imagen_web='" . $nombre . "' WHERE eve_id=" . $_POST["idE"] . ";");
		
	}


	if ($_FILES['imagen2']['name'] != "") {
		$archivo2 = $_FILES['imagen2']['tmp_name'];
		$nombre2 = $_FILES['imagen2']['name'];

		move_uploaded_file($archivo2, $destino . "/" . $nombre2);

		mysqli_query($conexion,"UPDATE " . $bdJM . ".eventos SET eve_imagen='" . $nombre2 . "' WHERE eve_id=" . $_POST["idE"] . ";");
		
	}

	mysqli_query($conexion,"UPDATE " . $bdJM . ".eventos SET eve_nombre='" . $_POST["titulo"] . "' , eve_fecha='" . $_POST["fecha"] . "', eve_cupo='" . $_POST["cupos"] . "', eve_activo='" . $_POST["activo"] . "', eve_precio='" . $_POST["precio"] . "', eve_descripcion='" . $_POST["descripcion"] . "' WHERE eve_id=" . $_POST["idE"] . ";");
	
	echo '<script type="text/javascript">window.location.href="eventos.php"</script>';
	exit();
}
//CREAR CATEGORIA
if ($_POST["id"] == 6) {
	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".gw_supcategorias(sup_nombre)VALUES('" . $_POST["titulo"] . "');");
	
	echo '<script type="text/javascript">window.location.href="categorias.php"</script>';
	exit();
}
//EDITAR CATEGORIA
if ($_POST["id"] == 7) {
	//IMAGENES	
	$nombre = $_FILES['imagen']['name'];

	if ($nombre != "") {

		$archivo = $_FILES['imagen']['tmp_name'];
		$destino = "../../../banner_productos";
		move_uploaded_file($archivo, $destino . "/" . $nombre);

		mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_supcategorias SET sup_banner='" . $nombre . "' WHERE sup_id='" . $_POST["idC"] . "'");
		
	}

	mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_supcategorias SET sup_nombre='" . $_POST["titulo"] . "' WHERE sup_id=" . $_POST["idC"] . ";");
	
	echo '<script type="text/javascript">window.location.href="categorias.php"</script>';
	exit();
}
//CREAR SUBCATEGORIA
if ($_POST["id"] == 8) {

	//IMAGENES	
	$nombre = $_FILES['imagen']['name'];

	if ($nombre != "") {

		$archivo = $_FILES['imagen']['tmp_name'];
		$destino = "../../../imagenes/categorias/";
		move_uploaded_file($archivo, $destino . "/" . $nombre);

	}

	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".gw_prod_categorias(catep_nombre, catep_id_supercat, catep_imagen)VALUES('" . $_POST["titulo"] . "','" . $_POST["categoria"] . "','" . $nombre . "');");
	
	echo '<script type="text/javascript">window.location.href="subcategorias.php"</script>';
	exit();
}
//EDITAR SUBCATEGORIA
if ($_POST["id"] == 9) {

	//IMAGENES	
	$nombre = $_FILES['imagen']['name'];

	if ($nombre != "") {

		$archivo = $_FILES['imagen']['tmp_name'];
		$destino = "../../../imagenes/categorias/";
		move_uploaded_file($archivo, $destino . "/" . $nombre);

		mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_prod_categorias SET catep_imagen='" . $nombre . "' WHERE catep_id='" . $_POST["idR"] . "'");
		
	}

	mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_prod_categorias SET catep_nombre='" . $_POST["titulo"] . "', catep_id_supercat='" . $_POST["categoria"] . "' WHERE catep_id='" . $_POST["idR"] . "'");
	
	echo '<script type="text/javascript">window.location.href="subcategorias.php"</script>';
	exit();
}

//CREAR PRODUCTO
if ($_POST["id"] == 10) {

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/productos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

		//FICHA TÉCNICA
		$archivo2 = $_FILES['fichaT']['tmp_name'];
		$nombre2 = $_FILES['fichaT']['name'];
		$destino2 = "../../../archivos/fichas/";
		move_uploaded_file($archivo2, $destino2 . "/" . $nombre2);

	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".gw_productos(prod_nombre, prod_descripcion, prod_precio, prod_img_ppal, prod_posicion,  prod_categoria, prod_destacado, prod_video, prod_caracteristicas, prod_especificaciones, prod_ficha)VALUES('" . $_POST["titulo"] . "','" . $_POST["descripcion"] . "','" . $_POST["precio"] . "','" . $nombre . "','" . $_POST["posicion"] . "','" . $_POST["categoria"] . "','" . $_POST["destacado"] . "','" . $_POST["video"] . "','" . $_POST["caracteristicas"] . "','" . $_POST["especificaciones"] . "','" . $nombre2 . "')");
	$idIte = mysqli_insert_id($conexion);
	

	echo '<script type="text/javascript">window.location.href="productos.php"</script>';
	exit();
}
//EDITAR PRODUCTO
if ($_POST["id"] == 11) {

	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/productos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	if ($nombre != "") {
		$conextra = ", prod_img_ppal='" . $nombre . "'";
	}

	//FICHA TÉCNICA

	if ($_FILES['fichaT']['name'] != "") {

		$archivo2 = $_FILES['fichaT']['tmp_name'];
		$nombre2 = $_FILES['fichaT']['name'];
		$destino2 = "../../../archivos/fichas/";
		move_uploaded_file($archivo2, $destino2 . "/" . $nombre2);
	
		mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_productos SET prod_ficha='" . $nombre2 ."' WHERE prop_id='" . $_POST["idR"] . "'");
		
	}

	mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_productos SET prod_nombre='" . $_POST["titulo"] . "', prod_descripcion='" . $_POST["descripcion"] . "', prod_precio='" . $_POST["precio"] . "' " . $conextra . " , prod_destacado ='" . $_POST["destacado"] . "', prod_posicion='" . $_POST["posicion"] . "', prod_categoria='" . $_POST["categoria"] . "', prod_video='" . $_POST["video"] . "', prod_caracteristicas='" . $_POST["caracteristicas"] . "', prod_especificaciones='" . $_POST["especificaciones"] . "', prod_mostrar_ficha='" . $_POST["mostrarFicha"] . "' WHERE prop_id='" . $_POST["idR"] . "'");
	

	echo '<script type="text/javascript">window.location.href="productos-info.php?a=2&idR=' . $_POST["idR"] . '"</script>';
	exit();
}
//CREAR VIDEOS
if ($_POST["id"] == 12) {
	mysqli_query($conexion,"INSERT INTO videos(vid_nombre, vid_descripcion, vid_video,vid_activo)VALUES('" . $_POST["titulo"] . "','" . $_POST["descripcion"] . "','" . $_POST["video"] . "','" . $_POST["activo"] . "');");
	
	echo '<script type="text/javascript">window.location.href="videos.php"</script>';
	exit();
}
//EDITAR VIDEOS
if ($_POST["id"] == 13) {
	mysqli_query($conexion,"UPDATE videos SET vid_nombre='" . $_POST["titulo"] . "', vid_descripcion='" . $_POST["descripcion"] . "', vid_video='" . $_POST["video"] . "', vid_activo='" . $_POST["activo"] . "' WHERE vid_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="videos.php"</script>';
	exit();
}
//CREAR USUARIOS
if ($_POST["id"] == 14) {
	$usuario = rand(10000, 99999);

	if ($_FILES['foto']['name'] != "") {
		$extension = end(explode(".", $_FILES['foto']['name']));
		$foto = uniqid('usr_') . "." . $extension;
		$destino = "../../files";
		move_uploaded_file($_FILES['foto']['tmp_name'], $destino . "/" . $foto);
	}

	mysqli_query($conexion,"INSERT INTO usuarios(usr_login, usr_clave, usr_nombre, usr_email, usr_tipo, usr_activo, usr_cargo, usr_foto)VALUES('" . $usuario . "','" . $usuario . "','" . $_POST["nombre"] . "','" . $_POST["email"] . "',2 ,'" . $_POST["estado"] . "', '" . $_POST["cargo"] . "', '" . $foto . "');");
	
	echo '<script type="text/javascript">window.location.href="usuarios.php"</script>';
	exit();
}
//EDITAR USUARIOS
if ($_POST["id"] == 15) {

	if ($_FILES['foto']['name'] != "") {
		$extension = end(explode(".", $_FILES['foto']['name']));
		$foto = uniqid('usr_') . "." . $extension;
		$destino = "../../files";
		move_uploaded_file($_FILES['foto']['tmp_name'], $destino . "/" . $foto);

		mysqli_query($conexion,"UPDATE usuarios SET usr_foto='" . $foto . "' WHERE usr_id='" . $_POST["idR"] . "'");
		
	}

	mysqli_query($conexion,"UPDATE usuarios SET usr_nombre='" . $_POST["nombre"] . "', usr_email='" . $_POST["email"] . "', usr_cargo='" . $_POST["cargo"] . "', usr_activo='" . $_POST["estado"] . "' WHERE usr_id=" . $_POST["idR"] . "");
	
	echo '<script type="text/javascript">window.location.href="usuarios.php"</script>';
	exit();
}
//CREAR REDES SOCIALES
if ($_POST["id"] == 16) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/icono-redsocial/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysqli_query($conexion,"INSERT INTO redes_sociales(red_nombre, red_icono, red_url)VALUES('" . $_POST["nombre"] . "','" . $nombre . "','" . $_POST["url"] . "');");
	
	echo '<script type="text/javascript">window.location.href="redes-sociales.php"</script>';
	exit();
}
//EDITAR REDES SOCIALES
if ($_POST["id"] == 17) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/icono-redsocial/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	if ($nombre != "") {
		echo "SELECT red_icono FROM redes_sociales WHERE red_id=" . $_POST["idR"] . ";";
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT red_icono FROM redes_sociales WHERE red_id=" . $_POST["idR"] . ";"));
		if ($refoto["red_icono"] != "") {
			//@unlink("../../files/icono-redsocial/".$refoto["red_icono"]."");
		}
		$conextra = ", red_icono='" . $nombre . "'";
	}
	mysqli_query($conexion,"UPDATE redes_sociales SET red_nombre='" . $_POST["nombre"] . "' " . $conextra . ", red_url='" . $_POST["url"] . "' WHERE red_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="redes-sociales.php"</script>';
	exit();
}
//CREAR PAGINAS
if ($_POST["id"] == 18) {
	mysqli_query($conexion,"INSERT INTO paginas(pag_nombre, pag_descripcion)VALUES('" . $_POST["nombre"] . "','" . mysqli_real_escape_string($conexion,$_POST["descripcion"]) . "');");
	
	echo '<script type="text/javascript">window.location.href="paginas.php"</script>';
	exit();
}
//EDITAR PAGINAS
if ($_POST["id"] == 19) {

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../nueva2021";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		mysqli_query($conexion,"UPDATE paginas SET pag_background='" . $nombre . "' WHERE pag_id='" . $_POST["idR"] . "'");
		
	}


	mysqli_query($conexion,"UPDATE paginas SET pag_nombre='" . $_POST["nombre"] . "', pag_descripcion='" . mysqli_real_escape_string($conexion,$_POST["descripcion"]) . "' WHERE pag_id=" . $_POST["idR"] . "");
	
	echo '<script type="text/javascript">window.location.href="paginas.php"</script>';
	exit();
}
//CREAR SUBPAGINAS
if ($_POST["id"] == 20) {
	mysqli_query($conexion,"INSERT INTO subpaginas(sub_nombre, sub_descripcion, sub_id_pagina, sub_activa, sub_posicion,sub_url)VALUES('" . $_POST["nombre"] . "','" . $_POST["descripcion"] . "','" . $_POST["paginap"] . "','" . $_POST["estado"] . "','" . $_POST["posicion"] . "','paginas.php');");
	
	echo '<script type="text/javascript">window.location.href="subpaginas.php"</script>';
	exit();
}
//EDITAR SUBPAGINAS
if ($_POST["id"] == 21) {
	mysqli_query($conexion,"UPDATE subpaginas SET sub_nombre='" . $_POST["nombre"] . "', sub_descripcion='" . $_POST["descripcion"] . "', sub_id_pagina='" . $_POST["paginap"] . "', sub_activa='" . $_POST["estado"] . "', sub_posicion='" . $_POST["posicion"] . "', sub_url='" . $_POST["url"] . "' WHERE sub_id=" . $_POST["idR"] . "");
	
	echo '<script type="text/javascript">window.location.href="subpaginas.php"</script>';
	exit();
}
//CREAR BLOG
if ($_POST["id"] == 22) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/blog/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	mysqli_query($conexion,"INSERT INTO blog(blog_nombre, blog_descripcion, blog_categoria, blog_imagen, blog_fecha,blog_activo)VALUES('" . $_POST["titulo"] . "','" . $_POST["descripcion"] . "','" . $_POST["categoria"] . "','" . $nombre . "','" . $_POST["fecha"] . "','" . $_POST["activo"] . "');");
	$idIte = mysqli_insert_id($conexion);
	

	if ($configuracionPagina[13] == 1) {
		//Envio de notificacion
		$destinatarios = "";
		$coninscritos = mysqli_query($conexion,"SELECT * FROM boletin");
		while ($rinscritos = mysqli_fetch_array($coninscritos)) {
			$destinatarios = $destinatarios . $rinscritos["bol_email"] . ",";
		}
		if ($destinatarios != "") {
			$destinatarios = substr($destinatarios, 0, -1);
		}
		$fin =  '<html><body>';
		$fin .= '
						Te informamos que se ha agregado un nuevo ar&iacute;culo al blog que quiz&aacute; te interese en <a href="' . $informacionPagina[12] . '">' . $informacionPagina[1] . '</a>.<br>
						<a href=' . $informacionPagina[12] . '/blog-leer.php?b=' . $idIte . '>QUIERO VER</a>
						<br>
						<br>
						<table width="80%" align="center" border="1" style="font-family:Verdana, Arial, Helvetica, sans-serif;" rules="groups" cellpadding="3" cellspacing="3">
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:center;" colspan="2">
							<h1>' . $informacionPagina[1] . '</h1>
							<img src="' . $informacionPagina[12] . '/files/logo/' . $informacionPagina[2] . '" alt="Space Invaders" width="100" />
						</td>
					</tr>
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:right;">FECHA</td>
						<td style="background:#F6F6F6; color:#000000; text-align:left;">&nbsp;' . date("d/M/Y") . '</td>
					</tr>
					
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:right;">TITULO</td>
						<td style="background:#F6F6F6; color:#000000; text-align:left;">&nbsp;' . $_POST["titulo"] . '</td>
					</tr>

					
					<tr>
						<td style="background:#FFF; color:#000; text-align:center; font-size:10px;" colspan="2">
							<span style="font-size:18px;">' . $informacionPagina[1] . '</span><br>
							' . $informacionPagina[3] . '<br>
							' . $informacionPagina[4] . '
						</td>
					</tr>
					
				</table>
						';



		$fin .= '';

		$fin .=  '<html><body>';


		$sfrom = $informacionPagina[3]; //LA CUETA DEL QUE ENVIA EL MENSAJE

		$sdestinatario = "jomejia@unac.edu.co," . $destinatarios; //CUENTA DEL QUE RECIBE EL MENSAJE

		$ssubject = "Nuevo Blog " . $_POST["titulo"] . " - " . $informacionPagina[1]; //ASUNTO DEL MENSAJE 

		$shtml = $fin; //MENSAJE EN SI

		$sheader = "From:" . $sfrom . "\nReply-To:" . $sfrom . "\n";

		$sheader = $sheader . "X-Mailer:PHP/" . phpversion() . "\n";

		$sheader = $sheader . "Mime-Version: 1.0\n";

		$sheader = $sheader . "Content-Type: text/html; charset=UTF-8\r\n";

		@mail($sdestinatario, $ssubject, $shtml, $sheader);
		//fin envio notificacion
	}

	echo '<script type="text/javascript">window.location.href="blog.php"</script>';
	exit();
}
//EDITAR BLOG
if ($_POST["id"] == 23) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/blog/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT blog_imagen FROM blog WHERE blog_id=" . $_POST["idR"] . ";"));
		if ($refoto["blog_imagen"] != "") {
			//@unlink("../../files/blog/".$refoto["blog_imagen"]."");
		}
		$conextra = ", blog_imagen='" . $nombre . "'";
	}

	mysqli_query($conexion,"UPDATE blog SET blog_nombre='" . $_POST["titulo"] . "', blog_descripcion='" . $_POST["descripcion"] . "', blog_categoria='" . $_POST["categoria"] . "' " . $conextra . " , blog_fecha='" . $_POST["fecha"] . "', blog_activo='" . $_POST["activo"] . "' WHERE blog_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="blog.php"</script>';
	exit();
}
//CREAR ANUNCIOS ESPECIALES
if ($_POST["id"] == 24) {
	mysqli_query($conexion,"INSERT INTO anuncio_especial(ape_nombre, ape_url, ape_ventana, ape_boton_titulo)VALUES('" . $_POST["nombre"] . "','" . $_POST["url"] . "','" . $_POST["modo"] . "','" . $_POST["tituloboton"] . "');");
	
	echo '<script type="text/javascript">window.location.href="anuncio-especial.php"</script>';
	exit();
}
//MODIFICAR ANUNCIOS ESPECIALES
if ($_POST["id"] == 25) {
	mysqli_query($conexion,"UPDATE anuncio_especial SET ape_nombre='" . $_POST["nombre"] . "', ape_url='" . $_POST["url"] . "', ape_ventana='" . $_POST["modo"] . "', ape_boton_titulo='" . $_POST["tituloboton"] . "', ape_activo='" . $_POST["activo"] . "' WHERE ape_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="anuncio-especial.php"</script>';
	exit();
}
//CREAR SITIOS RECOMENDADOS
if ($_POST["id"] == 26) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/recomendados/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysqli_query($conexion,"INSERT INTO sitios_recomendados(sit_nombre, sit_imagen, sit_url, sit_activo, sit_posicion)VALUES('" . $_POST["nombre"] . "','" . $nombre . "','" . $_POST["url"] . "','" . $_POST["activo"] . "','" . $_POST["posicion"] . "');");
	
	echo '<script type="text/javascript">window.location.href="sitios-recomendados.php"</script>';
	exit();
}
//EDITAR SITIOS RECOMENDADOS
if ($_POST["id"] == 27) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/recomendados/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT sit_imagen FROM sitios_recomendados WHERE sit_id=" . $_POST["idR"] . ";"));
		if ($refoto["sit_imagen"] != "") {
			//@unlink("../../files/recomendados/".$refoto["sit_imagen"]."");
		}
		$conextra = ", sit_imagen='" . $nombre . "'";
	}


	mysqli_query($conexion,"UPDATE sitios_recomendados SET sit_nombre='" . $_POST["nombre"] . "' " . $conextra . ", sit_url='" . $_POST["url"] . "', sit_activo='" . $_POST["activo"] . "', sit_posicion='" . $_POST["posicion"] . "' WHERE sit_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="sitios-recomendados.php"</script>';
	exit();
}
//CREAR ANUNCIO
if ($_POST["id"] == 28) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/siguenos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".gw_redes_sociales(red_nombre, red_enlace, red_icono)VALUES('" . $_POST["nombre"] . "','" . $_POST["enlace"] . "','" . $nombre . "');");
	
	echo '<script type="text/javascript">window.location.href="anuncios.php"</script>';
	exit();
}
//EDITAR SITIOS RECOMENDADOS
if ($_POST["id"] == 29) {


	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/siguenos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_redes_sociales SET red_icono='" . $nombre . "' WHERE red_id='" . $_POST["idR"] . "'");
	}
	mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_redes_sociales SET red_nombre='" . $_POST["nombre"] . "', red_activo='" . $_POST["activo"] . "', red_enlace='" . $_POST["enlace"] . "' WHERE red_id='" . $_POST["idR"] . "'");
	
	echo '<script type="text/javascript">window.location.href="anuncios.php"</script>';
	exit();
}
//CREAR SITIOS RECOMENDADOS
if ($_POST["id"] == 30) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/cliente/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysqli_query($conexion,"INSERT INTO clientes(cli_nombre, cli_descripcion, cli_imagen)VALUES('" . $_POST["nombre"] . "','" . $_POST["descripcion"] . "','" . $nombre . "');");
	
	echo '<script type="text/javascript">window.location.href="clientes.php"</script>';
	exit();
}
//EDITAR SITIOS RECOMENDADOS
if ($_POST["id"] == 31) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/cliente/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT cli_imagen FROM clientes WHERE cli_id=" . $_POST["idR"] . ";"));
		if ($refoto["cli_imagen"] != "") {
			//@unlink("../../files/cliente/".$refoto["cli_imagen"]."");
		}
		$conextra = ", cli_imagen='" . $nombre . "'";
	}
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysqli_query($conexion,"UPDATE clientes SET cli_nombre='" . $_POST["nombre"] . "', cli_descripcion='" . $_POST["descripcion"] . "' " . $conextra . " WHERE cli_id ='" . $_POST["idR"] . "';");
	
	echo '<script type="text/javascript">window.location.href="clientes.php"</script>';
	exit();
}
//ACTUALIZAR PEDIDOS
if ($_POST["id"] == 32) {
	mysqli_query($conexion,"UPDATE pedidos SET ped_estado='" . $_POST["estado"] . "',ped_cedula='" . $_POST["cedula"] . "', ped_nombre='" . $_POST["nombre"] . "', ped_email='" . $_POST["email"] . "', ped_telefono='" . $_POST["tel"] . "', ped_direccion='" . $_POST["dir"] . "', ped_ciudad='" . $_POST["ciudad"] . "' WHERE ped_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="pedidos.php"</script>';
	exit();
}
//CREAR PLANES
if ($_POST["id"] == 33) {
	mysqli_query($conexion,"INSERT INTO tienda_paquetes(tpp_nombre, tpp_descripcion, tpp_valor, tpp_periocidad,tpp_destacado, tpp_nombre_boton)VALUES('" . $_POST["titulo"] . "','" . $_POST["des"] . "','" . $_POST["precio"] . "','" . $_POST["periocidad"] . "','" . $_POST["destacado"] . "','" . $_POST["nombreBoton"] . "');");
	
	echo '<script type="text/javascript">window.location.href="planes.php"</script>';
	exit();
}
//EDITAR PLANES
if ($_POST["id"] == 34) {
	mysqli_query($conexion,"UPDATE tienda_paquetes SET  tpp_nombre='" . $_POST["titulo"] . "', tpp_descripcion='" . $_POST["des"] . "', tpp_valor='" . $_POST["precio"] . "', tpp_periocidad='" . $_POST["periocidad"] . "', tpp_destacado='" . $_POST["destacado"] . "', tpp_nombre_boton='" . $_POST["nombreBoton"] . "' WHERE tpp_id=" . $_POST["idR"] . "");
	
	echo '<script type="text/javascript">window.location.href="planes.php"</script>';
	exit();
}
//CREAR PLANES ITEMS
if ($_POST["id"] == 35) {
	mysqli_query($conexion,"INSERT INTO tienda_items(tpi_nombre, tpi_descripcion,tpi_paquete)VALUES('" . $_POST["titulo"] . "','" . $_POST["des"] . "','" . $_POST["paquete"] . "');");
	
	echo '<script type="text/javascript">window.location.href="planes-items.php?id=' . $_POST["paquete"] . '"</script>';
	exit();
}
//EDITAR PLANES ITEMS
if ($_POST["id"] == 36) {
	mysqli_query($conexion,"UPDATE tienda_items SET tpi_nombre='" . $_POST["titulo"] . "', tpi_descripcion='" . $_POST["des"] . "' WHERE tpi_id=" . $_POST["idR"] . "");
	
	echo '<script type="text/javascript">window.location.href="planes-items.php?id=' . $_POST["paquete"] . '"</script>';
	exit();
}
//AGREGAR LINKS DE CLIENTES
if ($_POST["id"] == 37) {
	$n = mysqli_num_rows(mysqli_query($conexion,"SELECT cpm_id, cpm_id_cliente, cpm_material, cpm_tipo FROM clientes_materiales WHERE cpm_id_cliente=" . $_POST["idC"] . ";"));
	if ($n == 0) {
		mysqli_query($conexion,"INSERT INTO clientes_materiales(cpm_id_cliente, cpm_material, cpm_tipo)VALUES('" . $_POST["idC"] . "','" . $_POST["links"] . "','2');");
	} else {
		mysqli_query($conexion,"UPDATE clientes_materiales SET cpm_material='" . $_POST["links"] . "' WHERE cpm_id_cliente=" . $_POST["idC"] . ";");
		//echo "UPDATE clientes_materiales SET cpm_material=".$_POST["links"]." WHERE cpm_id_cliente=".$_POST["idC"].";";
	}
	
	echo '<script type="text/javascript">window.location.href="cliente-materiales.php?id=' . $_POST["idC"] . '"</script>';
	exit();
}
//EDITAR CONFIGURACION
if ($_POST["id"] == 38) {
	mysqli_query($conexion,"UPDATE configuracion SET conf_fondo_encabezado='" . $_POST["fondoEncabezado"] . "', conf_fondo_prefooter='" . $_POST["fondoAntePie"] . "', conf_fondo_footer='" . $_POST["fondoPie"] . "', conf_fondo_anuncio_especial='" . $_POST["fondoAnuncioEspecial"] . "', conf_color_boton_menu='" . $_POST["colorBoton"] . "', conf_color_boton_anuncio='" . $_POST["colorAnuncio"] . "', conf_titulo_boletin='" . $_POST["tituloBoletin"] . "', conf_texto_boletin='" . $_POST["textoBoletin"] . "', conf_activo_clientes='" . $_POST["mostrarClientes"] . "', conf_activo_productos_destacados='" . $_POST["mostrarProductos"] . "', conf_boton_boletin='" . $_POST["botonBoletin"] . "', conf_logo_posicion='" . $_POST["pLogo"] . "', conf_noti_productos='" . $_POST["notiProductos"] . "', conf_noti_blog='" . $_POST["notiBlog"] . "', conf_noti_eventos='" . $_POST["notiEvento"] . "', conf_noti_eventos_inscripcion='" . $_POST["notiEventoInscripcion"] . "', conf_opacidad_menu='" . $_POST["OpacidadMenu"] . "', conf_opacidad_prefooter='" . $_POST["OpacidadPreFooter"] . "', conf_opacidad_footer='" . $_POST["OpacidadFooter"] . "' WHERE conf_id=1");
	
	echo '<script type="text/javascript">window.location.href="configuracion.php"</script>';
	exit();
}
//EDITAR PERFIL
if ($_POST["id"] == 39) {
	mysqli_query($conexion,"UPDATE usuarios SET usr_clave='" . $_POST["clave"] . "', usr_nombre='" . $_POST["nombre"] . "', usr_email='" . $_POST["email"] . "' WHERE usr_id=" . $_POST["usuarioActual"] . ";");
	
	echo '<script type="text/javascript">window.location.href="perfil.php"</script>';
	exit();
}
//EDITAR PAGINAS POR SECCIONES
if ($_POST["id"] == 40) {
	mysqli_query($conexion,"UPDATE paginas_secciones SET pps_menu='" . $_POST["menu"] . "', pps_slider='" . $_POST["slider"] . "', pps_theme='" . $_POST["theme"] . "', pps_prefooter='" . $_POST["prefooter"] . "', pps_footer='" . $_POST["footer"] . "', pps_mapa='" . $_POST["mapa"] . "', pps_modal='" . $_POST["modal"] . "' WHERE pps_id=" . $_POST["idR"] . ";");
	
	echo '<script type="text/javascript">window.location.href="paginas-config.php?idR=' . $_POST["idR"] . '"</script>';
	exit();
}
//EDITAR MODAL
if ($_POST["id"] == 41) {

	//IMAGENES
	$archivo = $_FILES['logo']['tmp_name'];
	$nombre = $_FILES['logo']['name'];
	$destino = "../../files/modal/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT mod_img FROM modal WHERE mod_id=1;"));
		//@unlink("../../files/modal/".$refoto["mod_img"]."");

		mysqli_query($conexion,"UPDATE modal SET  mod_img='" . $nombre . "' WHERE mod_id=1");
		
	}
	mysqli_query($conexion,"UPDATE modal SET mod_titulo='" . $_POST["titulo"] . "', mod_contenido='" . $_POST["descripcion"] . "', mod_link='" . $_POST["url"] . "', mod_activo='" . $_POST["activo"] . "' WHERE mod_id=1");
	

	echo '<script type="text/javascript">window.location.href="modal.php"</script>';
	exit();
}

//CREAR PORTAFOLIO
if ($_POST["id"] == 42) {
	$logo = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/productos/";
	move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . "/" . $logo);
	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".gw_img_prod(img_imagen, img_producto)VALUES('" . $logo . "','" . $_POST["prod"] . "')");
	
	echo '<script type="text/javascript">window.location.href="productos-fotos.php?prod=' . $_POST["prod"] . '"</script>';
	exit();
}

//EDITAR PORTAFOLIO
if ($_POST["id"] == 43) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/productos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		mysqli_query($conexion,"UPDATE " . $bdJM . ".gw_img_prod SET img_imagen='" . $nombre . "' WHERE img_id='" . $_POST["idR"] . "'");
		
	}

	echo '<script type="text/javascript">window.location.href="productos-fotos.php?prod=' . $_POST["prod"] . '"</script>';
	exit();
}
//EDITAR MODAL
if ($_POST["id"] == 44) {
	//IMAGENES
	$conextra = "";
	$archivo = $_FILES['logo']['tmp_name'];
	$nombre = $_FILES['logo']['name'];
	$destino = "../../files/banner-publicitarios/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT ban_imagen FROM banner_publicitarios WHERE ban_id='" . $_REQUEST["idR"] . "'"));
		$conextra = ", ban_imagen='" . $nombre . "'";
	}
	mysqli_query($conexion,"UPDATE banner_publicitarios SET ban_url='" . $_POST["url"] . "', ban_activo='" . $_POST["activo"] . "' " . $conextra . " WHERE ban_id='" . $_REQUEST["idR"] . "'");
	
	echo '<script type="text/javascript">window.location.href="banner-publicitarios.php?idR=' . $_REQUEST["idR"] . '"</script>';
	exit();
}

//CREAR MARCAS
if ($_POST["id"] == 45) {
	$logo = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/marcas/";
	move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . "/" . $logo);
	mysqli_query($conexion,"INSERT INTO " . $bdJM . ".marcas(mar_nombre, mar_icono)VALUES('" . $_POST["nombre"] . "', '" . $logo . "')");
	
	echo '<script type="text/javascript">window.location.href="marcas.php"</script>';
	exit();
}

//EDITAR MARCAS
if ($_POST["id"] == 46) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../../imagenes/marcas/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		mysqli_query($conexion,"UPDATE " . $bdJM . ".marcas SET mar_icono='" . $nombre . "' WHERE mar_id='" . $_POST["idR"] . "'");
		
	}

	mysqli_query($conexion,"UPDATE " . $bdJM . ".marcas SET mar_nombre='" . $_POST["nombre"] . "' WHERE mar_id='" . $_POST["idR"] . "'");
		

	echo '<script type="text/javascript">window.location.href="marcas.php"</script>';
	exit();
}


//===============================================================================================================================================================================================================================================GET====================GET=========GET===GET====GET======GET===GET====GET====GET=======GET================================================================================================
//ELIMINAR EVENTO
if ($_GET["get"] == 1) {

	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".inscripcion WHERE ins_id_evento='" . $_GET["idE"] . "'");
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".eventos WHERE eve_id='" . $_GET["idE"] . "'");
	
	//@unlink("../../files/eventos/".$rimg["eve_imagen"]);
	$ruta = "../../files/eventos/" . $_GET["idE"] . "/";  //nombre de la carpeta
	$ruta2 = "../../files/eventos/" . $_GET["idE"] . "/thumbnail/";  //nombre de la carpeta
	$images = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);
	if (count($images) > 0) {
		foreach ($images as $img) {
			//@unlink($img);
		}
	}
	$images2 = glob("$ruta2{*.gif,*.jpg,*.png}", GLOB_BRACE);
	if (count($images2) > 0) {
		foreach ($images2 as $img2) {
			//@unlink($img2);
		}
	}
	rmdir("../../files/eventos/" . $_GET["idE"] . "/thumbnail");
	rmdir("../../files/eventos/" . $_GET["idE"]);


	echo '<script type="text/javascript">window.location.href="eventos.php";</script>';
	exit();
}
//DESACTIVAR CATEGORIA
if ($_GET["get"] == 2) {

	mysqli_query($conexion,"UPDATE categorias SET cat_activa=2 WHERE cat_id='" . $_GET["idC"] . "'");
	echo '<script type="text/javascript">window.location.href="categorias.php";</script>';
	exit();
}
//ACTIVAR CATEGORIA
if ($_GET["get"] == 11) {

	mysqli_query($conexion,"UPDATE categorias SET cat_activa=1 WHERE cat_id='" . $_GET["idC"] . "'");
	echo '<script type="text/javascript">window.location.href="categorias.php";</script>';
	exit();
}
//ELIMINAR SUBCATEGORIA
if ($_GET["get"] == 3) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".gw_prod_categorias WHERE catep_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="subcategorias.php";</script>';
	exit();
}
//ELIMINAR PRODUCTOS
if ($_GET["get"] == 4) {

	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".gw_productos WHERE prop_id='" . $_GET["idp"] . "'");
	echo '<script type="text/javascript">window.location.href="productos.php";</script>';
	exit();
}
//ELIMINAR VIDEOS
if ($_GET["get"] == 5) {
	mysqli_query($conexion,"DELETE FROM videos WHERE vid_id='" . $_GET["idv"] . "'");
	echo '<script type="text/javascript">window.location.href="videos.php";</script>';
	exit();
}
//ELIMINAR USUARIOS
if ($_GET["get"] == 6) {
	mysqli_query($conexion,"DELETE FROM usuarios WHERE usr_id='" . $_GET["idu"] . "'");
	echo '<script type="text/javascript">window.location.href="usuarios.php";</script>';
	exit();
}
//ELIMINAR REDES SOCIALES
if ($_GET["get"] == 7) {
	$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT red_icono FROM redes_sociales WHERE red_id=" . $_GET["idS"] . ";"));
	if ($refoto["red_icono"] != "") {
		//@unlink("../../files/icono-redsocial/".$refoto["red_icono"]."");
	}
	mysqli_query($conexion,"DELETE FROM redes_sociales WHERE red_id='" . $_GET["idS"] . "'");
	echo '<script type="text/javascript">window.location.href="redes-sociales.php";</script>';
	exit();
}
//DESACTIVAR PAGINAS
if ($_GET["get"] == 8) {
	mysqli_query($conexion,"UPDATE paginas SET pag_activa=2 WHERE pag_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="paginas.php";</script>';
	exit();
}
//ELIMINAR SUBPAGINAS
if ($_GET["get"] == 9) {
	mysqli_query($conexion,"DELETE FROM subpaginas WHERE sub_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="subpaginas.php";</script>';
	exit();
}
//ACTIVAR PAGINAS
if ($_GET["get"] == 10) {
	mysqli_query($conexion,"UPDATE paginas SET pag_activa=1 WHERE pag_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="paginas.php";</script>';
	exit();
}
//ELIMINAR CONTACTENOS
if ($_GET["get"] == 12) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".f_contacto WHERE fcon_id='" . $_GET["idR"] . "'", $conexionjm);
	echo '<script type="text/javascript">window.location.href="contacto.php";</script>';
	exit();
}
//ELIMINAR SUBSCRITOS A BOLETIN
if ($_GET["get"] == 13) {
	mysqli_query($conexion,"DELETE FROM boletin WHERE bol_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="boletin.php";</script>';
	exit();
}
//ELIMINAR BLOG
if ($_GET["get"] == 14) {

	$refoto = mysqli_fetch_array(mysqli_query($conexion,"SELECT blog_imagen FROM blog WHERE blog_id=" . $_GET["idR"] . ";"));
	if ($refoto["blog_imagen"] != "") {
		//@unlink("../../files/blog/".$refoto["blog_imagen"]."");
	}
	$numcoment = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM blog_comentarios where blogc_blog=" . $_GET["idR"] . ";"));
	if ($numcoment > 0) {
		mysqli_query($conexion,"DELETE FROM blog_comentarios WHERE blogc_blog='" . $_GET["idR"] . "'");
	}
	mysqli_query($conexion,"DELETE FROM blog WHERE blog_id='" . $_GET["idR"] . "'");
	
	echo '<script type="text/javascript">window.location.href="blog.php";</script>';
	exit();
}
//ELIMINAR ANUNCIO ESPECIAL
if ($_GET["get"] == 15) {
	mysqli_query($conexion,"DELETE FROM anuncio_especial WHERE ape_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="anuncio-especial.php";</script>';
	exit();
}
//ELIMINAR ANUNCIO ESPECIAL
if ($_GET["get"] == 16) {
	mysqli_query($conexion,"DELETE FROM sitios_recomendados WHERE sit_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="sitios-recomendados.php";</script>';
	exit();
}
//ELIMINAR ANUNCIO
if ($_GET["get"] == 17) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".gw_redes_sociales WHERE red_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="anuncios.php";</script>';
	exit();
}
//APROBAR EVENTOS
if ($_GET["get"] == 18) {
	mysqli_query($conexion,"UPDATE eventos_inscripcion SET epi_estado='2' WHERE epi_id=" . $_GET["idR"] . "");
	if ($configuracionPagina[16] == 1) {
		$inscripcion = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM eventos_inscripcion ei INNER JOIN eventos e ON ei.epi_id_evento=e.eve_id WHERE eve_id='" . $_GET["idR"] . "'"));
	}
	echo '<script type="text/javascript">window.location.href="inscripcion-eventos.php";</script>';
	exit();
}

//DESAPROBAR EVENTOS
if ($_GET["get"] == 19) {
	mysqli_query($conexion,"UPDATE eventos_inscripcion SET epi_estado='3' WHERE epi_id=" . $_GET["idR"] . "");
	if ($configuracionPagina[16] == 1) {
		$inscripcion = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM eventos_inscripcion ei INNER JOIN eventos e ON ei.epi_id_evento=e.eve_id WHERE eve_id='" . $_GET["idR"] . "'"));
	}
	echo '<script type="text/javascript">window.location.href="inscripcion-eventos.php";</script>';
	exit();
}

//ELIMINAR CLIENTES
if ($_GET["get"] == 20) {
	mysqli_query($conexion,"DELETE FROM clientes WHERE cli_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="clientes.php";</script>';
	exit();
}
//ELIMINAR COMENTARIO BLOG
if ($_GET["get"] == 21) {
	mysqli_query($conexion,"DELETE FROM blog_comentarios WHERE blogc_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="blog-items.php?id=' . $_GET["idR"] . '";</script>';
	exit();
}
//ELIMINAR PLAN
if ($_GET["get"] == 22) {
	mysqli_query($conexion,"DELETE FROM tienda_items WHERE tpi_paquete='" . $_GET["idR"] . "'");
	mysqli_query($conexion,"DELETE FROM tienda_paquetes WHERE tpp_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="planes.php";</script>';
	exit();
}
//ELIMINAR ITEM PLAN
if ($_GET["get"] == 23) {
	mysqli_query($conexion,"DELETE FROM tienda_items WHERE tpi_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="planes-items.php?id=' . $_GET["idR"] . '";</script>';
	exit();
}
//ELIMINAR SLIDER
if ($_GET["get"] == 24) {
	mysqli_query($conexion,"DELETE FROM slider WHERE sli_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="slider.php?id=' . $_GET["idR"] . '";</script>';
	exit();
}
//ELIMINAR PORTAFOLIO
if ($_GET["get"] == 25) {
	mysqli_query($conexion,"DELETE FROM portafolio WHERE por_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="portafolio.php";</script>';
	exit();
}
//ELIMINAR PEDIDOS
if ($_GET["get"] == 26) {
	mysqli_query($conexion,"DELETE FROM pedidos_items WHERE ppi_id_pedido='" . $_GET["idR"] . "'");
	mysqli_query($conexion,"DELETE FROM pedidos WHERE ped_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="pedidos.php";</script>';
	exit();
}
//ELIMINAR INSCRIPCION EVENTOS
if ($_GET["get"] == 27) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".inscripcion WHERE ins_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="' . $_SERVER["HTTP_REFERER"] . '";</script>';
	exit();
}
//ELIMINAR VISITAS
if ($_GET["get"] == 28) {
	mysqli_query($conexion,"DELETE FROM visitas WHERE vis_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="visitas.php";</script>';
	exit();
}
//ELIMINAR SONIDOS
if ($_GET["get"] == 29) {
	mysqli_query($conexion,"UPDATE paginas SET pag_musica='' WHERE pag_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="paginas-info.php?idR=' . $_GET["idR"] . '&a=2";</script>';
	exit();
}
//ELIMINAR FONDO
if ($_GET["get"] == 30) {
	mysqli_query($conexion,"UPDATE paginas SET pag_background='' WHERE pag_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="paginas-info.php?idR=' . $_GET["idR"] . '&a=2";</script>';
	exit();
}

//ELIMINAR CATEGORIA
if ($_GET["get"] == 31) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".gw_supcategorias WHERE sup_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="categorias.php";</script>';
	exit();
}

//ELIMINAR fotos de productos
if ($_GET["get"] == 32) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".gw_img_prod WHERE img_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="productos-fotos.php?prod=' . $_GET["prod"] . '";</script>';
	exit();
}

//ELIMINAR MARCAS
if ($_GET["get"] == 33) {
	mysqli_query($conexion,"DELETE FROM " . $bdJM . ".marcas WHERE mar_id='" . $_GET["idR"] . "'");
	echo '<script type="text/javascript">window.location.href="marcas.php";</script>';
	exit();
}
