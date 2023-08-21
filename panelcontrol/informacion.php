<?php
session_start();
if(empty($_SESSION["id"])){
	$usuarioActivo = $_SERVER['REMOTE_ADDR'];
}else{
	$usuarioActivo = $_SESSION["id"];
}
$informacionPagina = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM informacion WHERE info_id=1"));
$configuracionPagina = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM configuracion WHERE conf_id=1"));
?>
<?php
$consultaVisita = mysqli_query($conexion,"SELECT * FROM visitas WHERE vis_usuario='".$usuarioActivo."'");
$numVisita = mysqli_num_rows($consultaVisita);
$datoVisita = mysqli_fetch_array($consultaVisita);
if($numVisita>0){
	$suma = $datoVisita[4]+1;
	mysqli_query($conexion,"UPDATE visitas SET vis_cantidad='".$suma."' WHERE vis_usuario='".$usuarioActivo."' AND date(vis_fecha)='".date("Y-m-d")."'");
}else{
	mysqli_query($conexion,"INSERT INTO visitas(vis_fecha, vis_usuario, vis_referencia, vis_cantidad, vis_url_pagina)VALUES(now(),'".$usuarioActivo."', '".$_SERVER['HTTP_REFERER']."',1,'".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."')");
}
?>