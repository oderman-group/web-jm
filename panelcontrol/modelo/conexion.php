<?php
$conexion = mysqli_connect("jmequipos.com","jmequipo_admin","fuVwyXWMXxK5");
//if($conexion){echo "conexión exitosa";}else{echo "No hubo conexion"; exit();}
mysqli_select_db($conexion,"jmequipo_panelcontrol");

if (!mysqli_set_charset($conexion, "utf8mb4")) 
{
    printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", mysqli_error($link));
    exit();
}

$bdJM = 'jmequipo_jm';
?>