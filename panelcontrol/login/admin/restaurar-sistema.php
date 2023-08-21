<?php include("session.php");?>
<?php include("../../modelo/conexion.php");?>
<?php
mysqli_query($conexion,"DELETE FROM anuncios");
mysqli_query($conexion,"DELETE FROM blog");
mysqli_query($conexion,"DELETE FROM blog_comentarios");
mysqli_query($conexion,"DELETE FROM boletin");
mysqli_query($conexion,"DELETE FROM clientes");
mysqli_query($conexion,"DELETE FROM clientes_materiales");
mysqli_query($conexion,"DELETE FROM contactenos");
mysqli_query($conexion,"DELETE FROM eventos");
mysqli_query($conexion,"DELETE FROM eventos_inscripcion");
mysqli_query($conexion,"DELETE FROM pedidos");
mysqli_query($conexion,"DELETE FROM pedidos_items WHERE ppi_estado=1");//LOS UNICOS QUE NO SE BORRAN SON LOS QUE ESTAN PIDIENDO EN EL MOMENTO
mysqli_query($conexion,"DELETE FROM portafolio");
mysqli_query($conexion,"DELETE FROM productos");
mysqli_query($conexion,"DELETE FROM sitios_recomendados");
mysqli_query($conexion,"DELETE FROM slider");
mysqli_query($conexion,"DELETE FROM sub_categorias");
mysqli_query($conexion,"DELETE FROM subpaginas");
mysqli_query($conexion,"DELETE FROM testimonios");
mysqli_query($conexion,"DELETE FROM tienda_items");
mysqli_query($conexion,"DELETE FROM tienda_paquetes");
mysqli_query($conexion,"DELETE FROM usuarios WHERE usr_tipo!=1");
mysqli_query($conexion,"DELETE FROM videos");
mysqli_query($conexion,"DELETE FROM visitas");

echo '<script type="text/javascript">window.location.href="index.php"</script>';
exit();
?>