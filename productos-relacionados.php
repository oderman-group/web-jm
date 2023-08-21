<!-- TITLE START -->
<div class="p-b10">
                            <h2 class="text-uppercase">Productos relacionados</h2>
                            <div class="wt-separator-outer  m-b30">
                                <div class="wt-separator style-square">
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>
                            </div>
                    	</div>
                    <!-- TITLE END -->

<div class="row m-b30">
                        
<?php
							$productos_relacionados = mysqli_query($conexion,"SELECT * FROM gw_productos 
                            WHERE prod_categoria='".$producto['prod_categoria']."' AND prop_id!='".$producto['prop_id']."'
                            LIMIT 0,4
                            ");
							while($pr = mysqli_fetch_array($productos_relacionados)){
							?>
                            <!-- COLUMNS 1 -->
                            <div class="col-md-3 col-sm-4 col-xs-6 col-xs-100pc m-b30">

                                
                                <div class="wt-box wt-product-box">
                                    <a href="detalle.php?id=<?=$pr['prop_id'];?>">
                                        <div class="wt-thum-bx">
                                            <img src="../../imagenes/productos/<?=$pr['prod_img_ppal'];?>" alt="" class="img-portafolio">
                                            
                                        </div>
                                    </a>

                                    <div class="wt-info  text-center">
                                         <div class="p-a10 bg-white">
                                            <h4 class="wt-title">
                                            	<a href="detalle.php?id=<?=$pr['prop_id'];?>"><?=$pr['prod_nombre'];?></a>
                                            </h4>
                                         </div>
                                         <div class="p-t10">
                                            <a href="detalle.php?id=<?=$pr['prop_id'];?>" class="site-button skew-icon-btn m-r15" type="button">VER DETALLES <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php }?>

                           

                           
                        </div>
                        
                   
                   
                   
                   
                   
                   
                    <!-- TABS CONTENT START -->