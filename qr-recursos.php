<?php 
include("conexion.php");
include("head.php"); 
?>

<!-- PAGE TITLE HERE -->
<title>JM EQUIPOS TOPOGRÁFICOS MEDELLÍN</title>


</head>

<body>

    <div class="page-wraper">

        <?php include("menu.php"); ?>

        <!-- CONTENT START -->
        <div class="page-content">


            <!-- SECTION CONTENT -->
            <div class="section-full p-t80 p-b50">
                <div class="container-fluid" style="padding-left: 50px; padding-right: 50px;">
                    <div class="wt-box col-md-12">
                        <h4 class="text-uppercase">Catalogos</h4>
                        <div class="wt-separator-outer m-b30">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>
                        <div class="row">

                            <?php
								$consulta = mysqli_query($conexion,"SELECT * FROM catalogos WHERE cata_activo=1 AND cata_qrecursos=1 ORDER BY cata_posicion");
                                while ($resultado = mysqli_fetch_array($consulta)) {
                            ?>
                                <div class="col-md-3 col-sm-3 m-b30">
                                    <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                        <?php if(!empty($resultado["cata_imagen"])){ ?>
                                            <div class="wt-icon-box-sm bg-primary corner">
                                                <img src="archivos/catalogos/imgPortada/<?=$resultado["cata_imagen"];?>" style="height: 75px !important;">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="wt-icon-box-sm bg-primary corner">
                                                <span class="icon-cell text-white">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </span>
                                            </div>
                                        <?php } ?>
                                        <div class="icon-content">
                                            <h5 class="wt-tilte text-uppercase"><?= $resultado["cata_nombre"]; ?></h5>
                                            <p><a href="archivos/catalogos/<?=$resultado["cata_archivo"];?>" target="_blank">Ver Catalogo</a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- SECTION CONTENT END -->

        </div>
        <!-- CONTENT END -->

        <?php include("footer.php"); ?>

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

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script><!-- GOOGLE MAP -->
    <script src="js/map.script.js"></script><!-- MAP FUCTIONS [ this file use with google map]  -->

    <script src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->










</body>

</html>