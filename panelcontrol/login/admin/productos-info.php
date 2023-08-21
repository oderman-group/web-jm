<?php include("../../modelo/conexion.php");?>
<?php include("header.php");?>
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
			<?php include("ayuda-modal.php");?>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="span12">
						
                        <?php include("panel-color.php");?> 
                        
						<h3 class="page-title">
							Productos
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Incio</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="productos.php">Productos</a>
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
									<a href="#portlet-config3" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
                                
								<form action="sql.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <?php
								if($_GET["a"]==1){
									echo '<input type="hidden" name="id" value="10">';
								}	
								elseif($_GET["a"]==2){
									echo '<input type="hidden" name="id" value="11">';
									echo '<input type="hidden" name="idR" value="'.$_GET["idR"].'">';
									$consulta = mysqli_query($conexion,"SELECT * FROM " . $bdJM . ".gw_productos WHERE prop_id='".$_GET["idR"]."'");
									$resultado = mysqli_fetch_array($consulta);
								}	
								?>

                                    
<div class="control-group">
										<label class="control-label">Referencia</label>
										<div class="controls">
											<input class="span12 m-wrap" name="ref" value="<?php if(!empty($resultado["prod_referencia"])){ echo $resultado["prod_referencia"];}?>" readonly>
										</div>
									</div>

<div class="control-group">
										<label class="control-label">Nombre</label>
										<div class="controls">
											<input class="span12 m-wrap" name="titulo" value="<?php if(!empty($resultado["prod_nombre"])){ echo $resultado["prod_nombre"];}?>">
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Descripci&oacute;n</label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="descripcion" rows="4"><?php if(!empty($resultado["prod_descripcion"])){ echo $resultado["prod_descripcion"];}?></textarea>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Caracteristicas</label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="caracteristicas" rows="4"><?php if(!empty($resultado["prod_caracteristicas"])){ echo $resultado["prod_caracteristicas"];}?></textarea>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Especificaciones</label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="especificaciones" rows="4"><?php if(!empty($resultado["prod_especificaciones"])){ echo $resultado["prod_especificaciones"];}?></textarea>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">C&oacute;digo de Video</label>
										<div class="controls">
											<input type="text" class="span4 m-wrap" value="<?php if(!empty($resultado["prod_video"])){ echo $resultado['prod_video'];}?>" name="video"/>
                                            <img src="../../files/imagenes-generales/CodigoYoutube.png">
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Imagen<br>
                                        Medidas:(800 x 600) - Peso: (2 MB M&aacute;ximo)</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if(!empty($resultado["prod_img_ppal"])){?>
                                                <img src="../../../imagenes/productos/<?=$resultado["prod_img_ppal"]?>" alt="" />
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
										<label class="control-label">Ficha técnica</label>
										<div class="controls">
											<input class="span6 m-wrap" name="fichaT" type="file" />

											<?php if(!empty($resultado["prod_ficha"])){?>
													<a href="https://jmequipos.com/archivos/fichas/<?=$resultado["prod_ficha"];?>" target="_blank">Ver Ficha</a>
											<?php }?>	
										</div>
											
									</div>


									<div class="control-group">
													<label class="control-label">Mostrar ficha</label>
													<div class="controls">
													   <select class="small m-wrap" name="mostrarFicha" tabindex="1">
												       <option value="1" <?php if(!empty($resultado["prod_mostrar_ficha"]) && $resultado["prod_mostrar_ficha"]==1){echo "selected";}?>>Si</option>
                                                       <option value="2" <?php if(!empty($resultado["prod_mostrar_ficha"]) && $resultado["prod_mostrar_ficha"]==2){echo "selected";}?>>No</option>
													   </select>
													</div>
								  </div>


                                    <div class="control-group">
										<label class="control-label">Precio</label>
										<div class="controls">
												<input class="span2 m-wrap" name="precio" value="<?php if(!empty($resultado["prod_precio"])){ echo $resultado["prod_precio"];}?>" type="text" />
                                                <span style="color:#F00;">Solo ingrese el n&uacute;mero sin puntos(.), ni comas(,), ni simbolos($).</span>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Categor&iacute;a</label>
										<div class="controls">
											<?php
											$cT = mysqli_query($conexion,"SELECT * FROM " . $bdJM . ".gw_prod_categorias");
											?>
                                            <select data-placeholder="Escoja una opcion" class="chosen span4" tabindex="-1" name="categoria">
												<option value="">--Seleccione una opci&oacute;n--</option>
													<?php 
													while($i = mysqli_fetch_array($cT)){
														if(!empty($resultado["prod_categoria"]) && $i["catep_id"]==$resultado["prod_categoria"])
															echo '<option value="'.$i[0].'" selected>'.$i["catep_nombre"].'</option>';
														else
															echo '<option value="'.$i[0].'">'.$i["catep_nombre"].'</option>';	
													}
													?>
											</select>
										</div>
									</div>
                                  <div class="control-group">
													<label class="control-label">Destacado</label>
													<div class="controls">
													   <select class="small m-wrap" name="destacado" tabindex="1">
												       <option value="1" <?php if(!empty($resultado["prod_destacado"]) && $resultado["prod_destacado"]==1){echo "selected";}?>>SI</option>
                                                       <option value="0" <?php if(!empty($resultado["prod_destacado"]) && $resultado["prod_destacado"]=='0'){echo "selected";}?>>NO</option>
													   </select>
													</div>
								  </div>
                                    <div class="control-group">
										<label class="control-label">Posici&oacute;n</label>
										<div class="controls">
											<input class="span2" value="<?php if(!empty($resultado["prod_posicion"])){ echo $resultado["prod_posicion"];}?>" name="posicion" type="text" required />
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
	<script src="../assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
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