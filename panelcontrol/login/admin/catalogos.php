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
							Catalogos<small>...</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Inicio</a>
								<i class="icon-angle-right"></i>
							</li>

							<li><a href="#">Catalogos</a></li>
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
								<div class="caption"><i class="icon-group"></i>Catalogos</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="catalogos-agregar.php" class="btn green">Agregar <i class="icon-plus"></i></a>
									</div>
								</div>
								<?php
								$consulta = mysqli_query($conexion,"SELECT * FROM ".$bdJM.".catalogos");
								?>
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nombre</th>
											<th>Portada</th>
											<th>Archivo</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                        $num=1;
										while ($resultado = mysqli_fetch_array($consulta)) {
                                            switch($resultado["cata_activo"]){
                                                case 1;
                                                    $activo = '<span class="label label-success">ACTIVO</span>';
                                                break;
                                                case 0;
                                                    $activo = '<span class="label label-grey">INACTIVO</span>';
                                                break;
                                                default;
                                                    $activo = '';
                                                break;
                                            }
										?>
											<tr class="odd gradeX">
												<td><?= $num; ?></td>
												<td><?= $resultado["cata_nombre"]; ?></td>
                                                <td>
                                                    <?php if(!empty($resultado["cata_imagen"])){ ?>
                                                        <img src="../../../archivos/catalogos/imgPortada/<?=$resultado["cata_imagen"];?>" width="30">
										            <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if(!empty($resultado["cata_archivo"])){ ?>
                                                        <a href="../../../archivos/catalogos/<?=$resultado["cata_archivo"];?>" target="_blank"><?= $resultado["cata_archivo"]; ?></a>
										            <?php } ?>
                                                </td>
												<td><?= $activo; ?></td>
												<td>
													<a href="catalogos-editar.php?id=<?= $resultado[0]; ?>"><img src="../../files/iconos/edit.png"></a>
													<a href="catalogos-eliminar.php?id=<?= $resultado[0]; ?>" onClick="if(!confirm('Desea eliminar este registro?')){return false;}"><img src="../../files/iconos/deletle.png"></a>
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
	</script>

</body>
<!-- END BODY -->

</html>