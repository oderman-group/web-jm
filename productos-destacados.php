<style type="text/css">
	.sectionPruductos {
	 	height: 400px !important;
		
	}
</style>

<!-- LATEST PROJECT SECTION START -->
<div class="section-full bg-white p-t80 p-b80" style="background-image:url(images/background/bg-4.png); background-repeat:repeat;background-color:#273447; ">
                
                <!-- IMAGE CAROUSEL START -->
                
                <!-- TITLE START -->
                <div class="section-head">
                	<div class="container">
                        <h2 class="text-uppercase text-white">PRODUCTOS DESTACADOS </h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator style-square has-bg">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->
                
                <!-- CAROUSEL -->
                <div class="section-content animate" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                    <div class="owl-carousel portfolio-carousel-fullscreen-nogap mfp-gallery gallery owl-btn-vertical-center">
                    
                    <?php
					$productos_relacionados = mysqli_query($conexion,"SELECT * FROM gw_productos WHERE prod_destacado=1 ORDER BY prod_posicion");
					while($pr = mysqli_fetch_array($productos_relacionados)){
					?>
                        <!-- COLUMNS 1 -->
                        <div class="item">
                            <div class="ow-portfolio sectionPruductos">
                                <div class="ow-portfolio-img wt-img-overlay1 wt-img-effect zoom-slow">
                                    <img src="imagenes/productos/<?=$pr['prod_img_ppal'];?>" alt="" class="img-portafolio">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                        <!--
                                        <a href="imagenes/productos/<?=$pr['prod_img_ppal'];?>"  class="mfp-link">
                                            <i class="fa fa-search-plus wt-icon-box-xs"></i>
                                        </a>-->
                                        <a href="detalle.php?id=<?=$pr['prop_id'];?>" >
                                            <i class="fa fa-link wt-icon-box-xs"></i>
                                        </a>
                                  </div>
                                    </div>
                              </div>
                            </div>
                        </div>

                        <?php }?>


                    </div>
                </div>
            
         	</div>
            <!-- LATEST PROJECT SECTION END -->