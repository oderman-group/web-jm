<?php 
//session_start();
//$_SESSION["bd"] = date("Y");
include("../modelo/conexion.php");
$pos = strstr($_POST["jUsUaRiO"], '#');
if($pos){
	header("Location:http://www.eumed.net/rev/cccss/04/rbar2.pdf");
	exit();
}
$rst_usrE = mysqli_query($conexion,"SELECT usr_login FROM usuarios WHERE usr_login='".$_POST["jUsUaRiO"]."'");
$numE = mysqli_num_rows($rst_usrE);
if($numE==0){
	header("Location:../login/index.php?error=1");
	exit();
}
$rst_usr = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usr_login='".$_POST["jUsUaRiO"]."' AND usr_clave='".$_POST["jClAvE"]."'");
$num = mysqli_num_rows($rst_usr);
$fila = mysqli_fetch_array($rst_usr);
if($num>0)
{
	session_start();
	$_SESSION["id"] = $fila["usr_id"];
	switch($fila["usr_tipo"]){
		case 1:
		  $url = '../login/admin/';
		break;
		
		case 2:
		  $url = '../area-clientes.php';
		break;
	}
	/*mysqli_query($conexion,"UPDATE gen_usuarios SET usu_sesion_activa=1 WHERE usu_id='".$fila[0]."'");*/
	header("Location:".$url);
	exit();
}else{
	header("Location:../login/index.php?error=2");
	exit();
}
?>