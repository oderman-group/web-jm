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

mysqli_query($conexion,"UPDATE ".$bdJM.".evento_subsecciones SET subsec_titulo='".$_POST["titulo"]."', subsec_estado='".$_POST["estado"]."', subsec_posicion='".$_POST["posicion"]."', subsec_tamaño='".$_POST["tamaño"]."', subsec_tipo='".$_POST["tipoContenido"]."', subsec_contenido='".$_POST[$input]."' WHERE subsec_id='".$_POST["idSubseccion"]."'");

echo '<script type="text/javascript">window.location.href="subsecciones.php?idSeccion='.$_POST["idSeccion"].'&idEvento='.$_POST['idEvento'].'"</script>';
exit();