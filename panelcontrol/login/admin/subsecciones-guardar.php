<?php
include("../../modelo/conexion.php");

switch ($_POST["tipoContenido"]) {
    case "IMAGEN":
        $input = "contenidoImagen";
        if (!empty($_FILES[$input]['name'])) {
                        
            $extensionParte1 = explode(".", $_FILES[$input]['name']);
            $extension = end($extensionParte1);
            $nombreArchivoFinal = uniqid("even" . "_") . "." . $extension;
            $rutaCompleta = "../../../eventos/imagenes/subsecciones/" . $nombreArchivoFinal;
            move_uploaded_file($_FILES[$input]['tmp_name'], $rutaCompleta);
        }
        $_POST[$input] = $nombreArchivoFinal;
        break;

    case "VIDEO":
        $input = "contenidoVideo";
        break;

    case "TEXTO":
        $input = "contenidoTexto";
        break;
}

mysqli_query($conexion,"INSERT INTO ".$bdJM.".evento_subsecciones(subsec_id_seccion, subsec_posicion, subsec_titulo, subsec_tamaño, subsec_estado, subsec_tipo, subsec_contenido) VALUES ('".$_POST["idSeccion"]."','".$_POST["posicion"]."','".$_POST["titulo"]."','".$_POST["tamaño"]."','".$_POST["estado"]."','".$_POST["tipoContenido"]."','".$_POST[$input]."');");

echo '<script type="text/javascript">window.location.href="subsecciones.php?idSeccion='.$_POST["idSeccion"].'&idEvento='.$_POST['idEvento'].'"</script>';
exit();