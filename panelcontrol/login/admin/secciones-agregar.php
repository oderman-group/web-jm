<?php
include("../../modelo/conexion.php");
include("header.php");
?>
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2_metro.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/clockface/css/clockface.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
	<link href="../assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../assets/plugins/jquery-tags-input/jquery.tagsinput.css" />
	<!-- END PAGE LEVEL STYLES -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<?php include("encabezado.php");?>
    
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
    
		<?php include("menu.php");?>
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
						
                        <?php include("panel-color.php");?> 
                        
						<h3 class="page-title">
							Agregar Sección
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Incio</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="eventos.php">Eventos</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="secciones.php?idEvento=<?=$_GET['idEvento'];?>">Secciones</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">Agregar Sección</a></li>
						</ul>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE FORM PORTLET-->   
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-info"></i>Agregar Sección</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
                                
								<form action="secciones-guardar.php" class="form-horizontal" method="post" enctype="multipart/form-data">
									<input type="hidden" name="idEvento" value="<?=$_GET["idEvento"]?>">
                                    
                                    <div class="control-group">
										<label class="control-label">Titulo Descriptivo
											<button class="tooltipp">Descripción corta, que haga referencia a la sección.</button>
											<i class="fa-solid fa-circle-question"></i>
										</label>
										<div class="controls">
											<input class="span10 m-wrap" name="titulo" value="">
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Posición
											<button class="tooltipp">Posición en la que deseas que se vea la sección.</button>
											<i class="fa-solid fa-circle-question"></i>
										</label>
										<div class="controls">
											<input type="number" class="small m-wrap" name="posicion" value="">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tamaño
											<button class="tooltipp">El espacio tiene un total de 12 columnas.</button>
											<i class="fa-solid fa-circle-question"></i>
										</label>
										<div class="controls">
											<select class="small m-wrap" name="tamaño" tabindex="1">
												<?php for($i=1; $i<=12; $i++){?>
													<option value="<?=$i?>"><?=$i?> Columna</option>
												<?php }?>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Estado</label>
										<div class="controls">
											<select class="small m-wrap" name="estado" tabindex="1">
												<option value="ACTIVO" >ACTIVO</option>
												<option value="INACTIVO" >INACTIVO</option>
											</select>
										</div>
									</div>

                                    <div class="form-actions">
										<button type="submit" class="btn blue">Guardar</button>
										<button type="button" class="btn gris">Cancelar</button>     
									</div>
								</form>
								<!-- END FORM-->  

							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
                        
					</div>
				</div>
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->
	
	<?php include("pie.php");?>
    
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="../assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src=../"assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="../assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="../assets/plugins/ckeditor/ckeditor.js"></script>  
	<script type="text/javascript" src="../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="../assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
	<script type="text/javascript" src="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="../assets/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
	<script type="text/javascript" src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
	<script type="text/javascript" src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
	<script type="text/javascript" src="../assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>   
	<script src="../assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript" ></script>
	<script src="../assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
	<script src="../assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript" ></script>
	<script src="../assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
	<script src="../assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="../assets/scripts/app.js"></script>
	<script src="../assets/scripts/form-components.js"></script>     
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   FormComponents.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>