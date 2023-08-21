<!-- OUR CLIENT SLIDER START -->
<div class="section-full p-t80 p-b50">
                <div class="container">
                
                	<!-- TITLE START -->
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Nuestras marcas</h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>
                        <p></p>
                    </div>
                    <!-- TITLE END -->
                    
                    <!-- IMAGE CAROUSEL START -->
                    <div class="section-content animate" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                        <div class="owl-carousel client-logo-carousel">

                        <?php
                        $marcas = mysqli_query($conexion,"SELECT * FROM marcas");
                        while($marca = mysqli_fetch_array($marcas)){
                        ?>
                        
                        	<!-- COLUMNS 1 --> 
                            <div class="item">
                                <div class="ow-client-logo">
                                    <div class="client-logo wt-img-effect on-color">
                                        <a href="productos.php?marca=<?=$marca[0];?>"><img src="https://jmequipos.com/imagenes/marcas/<?=$marca[2];?>" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <?php }?>
                                                   
                        
                        </div>
                    </div>
                    <!-- IMAGE CAROUSEL START -->
                </div>
            
            </div>
            <!-- OUR CLIENT SLIDER END -->  