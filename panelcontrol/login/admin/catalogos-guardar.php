<?php
include("../../modelo/conexion.php");

$nombrePortado="";
if (!empty($_FILES['portada']['name'])) {
    $archivo = $_FILES['portada']['tmp_name'];
    $nombrePortado = $_FILES['portada']['name'];
    $destino = "../../../archivos/catalogos/imgPortada";
    move_uploaded_file($archivo, $destino . "/" . $nombrePortado);
}

$nombreDocumento="";
if (!empty($_FILES['documento']['name'])) {
    $archivo = $_FILES['documento']['tmp_name'];
    $nombreDocumento = $_FILES['documento']['name'];
    $destino = "../../../archivos/catalogos";
    move_uploaded_file($archivo, $destino . "/" . $nombreDocumento);
}

mysqli_query($conexion,"INSERT INTO ".$bdJM.".catalogos(cata_nombre, cata_imagen, cata_archivo, cata_activo, cata_qrecursos)VALUES('".$_POST["titulo"]."','".$nombrePortado."','".$nombreDocumento."','".$_POST["estado"]."','".$_POST["qRecursos"]."');");

echo '<script type="text/javascript">window.location.href="catalogos.php"</script>';
exit();