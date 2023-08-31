<?php
include("../../modelo/conexion.php");

if (!empty($_FILES['portada']['name'])) {
    $archivo = $_FILES['portada']['tmp_name'];
    $nombrePortado = $_FILES['portada']['name'];
    $destino = "../../../archivos/catalogos/imgPortada";
    move_uploaded_file($archivo, $destino . "/" . $nombrePortado);
    
    mysqli_query($conexion,"UPDATE ".$bdJM.".catalogos SET cata_imagen='".$nombrePortado."' WHERE cata_id=".$_POST["id"]."");
}

if (!empty($_FILES['documento']['name'])) {
    $archivo = $_FILES['documento']['tmp_name'];
    $nombreDocumento = $_FILES['documento']['name'];
    $destino = "../../../archivos/catalogos";
    move_uploaded_file($archivo, $destino . "/" . $nombreDocumento);

    mysqli_query($conexion,"UPDATE ".$bdJM.".catalogos SET cata_archivo='".$nombreDocumento."' WHERE cata_id=".$_POST["id"]."");
}

mysqli_query($conexion,"UPDATE ".$bdJM.".catalogos SET cata_nombre='".$_POST["titulo"]."', cata_activo='".$_POST["estado"]."', cata_qrecursos='".$_POST["qRecursos"]."' WHERE cata_id='".$_POST["id"]."'");

echo '<script type="text/javascript">window.location.href="catalogos.php"</script>';
exit();