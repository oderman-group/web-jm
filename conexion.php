<?php
$conexion = mysqli_connect("jmequipos.com","jmequipo_admin","fuVwyXWMXxK5");
mysqli_select_db($conexion,"jmequipo_jm");

if (!mysqli_set_charset($conexion, "utf8mb4")) 
{
    printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", mysqli_error($link));
    exit();
}

$bdPanelControl = 'jmequipo_panelcontrol';
?>