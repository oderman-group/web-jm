<?php 
include("conexion.php");
include("head.php");
$refe='';
if(!empty($_GET['refe'])){ $refe=$_GET["refe"];}
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
                <div class="container">
                    <div class="wt-box col-md-6">
                        <h4 class="text-uppercase">Clientes </h4>
                        
                        <div class="wt-separator-outer m-b30">
                           <div class="wt-separator style-square">
                               <span class="separator-left bg-primary"></span>
                               <span class="separator-right bg-primary"></span>
                           </div>
                       </div>
                        
                    </div>

                    <div class="wt-box col-md-10">

                    <p class="text-justify">
                        Bienvenidos a la zona exclusiva para clientes JMEQUIPOS

Esta es una zona de acceso restringido únicamente para clientes especiales de JMEQUIPOS S.A.S. Te damos la bienvenida,, podrás ver y descargar información importante tal como fichas técnicas, manuales, tutoriales, normatividad, documentos, certificados, videos y mucha más información valiosa que esperamos sea de su total agrado.
Solicitamos comedidamente hacer un uso adecuado, discreto y confidencial de este material, el cual cuenta con todos los Derechos Reservados de autor y está prohibida su copia, venta o uso para fines comerciales o lucrativos. Muchas gracias, Equipo Técnico JMEQUIPOS S.A.S.
                        </p>


                        <?php if(!empty($_GET['error']) && $_GET['error']==3){?>
                            <p style="font-weight: bold; color:tomato;">Este usuario no puede acceder al sistema porque está clasificado como prospecto, y no como cliente.</p>
                        <?php }?>    
                        
                        <form method="post" action="https://softjm.com/clientes/autentico.php">
                            <input type="hidden" name="refe" value="<?=$refe;?>">
                            <input type="hidden" name="bd" value="odermancom_jm_crm">
                        
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="Usuario" type="text" required class="form-control" placeholder="Usuario">
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="Clave" type="password" class="form-control" required placeholder="Contraseña">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button name="submit" type="submit" value="Submit" class="site-button skew-icon-btn m-r15">Ingresar <i class="fa fa-angle-double-right"></i></button>
                                    </div>
                                </div>

                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- SECTION CONTENT END -->
            
       </div>
        <!-- CONTENT END -->
        
        <?php include("footer.php"); ?>

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

<script  src="http://maps.google.com/maps/api/js?sensor=false"></script><!-- GOOGLE MAP -->
<script   src="js/map.script.js"></script><!-- MAP FUCTIONS [ this file use with google map]  -->

<script   src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script   src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->







 


</body>

</html>
