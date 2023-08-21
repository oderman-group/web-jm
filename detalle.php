<?php
include("conexion.php");
include("head.php");

$producto = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM gw_productos WHERE prop_id='".$_GET["id"]."'"));
$fotos = mysqli_query($conexion,"SELECT * FROM gw_img_prod WHERE img_producto='".$_GET["id"]."'");
?>

<!-- PAGE TITLE HERE -->
<title><?=$producto['prod_nombre'];?></title>

<meta name="keywords" content="Equipos de topograf�a en Medellin, Equipos topogr�ficos en Colombia, Equipos para Topograf�a en Medell�n, Jaime Mendoza, equipos topogr�ficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topogr�ficos, Equipos Topograficos, Equipos de Topograf�a, Equipos para topografia, Equipos Topogr�ficos en Medellin,Niveles Laser rotatorios,Niveles de Punto, Niveles laser, Laser spectra, Laser leica, Laser de punto, Esc�ner laser, Laser 3D, Scanner laser, Equipos de arquitectura, Medidores laser, Control de maquinaria, Tecnolog�a para maquinara, Herramientas de construccion, Equipos de contruccion, Equipos para maquinaria pesada, Distanciometros laser, Disto laser, Disto leica, Equipo robotizado, Estacion robotizada, Estaci�n robotica, Equipo laboratorio, Vuelos no tripulados, Venta de Drone, Dron no triipulado, Drone tripulado, Topograf�a avanzada, Servicios topogr�ficos, Puntos GPS, Mojon GPS, Topografia avanzada, Laser para laminado, Laser para drywall, Nivel laser para drywall, Nivel laser para montajes, Herramientas laser, Nivel Laser multifuncional, Equipos de computo, Servicios de ingenier�a, estacion TOPCON, Geomax, Leica, Spectra, South, Nikon">
<meta name="description" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
    
 
</head>

<body>
	
    <div class="page-wraper">
        	
    <?php include("menu.php");?>
        
         <!-- CONTENT START -->
        <div class="page-content">                
            
            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
            
				<!-- PRODUCT DETAILS -->
            	<div class="container woo-entry">
                	<div class="row m-b30">
							<div class="col-md-4 col-sm-4 m-b30">
								<div class="wt-box wt-product-gallery"> 
                                	<a href="javascript:void(0);"><img src="../imagenes/productos/<?=$producto['prod_img_ppal'];?>" alt=""></a>
                                </div>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="wt-post-title ">
									<h3 class="post-title"><a href="javascript:void(0);"><?=$producto['prod_nombre'];?></a></h3>
								</div>
								<div class="wt-post-text">
									<p class="m-b10"><?=$producto['prod_caracteristicas'];?></p> 
								</div>

                                <?php if($producto['prod_ficha']!="" and $producto['prod_mostrar_ficha'] == 1){?>
										<a href="https://jmequipos.com/archivos/fichas/<?=$producto['prod_ficha'];?>" class="btn btn-secondary site-button" target="_blank"><span><i class="fa fa-file margin-5px-right"></i> Ficha técnica</span></a>&nbsp;&nbsp;
									<?php }?>
								
									<a href="contactenos.php?asunto=Cotizar <?=$producto['prod_nombre'];?>&prod=<?=$producto['prop_id'];?>" class="btn btn-primary site-button"><i class="fa fa-cart-plus"></i> Cotizar</a>
								
							</div>
                    </div>
                    
                    
                    <?php include("detalles-fotos.php");?>
                    

					<div class="row">
						<div class="col-md-12 p-b30">
							<div class="wt-tabs border border-top bg-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#web-design-19"><i class="fa fa-globe"></i>Descripción</a></li>
                                    <li><a data-toggle="tab" href="#graphic-design-19"><i class="fa fa-photo"></i>Especificaciones</a></li>
                                    <li><a data-toggle="tab" href="#developement-19"><i class="fa fa-cog"></i> Vídeo</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="web-design-19" class="tab-pane active">
                                        <?=$producto['prod_descripcion'];?>
                                    </div>
                                    <div id="graphic-design-19" class="tab-pane">
                                        <?=$producto['prod_especificaciones'];?>
                                    </div>
                                    <div id="developement-19" class="tab-pane">
                                        
                                    <?php if($producto['prod_video']!=""){?>
                                            	<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$producto['prod_video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<?php }?>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
                    <!-- TABS CONTENT START -->


                    

                    <?php include("productos-relacionados.php"); ?>
                    
                    
                    
				</div>
				<!-- PRODUCT DETAILS -->	
                	
			</div>
            <!-- CONTENT CONTENT END -->
        
        
        </div>
        <!-- CONTENT END -->

        <?php include("footer.php"); ?>

        <!-- BUTTON TOP START -->
        <button class="scroltop fa fa-arrow-up" ></button>
        
    </div>
    
        

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
    	<div class="noTrespassingOuterBarG">
            <div class="noTrespassingFrontBarG noTrespassingAnimationG">
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
            </div>
        </div>
    	<div id="cssload-cupcake" class="cssload-box">
            <span class="cssload-letter">L</span>
        
            <div class="cssload-cupcakeCircle cssload-box">
                <div class="cssload-cupcakeInner cssload-box">
                    <div class="cssload-cupcakeCore cssload-box"></div>
                </div>
            </div>
        
            <span class="cssload-letter cssload-box">A</span>
            <span class="cssload-letter cssload-box">D</span>
            <span class="cssload-letter cssload-box">I</span>
            <span class="cssload-letter cssload-box">N</span>
            <span class="cssload-letter cssload-box">G</span>
        </div>
    	<div class="noTrespassingOuterBarG">
            <div class="noTrespassingFrontBarG noTrespassingAnimationG">
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
                <div class="noTrespassingBarLineG"></div>
            </div>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->

<!-- JAVASCRIPT  FILES ========================================= --> 
<script   src="js/jquery-1.12.4.min.js"></script><!-- JQUERY.MIN JS -->
<script   src="js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->

<script   src="js/bootstrap-select.min.js"></script><!-- FORM JS -->
<script   src="js/jquery.bootstrap-touchspin.min.js"></script><!-- FORM JS -->

<script   src="js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->

<script   src="js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script   src="js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script   src="js/waypoints-sticky.min.js"></script><!-- COUNTERUP JS -->

<script  src="js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

<script   src="js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->

<script   src="js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   --> 
<script   src="js/scrolla.min.js"></script><!-- ON SCROLL CONTENT ANIMTE   --> 

<script   src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script   src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->










 
 


 


</body>

</html>
