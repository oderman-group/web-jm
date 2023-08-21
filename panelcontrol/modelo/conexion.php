<?php
$conexion = mysqli_connect("jmequipos.com","jmequipo_admin","fuVwyXWMXxK5");
//if($conexion){echo "conexión exitosa";}else{echo "No hubo conexion"; exit();}
mysqli_select_db($conexion,"jmequipo_panelcontrol");

$bdJM = 'jmequipo_jm';
?>