<?php
include("../../modelo/conexion.php");
include("header.php");
?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2_metro.css" />
<link rel="stylesheet" href="../assets/plugins/data-tables/DT_bootstrap.css" />
<!-- END PAGE LEVEL STYLES -->



</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<?php include("encabezado.php"); ?>

	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">

		<?php include("menu.php"); ?>


		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">

						<?php include("panel-color.php"); ?>

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Subsecciones<small>...</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Inicio</a>
								<i class="icon-angle-right"></i>
							</li>

							<li>
								<a href="eventos.php">Eventos</a>
								<i class="icon-angle-right"></i>
							</li>

							<li>
								<a href="secciones.php?idEvento=<?=$_GET['idEvento'];?>">Secciones</a>
								<span class="icon-angle-right"></span>
							</li>

							<li>
								<a href="#">Subsecciones</a>
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption"><i class="icon-group"></i>Subsecciones</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="subsecciones-agregar.php?idSeccion=<?=$_GET["idSeccion"];?>&idEvento=<?=$_GET['idEvento'];?>" class="btn green">Agregar <i class="icon-plus"></i></a>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th>ID</th>
											<th>Titulo</th>
											<th>Posición</th>
											<th>Tamaño</th>
											<th>Tipo Contenido</th>
											<th>Contenido</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                        $num=1;
										$consulta = mysqli_query($conexion,"SELECT * FROM ".$bdJM.".evento_subsecciones WHERE subsec_id_seccion=".$_GET['idSeccion'].";");
										while ($resultado = mysqli_fetch_array($consulta)) {
                                            switch($resultado["subsec_tipo"]){
                                                case 'IMAGEN';
                                                    $contenido = '<td><img src="../../../eventos/imagenes/subsecciones/'.$resultado["subsec_contenido"].'" width="30" height="30"></td>';
                                                break;
                                                case 'VIDEO';
                                                    $contenido = '<td><a href="https://www.youtube.com/watch?v='.$resultado["subsec_contenido"].'" target="_blank">https://www.youtube.com/watch?v='.$resultado["subsec_contenido"].'</a></td>';
                                                break;
                                                case 'TEXTO';
													$texto = htmlspecialchars(strip_tags($resultado["subsec_contenido"]));
                                                    $contenido = '
														<td title="'.$texto.'"
															data-observacion="'.$texto.'"
															onclick="toggleFullText(this)"
															style="cursor: pointer;">
															'.substr($texto, 0, 100).'...
														</td>
													';
                                                break;
                                                default;
                                                    $contenido = '<td></td>';
                                                break;
                                            }

                                            switch($resultado["subsec_estado"]){
                                                case 'ACTIVO';
                                                    $activo = 'success';
                                                break;
                                                case 'INACTIVO';
                                                    $activo = 'grey';
                                                break;
                                                default;
                                                    $activo = 'grey';
                                                break;
                                            }
										?>
											<tr class="odd gradeX">
												<td><?= $num; ?></td>
												<td><?= $resultado["subsec_titulo"]; ?></td>
												<td><?= $resultado["subsec_posicion"]; ?></td>
												<td><?= $resultado["subsec_tamaño"]; ?> Columna</td>
												<td><?= $resultado["subsec_tipo"]; ?></td>
												<?= $contenido; ?>
												<td><span class="label label-<?=$activo?>"><?= $resultado["subsec_estado"]?></span></td>
												<td>
													<a href="subsecciones-editar.php?idSubseccion=<?= $resultado['subsec_id']; ?>&idSeccion=<?=$_GET["idSeccion"];?>&idEvento=<?=$_GET['idEvento'];?>"><img src="../../files/iconos/edit.png"></a>
													<a href="subsecciones-eliminar.php?idSubseccion=<?= $resultado['subsec_id']; ?>&idSeccion=<?=$_GET["idSeccion"];?>&idEvento=<?=$_GET['idEvento'];?>" onClick="if(!confirm('Desea eliminar este registro?')){return false;}"><img src="../../files/iconos/deletle.png"></a>
												</td>
											</tr>
										<?php $num++; } ?>

									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<?php include("pie.php"); ?>

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="../assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->

	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="../assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="../assets/scripts/app.js"></script>
	<script src="../assets/scripts/table-managed.js"></script>
	<script>
		jQuery(document).ready(function() {
			App.init();
			TableManaged.init();
		});

		function toggleFullText(element) {
			const fullText = element.getAttribute('data-observacion'); // Obtiene el texto completo del atributo 'data-observacion'.
			const isExpanded = element.getAttribute('data-expanded') === 'true'; // Verifica si el texto ya está expandido.

			if (isExpanded) {
				element.innerHTML = fullText.substring(0, 100) + '...'; // Trunca el texto a 100 caracteres y añade '...'.
				element.setAttribute('data-expanded', 'false'); // Marca el elemento como no expandido.
			} else {
				element.innerHTML = fullText; // Muestra el texto completo.
				element.setAttribute('data-expanded', 'true'); // Marca el elemento como expandido.
			}
		}
	</script>

</body>
<!-- END BODY -->

</html>