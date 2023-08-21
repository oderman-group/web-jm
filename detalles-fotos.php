<style type="text/css">
	.sectionPruductos {
	 	height: 400px !important;
		
	}
</style>


                
                <!-- IMAGE CAROUSEL START -->
                
                
                <!-- CAROUSEL -->
                <div class="section-content animate" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                    <div class="owl-carousel portfolio-carousel-fullscreen-nogap mfp-gallery gallery owl-btn-vertical-center">
                    
                    <?php
								while($foto = mysqli_fetch_array($fotos)){
								?>	
                        <!-- COLUMNS 1 -->
                        <div class="item">
                            <div class="ow-portfolio sectionPruductos">
                                <div class="ow-portfolio-img wt-img-overlay1 wt-img-effect zoom-slow">
                                    <img src="../../imagenes/productos/<?=$foto['img_imagen'];?>" alt="">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                        
                                        <a href="../../imagenes/productos/<?=$foto['img_imagen'];?>"  class="mfp-link">
                                            <i class="fa fa-search-plus wt-icon-box-xs"></i>
                                        </a>
                                  </div>
                                    </div>
                              </div>
                            </div>
                        </div>

                        <?php }?>


                    </div>
                </div>
            
