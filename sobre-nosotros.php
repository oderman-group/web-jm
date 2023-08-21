<?php 
$paginas = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM ".$bdPanelControl.".paginas 
WHERE pag_activa=1 AND pag_id=1"));
?>
<!-- ABOUT COMPANY SECTION START -->
<div class="section-full p-tb100" style="background-image:url(images/background/pic-c-1bg.png); background-position:left bottom; background-repeat:no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 animate" data-animate="fadeInLeftBig" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                            <div class="about-com-pic">
                                <img src="<?php echo $paginas['pag_background'];?>" alt="" class="img-responsive"/>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 animate" data-animate="fadeInRightBig" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                            <div class="section-head text-left">
                                <h2 class="text-uppercase"><?php echo $paginas['pag_nombre'];?> </h2>
                                <div class="wt-separator-outer">
                                    <div class="wt-separator style-square">
                                        <span class="separator-left bg-primary"></span>
                                        <span class="separator-right bg-primary"></span>
                                    </div>
                                </div>

                                <?php echo $paginas['pag_descripcion'];?>

                                <h2 class="title-style2">Formas de pago</h2>
                            
							<a href="https://www.zonapagos.com/t_jmequipos/pagos.asp" target="_blank">
								<img src="img/pagos.jpg" alt="" class="width-50 float-left padding-5px-right border-radius-5">
							</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>