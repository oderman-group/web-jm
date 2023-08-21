<?php 
session_start();
if($_SESSION["id"]=="")
header("Location:../../controlador/salir.php");
else
{
	//include("../analytics.php");
	/*if($_SERVER['HTTP_REFERER']==""){
		echo "<span style='font-family:Arial; color:red;'>Usted no est&aacute; accediendo de manera correcta. Utilice las opciones del sistema.</samp>";
		exit();	
	}*/
	include("../../modelo/conexion.php");
	//USUARIO ACTUAL
	$consultaUsuarioActual = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usr_id='".$_SESSION["id"]."'");
	$numUsuarioActual = mysqli_num_rows($consultaUsuarioActual);
	$datosUsuarioActual = mysqli_fetch_array($consultaUsuarioActual);
	if($datosUsuarioActual["usr_tipo"]!=1)
	{
		echo "Usted no tiene permisos para acceder a esta opci&oacute;n";
		exit();		
	}
	//SABER SI ESTA BLOQUEADO
	if($datosUsuarioActual["usr_activo"]==2)
	{
?>		
		<span style='font-family:Arial; color:red;'>Su usuario ha sido bloqueado. Por tanto no tiene permisos para acceder a la plataforma.</samp>
        <script type="text/javascript">
		function sacar(){
			window.location.href="../../controlador/salir.php";
		} 
		setInterval('sacar()', 3000);
        </script>
<?php	
    	exit();		
	}	
}
?>
