<?php include("../../modelo/conexion.php");?>
<?php include("header.php");?>
    
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2_metro.css" />
	<link rel="stylesheet" href="../assets/plugins/data-tables/DT_bootstrap.css" />
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
			
			<?php include("ayuda-modal.php");?>
            
            
			<!-- BEGIN PAGE CONTAINER-->        
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						
                        <?php include("panel-color.php");?> 
                        
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">Subpaginas<small>...</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Inicio</a> 
								<i class="icon-angle-right"></i>
							</li>
                            
							<li><a href="#">Subpaginas</a></li>
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
								<div class="caption"><i class="icon-group"></i>Subpaginas</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config1" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="subpaginas-info.php?a=1" class="btn green">Agregar <i class="icon-plus"></i></a>
									</div>
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Herramientas <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a href="#">Imprimir</a></li>
											<li><a href="#">Guardar como PDF</a></li>
											<li><a href="#">Exportar a Excel</a></li>
										</ul>
									</div>
								</div>
								<?php
								$consulta = mysqli_query($conexion,"SELECT sub_id, sub_nombre, sub_descripcion, sub_id_pagina, sub_activa, sub_posicion,sub_url,pag_nombre FROM subpaginas sp INNER JOIN paginas p ON sp.sub_id_pagina=p.pag_id;");
								?>
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th>ID</th>
                                            <th>Nombre</th>
                                            <th>Activa</th>
                                            <th>Pagina de Dependencia</th>
                                            <th>Posición</th>
                                            <th>Acciones</th>
										</tr>
									</thead>
									<tbody>
                                    	<?php
										while($resultado = mysqli_fetch_array($consulta)){
										switch($resultado["sub_activa"]){
												case 1;
													$activo = '<span class="label label-success">SI</span>';
												break;
												case 2;
													$activo = '<span class="label label-grey">NO</span>';
												break;
											}
										?>
										<tr class="odd gradeX">
											<td><?=$resultado[0];?></td>
                                            <td><?=$resultado["sub_nombre"];?></td>
                                            <td><?=$activo?></td>
                                            <td><?=$resultado["pag_nombre"]?></td>
                                            <td><?=$resultado["sub_posicion"];?></td>
                                            <td>
                                            	<a href="subpaginas-info.php?a=2&idR=<?=$resultado["sub_id"];?>"><img src="../../files/iconos/edit.png"></a>
                                                <a href="sql.php?get=9&idR=<?=$resultado["sub_id"];?>" onClick="if(!confirm('Desea eliminar este registro?')){return false;}"><img src="../../files/iconos/deletle.png"></a>
                                            </td>
										</tr>
                                        <?php }?>
										
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