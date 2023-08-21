<?php 
include("conexion.php");

$config = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM ".$bdPanelControl.".configuracion 
WHERE conf_id=1"));
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />    
    <meta name="description" content="" />
    
    <!-- FAVICONS ICON -->
    <link rel="icon" href="http://jmequipos.com/imagenes/logo/2020/logoAzulJm.png" type="image/x-icon" />
    <link rel="shortcut icon" href="http://jmequipos.com/imagenes/logo/2020/logoAzulJm.png">
    
    
    
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- [if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif] -->
    
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/font-awesome.min.css" />
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/flaticon.min.css">
    <!-- ANIMATE STYLE SHEET --> 
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.min.css">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/loader.min.css">    
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="css/skin/skin-1.css">
    <!-- CUSTOM  STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">


    <style type="text/css">
		img.peque{
		  width: 100px; height: 100px;
		}
	
		img.grande{
		  width: 200px; height: 200px;
		}
		
/*whatsapp*/	
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}


/* CARRITO */
.float-cart{
	position:fixed;
	width:60px;
	height:60px;
	bottom:120px;
	right:40px;
	background-color:#F5D645;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}


/* Estilos sobreescritos */

.top-bar {
  background-color: <?=$config['conf_fondo_encabezado'];?>;
}

.noTrespassingBarLineG,
.cssload-cupcakeCircle,
.bg-primary,
.site-button,
ol.list-num-count > li::before,

.support-skew::after,

.wt-separator-two[class*="style-"]::after, 
.wt-separator-two[class*="style-"]::before,

.masonry-filter.outline-style.customize > li.active a, 
.masonry-filter.outline-style.customize > li:hover a,
.masonry-filter.button-style > li.active a, 
.masonry-filter.button-style > li a:hover, 
.masonry-filter.button-style > li a:active, 
.masonry-filter.button-style > li a:focus,

.company-detail-skew::after,

.wt-team-four .wt-team-skew-block ul,
.wt-team-four .wt-team-skew-block ul::after,

.date-style-3 .post-date i,
.date-style-3.date-skew .post-date i,
.date-style-3.date-skew .post-date i::after,

.testimonial-1 .quote-left::before, 
.testimonial-grid-1 .quote-left::before,
.testimonial-4 .testimonial-detail, 
.testimonial-grid-4 .testimonial-detail,
.testimonial-4 .testimonial-detail::after, 
.testimonial-grid-4 .testimonial-detail::before,
.wt-team-four .wt-team-skew-block .social-icons-outer::after,
.acc-bg-primary a,

.pagination > li > a:hover, 
.pagination > li > span:hover, 
.pagination > li > a:focus, 
.pagination > li > span:focus,
.pagination > .active > a, 
.pagination > .active > span, 
.pagination > .active > a:hover, 
.pagination > .active > span:hover, 
.pagination > .active > a:focus, 
.pagination > .active > span:focus,
.custom-pagination.pagination > li > a:focus, 
.custom-pagination.pagination > li > a:hover, 
.custom-pagination.pagination > li > span:focus, 
.custom-pagination.pagination > li > span:hover,


.wt-nav-pills li:hover a,

.custom-pagination.pagination > .active > a, 
.custom-pagination.pagination > .active > span, 
.custom-pagination.pagination > .active > a:hover, 
.custom-pagination.pagination > .active > span:hover, 
.custom-pagination.pagination > .active > a:focus, 
.custom-pagination.pagination > .active > span:focus,

.call-to-action-skew .call-to-action-left::after,
.constrot-strip,
.widget-title::after,

.owl-carousel .owl-dots .owl-dot.active span, 
.owl-carousel .owl-dots .owl-dot:hover span,

.social-icons.social-square.social-primary a, 
.social-icons.social-radius.social-primary a,
.social-icons.social-square.social-darkest a:hover, 
.social-icons.social-radius.social-darkest a:hover,

.wt-tabs.border-top .nav-tabs > li.active > a::after,

.faq-block .faq-que::after, 
.faq-block .faq-ans::after,

.date-style-2 .post-date,
.custom-page.pager li > a:focus, 
.custom-page.pager li > a:hover,

.pricingtable-price,
.pricing-table-style-2 .pricingtable-title,

.testimonial-2 .testimonial-detail,
.testimonial-grid-2 .testimonial-detail,

.widget_calendar table tbody td#today,
.searchform input[type="submit"] {
	background-color:<?=$config['conf_color_boton_menu'];?>;
}

	</style>