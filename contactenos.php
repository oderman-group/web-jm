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
                    <div class="wt-box col-md-6">
                        <h4 class="text-uppercase">Información de contacto </h4>
                        <div class="wt-separator-outer m-b30">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                    <div class="wt-icon-box-sm bg-primary corner">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="wt-tilte text-uppercase">PBX</h5>
                                        <p>(574) 322 06 19 - (571) 755 9969</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                    <div class="wt-icon-box-sm bg-primary corner">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="wt-tilte text-uppercase">Email</h5>
                                        <p>ventas@jmequipos.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                    <div class="wt-icon-box-sm bg-primary corner">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-fax"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="wt-tilte text-uppercase">Celular</h5>
                                        <p>(310) 798 35 26 - (320) 235 4380</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                    <div class="wt-icon-box-sm bg-primary corner">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-map-marker"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="wt-tilte text-uppercase">Dirección</h5>
                                        <p>CALLE 30B # 71 - 42, MEDELLÍN. <br>CALLE 51 # 71A - 18, OF. 101, BOGOTÁ. </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="wt-box col-md-6">
                        <h4 class="text-uppercase">Envíanos un mensaje </h4>
                        <div class="wt-separator-outer m-b30">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>

                        <form method="post" action="sql.php">
                            <input type="hidden" name="idSQL" value="1">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="nombre" type="text" required class="form-control" placeholder="Nombre/Razón social *">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input name="documento" type="text" class="form-control" required placeholder="Documento/NIT">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="email" type="email" required class="form-control" placeholder="E-mail *">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input name="celular" type="text" class="form-control" required placeholder="Celular *">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="ciudad" type="text" required class="form-control" placeholder="Ciudad *">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input name="asunto" type="text" class="form-control" required placeholder="Asunto *" value="<?php if(!empty($_GET["asunto"])){ echo $_GET["asunto"];} ?>">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon v-align-m"><i class="fa fa-pencil"></i></span>
                                            <textarea name="mensaje" rows="4" class="form-control" required class="Message" placeholder="Mensaje *"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <?php
                                $num1 = rand(1, 10);
                                $num2 = rand(1, 10);
                                $resultado = $num1 + $num2;
                                ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact-phone">¿Cuánto es <strong><?= $num1 . " + " . $num2; ?></strong>?</label>
                                        <input type="hidden" name="resultadoOp" value="<?= $resultado; ?>">
                                        <input type="text" class="form-control" placeholder="¿Cuánto es <?= $num1 . " + " . $num2; ?> ?" required="required" name="resultado" />
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                    <button name="submit" type="submit" value="submit" class="site-button skew-icon-btn m-r15">Enviar mensaje <i class="fa fa-angle-double-right"></i></button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- SECTION CONTENT END -->

            <!-- MAP BLOCK START -->
            <div class="section-full">
                <div class="equal-col">
                    <div class="gmap-outline">
                        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1He7mUeXKh9EkGrFyadpnkG-vzphHqdwA" width="100%" height="480"></iframe>
                    </div>
                </div>
            </div>
            <!-- MAP BLOCK END -->

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