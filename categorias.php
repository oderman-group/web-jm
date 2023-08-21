<?php 
include("conexion.php");
include("head.php");

$dato = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM gw_supcategorias WHERE sup_id='".$_GET["supcat"]."'")); 

$filtro = '';
if(!empty($_GET["cat"])){$filtro .= " AND prod_categoria='".$_GET["cat"]."'";}
if(!empty($_GET["marca"])){$filtro .= " AND prod_marca='".$_GET["marca"]."'";}
if(!empty($_GET["busqueda"])){$filtro .= " AND (prod_nombre LIKE '%".$_GET["busqueda"]."%' OR prod_descripcion LIKE '%".$_GET["busqueda"]."%')";}

$productos = mysqli_query($conexion,"SELECT * FROM gw_prod_categorias
WHERE catep_id_supercat='".$_GET["supcat"]."' $filtro
ORDER BY catep_posicion
");
?>

<!-- PAGE TITLE HERE -->
<title>EQUIPOS TOPOGRÁFICOS EN MEDELLIN - JMENDOZA S.A.S</title>

<meta name="keywords" content="Equipos de topograf�a en Medellin, Equipos topogr�ficos en Colombia, Equipos para Topograf�a en Medell�n, Jaime Mendoza, equipos topogr�ficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topogr�ficos, Equipos Topograficos, Equipos de Topograf�a, Equipos para topografia, Equipos Topogr�ficos en Medellin,Niveles Laser rotatorios,Niveles de Punto, Niveles laser, Laser spectra, Laser leica, Laser de punto, Esc�ner laser, Laser 3D, Scanner laser, Equipos de arquitectura, Medidores laser, Control de maquinaria, Tecnolog�a para maquinara, Herramientas de construccion, Equipos de contruccion, Equipos para maquinaria pesada, Distanciometros laser, Disto laser, Disto leica, Equipo robotizado, Estacion robotizada, Estaci�n robotica, Equipo laboratorio, Vuelos no tripulados, Venta de Drone, Dron no triipulado, Drone tripulado, Topograf�a avanzada, Servicios topogr�ficos, Puntos GPS, Mojon GPS, Topografia avanzada, Laser para laminado, Laser para drywall, Nivel laser para drywall, Nivel laser para montajes, Herramientas laser, Nivel Laser multifuncional, Equipos de computo, Servicios de ingenier�a, estacion TOPCON, Geomax, Leica, Spectra, South, Nikon">
<meta name="description" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
    
 
</head>

<body>
	
    <div class="page-wraper">
        	
    <?php include("menu.php");?>
        
        <!-- CONTENT START -->
        <div class="page-content">
        
            <!-- INNER PAGE BANNER -->
            <div class="wt-bnr-inr overlay-wraper" style="background-image:url(banner_productos/<?=$dato['sup_banner'];?>);">
            	<div class="overlay-main bg-black" style="opacity:0.5;"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white">&nbsp;</h1>
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->
            
            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">
                    <div class="section-content">
                        
                        
                        

                        
						

                        <!-- TITLE START -->
                        <div class="p-b10">
                            <h2 class="text-uppercase"><?=strtoupper($dato[1]);?></h2>
                            <div class="wt-separator-outer  m-b30">
                                <div class="wt-separator style-square">
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>
                            </div>
                    	</div>
                        <!-- TITLE END -->
                    
                        <div class="row">

                            <?php
							while($prod = mysqli_fetch_array($productos)){
                            ?>
                        
                        	<!-- COLUMNS 1 -->
                            <div class="col-md-3 col-sm-4 col-xs-6 col-xs-100pc m-b30">
                                <div class="wt-box wt-product-box">

                                <a href="productos.php?cat=<?=$prod['catep_id'];?>">
                                    <div class="wt-thum-bx">
                                        <img src="imagenes/categorias/<?=$prod['catep_imagen'];?>" alt="" class="img-portafolio">
                                    </div>
                                </a>    

                                    <div class="wt-info  text-center">
                                         <div class="p-a10 bg-white">
                                            <h4 class="wt-title">
                                                <a href="productos.php?cat=<?=$prod['catep_id'];?>"><?=$prod['catep_nombre'];?></a>
                                            </h4>
                                            <div class="p-t10">
                                                <a href="productos.php?cat=<?=$prod['catep_id'];?>" class="site-button skew-icon-btn m-r15" type="button">VER PRODUCTOS <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <?php }?>

                           
                           
                        </div>

                        
                        
                   </div>
                 </div>
             </div>
             <!-- SECTION CONTENT END -->
        
        </div>
        <!-- CONTENT END -->
        
        <?php include("footer.php");?>

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
