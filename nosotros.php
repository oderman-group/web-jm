<?php 
include("head.php");

$paginas = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM ".$bdPanelControl.".paginas 
WHERE pag_activa=1 AND pag_id=2"));
?>

<!-- PAGE TITLE HERE -->
<title>JM EQUIPOS TOPOGRÁFICOS MEDELLÍN</title>


</head>

<body>

    <div class="page-wraper">

        <?php include("menu.php"); ?>

        <!-- CONTENT START -->
        <div class="page-content">

            <!-- INNER PAGE BANNER --
            <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/banner/about-banner.jpg);">
                <div class="overlay-main bg-black" style="opacity:0.5;"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white">Nosotros</h1>
                    </div>
                </div>
            </div>
             INNER PAGE BANNER END -->



            <!-- OUR BEST PROJECTS SECTION START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">
                    <!-- TITLE START -->
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">NOSOTROS</h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>
                        
                    </div>
                    <!-- TITLE END -->

                        <?php echo $paginas['pag_descripcion'];?>

                </div>
            </div>
            <!-- OUR BEST PROJECTS SECTION END -->


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