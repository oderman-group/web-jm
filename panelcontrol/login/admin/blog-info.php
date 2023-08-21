<?php include("../../modelo/conexion.php");?>
<?php include("header.php");?>
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2_metro.css" />
	<link rel="stylesheet" type="text/css" href=../"assets/plugins/clockface/css/clockface.css" />
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
			<?php include("ayuda-modal.php");?>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="span12">
						
                        <?php include("panel-color.php");?> 
                        
						<h3 class="page-title">
							Blog
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Incio</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="blog.php">Blog</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">Informaci&oacute;n</a></li>
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
								<div class="caption"><i class="icon-info"></i>Informaci&oacute;n</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config4" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
                                
								<form action="sql.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <?php
								if($_GET["a"]==1){
									echo '<input type="hidden" name="id" value="22">';
									$consulta = mysqli_query($conexion,"SELECT blog_id, blog_nombre, blog_descripcion, blog_categoria, blog_imagen, blog_fecha,blog_activo FROM blog;");
									$n = mysqli_num_rows($consulta);
								}	
								elseif($_GET["a"]==2){
									echo '<input type="hidden" name="id" value="23">';
									echo '<input type="hidden" name="idR" value="'.$_GET["idR"].'">';
									$consulta = mysqli_query($conexion,"SELECT blog_id, blog_nombre, blog_descripcion, blog_categoria, blog_imagen, blog_fecha,blog_activo FROM blog WHERE blog_id='".$_GET["idR"]."'");
									$resultado = mysqli_fetch_array($consulta);
								}	
								?>

                                    
                                    <div class="control-group">
										<label class="control-label">T&iacute;tulo</label>
										<div class="controls">
											<input class="span12 m-wrap" name="titulo" value="<?=$resultado["blog_nombre"];?>">
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Descripci&oacute;n</label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="descripcion" rows="6"><?=$resultado["blog_descripcion"];?></textarea>
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">Imagen <br>
                                        Medidas:(1000 x 500) - Peso: (2 MB M&aacute;ximo)</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if($resultado["blog_imagen"]!=""){?>
                                                <img src="../../files/blog/<?=$resultado["blog_imagen"]?>" alt="" />
												<?php }else{?>
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Ninguna+imagen" alt="" />
												<?php }?>
                                                </div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" class="default" name="imagen" /></span>
													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
											
											
										</div>
									</div>
                                    <div class="control-group">
									  <label class="control-label">Categor&iacute;a</label>
										<div class="controls">
											<?php
											$cT = mysqli_query($conexion,"SELECT scat_id, scat_nombre, scat_descripcion, scat_opcion FROM sub_categorias WHERE scat_opcion=2");
											if($nCat = mysqli_num_rows($cT)==0){
												echo '<script type="text/javascript">window.location.href="'.$_SERVER['PHP_SELF'].'#portlet-config4"</script>';
											}
											?>
                                            <select data-placeholder="Escoja una opcion" class="chosen span6" tabindex="-1" name="categoria">
												<option value="">--Seleccione categoria--</option>
													<?php 
													while($i = mysqli_fetch_array($cT)){
														if($i["scat_id"]==$resultado["blog_categoria"])
															echo '<option value="'.$i["scat_id"].'" selected>'.$i["scat_nombre"].'</option>';
														else
															echo '<option value="'.$i["scat_id"].'">'.$i["scat_nombre"].'</option>';	
													}
													?>
											</select>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Fecha</label>
										<div class="controls">
											<input type="date" class="span3 m-wrap" name="fecha" value="<?=$resultado["blog_fecha"];?>">
										</div>
									</div>
                                    <div class="control-group">
													<label class="control-label">Activo</label>
													<div class="controls">
													   <select class="small m-wrap" name="activo" tabindex="1">
												       <option value="1" <?php if($resultado["blog_activo"]==1){echo "selected";}?>>Si</option>
                                                       <option value="2" <?php if($resultado["blog_activo"]==2){echo "selected";}?>>No</option>
													   </select>
													</div>
								  </div>
                                  <div class="form-actions">
									<button type="submit" class="btn blue">Guardar</button>
										<button type="button" class="btn">Cancelar</button>     
									</div>
								</form>
								<!-- END FORM-->  

							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
                        
                       <?php
					   if($_GET["a"]==2){
					   ?> 
                        <!-- BEGIN SAMPLE FORM PORTLET-->   
						
						<!-- END SAMPLE FORM PORTLET-->
                        
                        <?php } ?>
                        
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