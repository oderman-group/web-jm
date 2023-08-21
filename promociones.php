<?php 
include("conexion.php");
include("head.php");

$promociones = mysqli_query($conexion,"SELECT * FROM gw_redes_sociales WHERE red_activo=1");
$numPromo = mysqli_num_rows($promociones);
if($numPromo>4) $columnas = 4;
else $columnas = 12 / $numPromo;
?>

<!-- PAGE TITLE HERE -->
<title>EQUIPOS TOPOGRÁFICOS EN MEDELLIN - JMENDOZA S.A.S</title>

<meta name="description" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
<meta name="keywords" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
<meta name="description" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
    
 
</head>

<body>	

    <div class="page-wraper"> 
       	
    <?php include("menu.php");?>
        
        <!-- CONTENT START -->
        <div class="page-content">
        
            

            <!-- BREADCRUMB ROW END -->
            
            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">
                
                    <h1>Promociones</h1>

                    <!-- GALLERY START -->
                    <div class="row">
                        <div class="portfolio-wrap mfp-gallery no-col-gap">


                        <?php
						while($promo = mysqli_fetch_array($promociones)){
						?>
                    		<!-- COLUMNS 1 -->
                            <div class="masonry-item house col-lg-4 col-md-4 col-sm-6 col-xs-6 col-xs-100pc">
                                <a href="<?=$promo["red_enlace"];?>" target="_blank">
                                    <div class="wt-box p-a20">
                                        <div class="wt-thum-bx wt-img-effect zoom">
                                            <img src="imagenes/siguenos/<?=$promo["red_icono"];?>" alt="">
                                        </div>
                                    </div>
                                </a>    
                            </div>

                            <?php }?>

                        
                        </div>
                    </div>
                    <!-- GALLERY END -->
                    
                </div>
            </div>
            <!-- SECTION CONTENT END  -->

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
