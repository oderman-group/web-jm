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
							Planes Informaci&oacute;n
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Incio</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="planes.php">Planes</a>
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
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
                                
								<form action="sql.php" class="form-horizontal" method="post">
                                <?php
								if($_GET["a"]==1){
									echo '<input type="hidden" name="id" value="33">';
									$consulta = mysqli_query($conexion,"SELECT * FROM tienda_paquetes");
									$n = mysqli_num_rows($consulta);
								}	
								elseif($_GET["a"]==2){
									echo '<input type="hidden" name="id" value="34">';
									echo '<input type="hidden" name="idR" value="'.$_GET["idR"].'">';
									$consulta = mysqli_query($conexion,"SELECT * FROM tienda_paquetes WHERE tpp_id='".$_GET["idR"]."'");
									$resultado = mysqli_fetch_array($consulta);
								}	
								?>

                                    
                                    <div class="control-group">
										<label class="control-label">T&iacute;tulo</label>
										<div class="controls">
											<input class="span12 m-wrap" name="titulo" value="<?=$resultado[1];?>">
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Descripci&oacute;n</label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="des" rows="6"><?=$resultado[2];?></textarea>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Nombre del bot&oacute;n</label>
										<div class="controls">
											<input class="span4 m-wrap" name="nombreBoton" value="<?=$resultado[5];?>">
                                            <span style="color:#F00;">Este es el llamado a la acci&oacute;n</span>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Precio</label>
										<div class="controls">
										 <input type="text" class="span2 m-wrap" name="precio" value="<?=$resultado[3];?>"/>
                                         <span style="color:#F00;">Solo ingrese el n&uacute;mero sin puntos(.), ni comas(,), ni simbolos($).</span>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Periocida de pago</label>
										<div class="controls">
											<?php
											$cT = mysqli_query($conexion,"SELECT opg_id, opg_nombre, opg_descripcion, opg_grupo FROM opciones_generales WHERE opg_grupo=1");
											?>
                                            <select data-placeholder="Escoja una opcion" class="chosen span2" tabindex="-1" name="periocidad">
												<option value="">&nbsp;</option>
													<?php 
													while($i = mysqli_fetch_array($cT)){
														if($i[0]==$resultado[4])
															echo '<option value="'.$i[0].'" selected>'.$i[1].'</option>';
														else
															echo '<option value="'.$i[0].'">'.$i[1].'</option>';	
													}
													?>
											</select>
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">Destacado</label>
										<div class="controls">
                                            <select data-placeholder="Escoja una opcion" class="chosen span2" tabindex="-1" name="destacado">
												<option value="">--Selecciones un valor--</option>
													<option value="1" <?php if($resultado[6]==1){echo "selected";}?>>SI</option>
                                                    <option value="0" <?php if($resultado[6]==0){echo "selected";}?>>NO</option>
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
		 /*====Select Box====*/
    $(function () {
        $(".chzn-select").chosen();
        $(".chzn-select-deselect").chosen({
            allow_single_deselect: true
        });
    });
	function chksmostrar(id){
		var marcado=$("#"+id).prop("checked");
		if(marcado){
			$("#div"+id).css("visibility","");
			}else{
				$("#div"+id).css("visibility","hidden");
          var numoption=($("#slc"+id+" option").size())-1;
		  for(var j=1;j<=numoption;j++){
			 $("#slc"+id+"_chzn_c_"+j).remove();
			  }
			  $("#slc"+id).multiSelect('deselect_all');
			  //.multiSelect('deselect_all');
				}
		}
	</script>
	<!-- END JAVASCRIPTS -->   
    <?php
echo "<script>chksmostrar('chkproductos');chksmostrar('chkcategoria')</script>";
?>
</body>
<!-- END BODY -->
</html>