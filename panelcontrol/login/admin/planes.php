<?php include("../../modelo/conexion.php");?>
<?php include("header.php");?>
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="../assets/css/pages/pricing-tables.css" rel="stylesheet" type="text/css"/>
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
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						
						<?php include("panel-color.php");?> 
                        
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Tienda Virtual <small></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Inicio</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Tienda Virtual</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT--> 
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption"><i class="icon-cogs"></i>Tienda Virtual</div>  
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
                            	
                                <p><a href="planes-editar.php?a=1" class="btn red">Agregar <i class="icon-plus"></i></a></p>
                                
							<div class="portlet-body">
								<div class="row-fluid">
									<!-- Pricing -->
									<div class="row-fluid margin-bottom-40">
                                        <?php
										$consulta = mysqli_query($conexion,"SELECT * FROM tienda_paquetes;");
										$nPlanes = mysqli_num_rows($consulta);
										@$div = (12/$nPlanes);
										while($r = mysqli_fetch_array($consulta)){
											//$periodo = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM gen_opciones WHERE op_id='".$r[5]."'"));
											if($r[6]==1) $d = 'pricing-active'; else $d='';
										?>
										<div class="span<?=$div;?> pricing <?=$d;?> hover-effect">
											<div class="pricing-head pricing-head-active">
												<h3><?=$r[1];?> <span></span></h3>
												<h4><i>$<?=number_format($r[3],0,",",".");?></i> <span><?=$periodo[1];?></span></h4>
											</div>
											<ul class="pricing-content unstyled">
                                            <?php
											$ip = mysqli_query($conexion,"SELECT * FROM tienda_items WHERE tpi_paquete='".$r[0]."'");
											while($i = mysqli_fetch_array($ip)){
											?>
												<li><i class="icon-ok"></i><?=$i[1];?></li>
                                            <?php
											}
											?>    
											</ul>
											<div class="pricing-footer">
												<p><?=$r[2];?></p>
												<a href="planes-items.php?id=<?=$r[0];?>" class="btn green">Seleccionar <i class="m-icon-swapright m-icon-white"></i></a>
                                                <a href="planes-editar.php?idR=<?=$r[0];?>&a=2" class="btn blue">Editar <i class="icon-edit"></i></a> 
                                                <a href="sql.php?idR=<?=$r[0];?>&get=22" onClick="if(!confirm('Desea eliminar este registro?')){return false;}" class="btn red">Eliminar <i class="icon-trash"></i></a>  
											</div>
										</div>
										<?php
										}
										?>
									</div>
									<!--/row-fluid-->
									<!--//End Pricing -->
								</div>
							</div>
						</div>
						<!-- END INLINE NOTIFICATIONS PORTLET-->
					</div>
				</div>
				
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->       
		</div>
		<!-- BEGIN PAGE -->     
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
	<script src="../assets/scripts/app.js"></script>      
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>