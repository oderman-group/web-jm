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
                <div class="container-fluid">
                    <div class="wt-box col-md-6">
                        <h4 class="text-uppercase">Consultar certificados </h4>

                        <div class="wt-separator-outer m-b30">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>

                    </div>

                    <div class="wt-box col-md-12">

                        <p>
                            En este espacio podrás consultar el estado actual del certificado.
                        </p>

                        <form method="post" action="consultar-certificados.php">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="certificado" required="required" placeholder="No. Certificado *" type="text" class="form-control" value="<?php if(!empty($_POST["certificado"])){ echo $_POST["certificado"];} ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="serial" required="required" placeholder="Serial del equipo *" type="text" class="form-control" value="<?php if(!empty($_POST["serial"])){ echo  $_POST["serial"]; }?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-left">
                                    <button name="submit" type="submit" value="Submit" class="site-button skew-icon-btn m-r15">Consultar <i class="fa fa-angle-double-right"></i></button>
                                </div>

                            </div>

                        </form>



                        <div class="row">
                            <div class="col-lg-12 center-col">
                                <?php
                                if (!empty($_POST["certificado"]) &&$_POST["certificado"] != "") {
                                    $conexionCRM = mysqli_connect("orioncrm.com.co", "odermancom_jm_crm", ")S{q9V7hBJv;");

                                    $postCertf = substr($_POST["certificado"], 1);
                                    
                                    $certificado = mysqli_fetch_array(mysqli_query($conexionCRM,"SELECT * FROM odermancom_jm_crm.remisiones
                                    INNER JOIN odermancom_jm_crm.clientes ON cli_id=rem_cliente
                                    WHERE rem_id='" . $postCertf . "' AND rem_serial='".$_POST["serial"]."'"));
                                    $estadosCertificados = array("", "VIGENTE", "VENCIDO", "PROVISIONAL");
                                    if ($certificado[0] != "") {

                                ?>
                                        <h3 align="center">EL CERTIFICADO NÚMERO
                                            <strong>C<?= $certificado['rem_id']; ?></strong> PERTENECIENTE AL CLIENTE
                                            <strong><?= $certificado['cli_nombre']; ?></strong> SE ENCUENTRA EN ESTADO
                                            <strong><?= $estadosCertificados[$certificado['rem_estado_certificado']]; ?></strong>
                                        </h3>

                                        <p style="color: black; font-size: 18px; margin-top: 10PX;">Solicite una copia a su correo haciendo
                                            <a href="contactenos.php?7=current-menu-item&asunto=SOLICITUD COPIA DEL CERTIFICADO C<?= $certificado['rem_id']; ?>" style="color: blue; text-decoration: underline;">CLICK AQUÍ</a>.
                                        </p>

                                        <?php if ($certificado['rem_estado_certificado'] == 2) { ?>
                                            <p style="color: black; font-size: 18px; margin-top: 10PX;">Si usted es el propietario y desea renovar este certificado haga
                                                <a href="clientes.php?refe=2" style="color: blue; text-decoration: underline;">CLICK AQUÍ</a>.
                                            </p>
                                        <?php } ?>

                                <?php
                                    }
                                }
                                ?>
                            </div>
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