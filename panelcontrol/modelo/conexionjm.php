<?php
$conexionjm = mysqli_connect("jmequipos.com","jmequipo_admin","fuVwyXWMXxK5");
mysqli_select_db($conexionjm,"jmequipo_jm");

if (!mysqli_set_charset($conexionjm, "utf8mb4")) 
{
    printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", mysqli_error($link));
    exit();
}
?>