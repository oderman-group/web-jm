<?php
include("conexion.php");
include("head.php");

$eventos = mysqli_query($conexion,"SELECT * FROM eventos WHERE eve_activo=1 ORDER BY eve_id");
?>

<!-- PAGE TITLE HERE -->
<title>EQUIPOS TOPOGRÁFICOS EN MEDELLIN - JMENDOZA S.A.S</title>

<meta name="description" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
<meta name="keywords" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">
<meta name="description" content="Equipos de topografía en Medellin, Equipos topográficos en Colombia, Equipos para Topografía en Medellín, Jaime Mendoza, equipos topográficos, Equipos Jaime Mendoza, Jaime Mendoza Equipos Topográficos, Equipos Topograficos, Equipos de Topografía, Equipos para topografia, Equipos Topográficos en Medellin">


</head>

<body>

    <div class="page-wraper">

        <?php include("menu.php"); ?>

        <!-- CONTENT START -->
        <div class="page-content">

            <!-- BREADCRUMB ROW END -->

            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">

                <h1>Eventos</h1>

                    <?php 
                    if(!empty($_GET['msg']) && $_GET['msg']==1){
                    ?>
                    
                    <p style="font-weight:bold; color: blue; font-size: 18px;">Su inscripción se ha realizado exitosamente.</p>

                <?php }?>

                    <!-- GALLERY START -->
                    <div class="row">
                        <div class="portfolio-wrap mfp-gallery no-col-gap">


                            <?php
                            while ($eve = mysqli_fetch_array($eventos)) {
                                $cierre = mysqli_fetch_array(mysqli_query($conexion,"SELECT DATEDIFF(eve_fecha_cierre, now()) FROM eventos WHERE eve_id='" . $eve["eve_id"] . "'"));
                                if ($cierre[0] < 0) continue;
                            ?>
                                <!-- COLUMNS 1 -->
                                <div class="masonry-item house col-lg-4 col-md-4 col-sm-6 col-xs-6 col-xs-100pc">
                                    <div class="wt-box p-a20">
                                        <div class="wt-thum-bx wt-img-effect zoom">
                                            <img src="eventos/imagenes/<?= $eve["eve_imagen_web"]; ?>" alt="">
                                        </div>

                                        <h3 style="text-align: center;"><?= $eve["eve_nombre"]; ?></h3>

                                        <?php if($eve["eve_precio"] != "" ){?>
                                            <h5 style="text-align: center;">$<?= number_format($eve["eve_precio"],0,".","."); ?></h5>
                                        <?php }?>
                                        
                                        <div style="text-align: center;">

                                            <?php if($eve["eve_precio"]== "" ){?>
                                            <a href="eventos2019/index.php?idEve=<?= $eve["eve_id"]; ?>#tg-venue" target="_blank" class="site-button skew-icon-btn m-r15 text-uppercase" style="font-weight:600; margin-top: 5px;">
                                                INSCRIPCIÓN <i class="fa fa-angle-double-right"></i>
                                            </a>

                                            <?php }else{?>
                                            <a href="https://epayco.com/" target="_blank" class="site-button skew-icon-btn m-r15 text-uppercase" style="font-weight:600; margin-top: 5px;">
                                                INSCRIPCIÓN Y PAGO <i class="fa fa-angle-double-right"></i>
                                            </a>
                                            <?php }?>

                                        </div>

                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                    </div>
                    <!-- GALLERY END -->

                </div>
            </div>
            <!-- SECTION CONTENT END  -->

        </div>
        <!-- CONTENT END -->

        <?php include("footer.php"); ?>

        <!-- BUTTON TOP START -->
        <button class="scroltop fa fa-arrow-up"></button>

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
    <script src="js/jquery-1.12.4.min.js"></script><!-- JQUERY.MIN JS -->
    <script src="js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->

    <script src="js/bootstrap-select.min.js"></script><!-- FORM JS -->
    <script src="js/jquery.bootstrap-touchspin.min.js"></script><!-- FORM JS -->

    <script src="js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->

    <script src="js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
    <script src="js/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script src="js/waypoints-sticky.min.js"></script><!-- COUNTERUP JS -->

    <script src="js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

    <script src="js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->

    <script src="js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   -->
    <script src="js/scrolla.min.js"></script><!-- ON SCROLL CONTENT ANIMTE   -->

    <script src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->

















</body>

</html>