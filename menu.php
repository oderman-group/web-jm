<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<a href="https://api.whatsapp.com/send?phone=573107983526&text=Hola JMEQUIPOS, requiero su atención para..." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<a href="store.jmequipos.com/" class="float-cart" target="_blank">
<i class="fa fa-shopping-cart my-float"></i>
</a>

<!-- HEADER START -->
<header class="site-header header-style-1 ">
        	<!-- TOP BAR START -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="wt-topbar-right clearfix">
                        	<ul class="social-bx list-inline pull-right">
                                <li><a href="https://www.facebook.com/people/Jmendoza-Equipos/100001538321897" target="_blank" class="fa fa-facebook"></a></li>
                                <li><a href="https://www.youtube.com/channel/UCAwK97o9sCFPoxMJJC4UrHA" target="_blank" class="fa fa-youtube" style="color: red;"></a></li>
                                <li><a href="https://www.instagram.com/jmequipos_sas/" target="_blank" class="fa fa-instagram"></a></li>
                            </ul>
                            <ul class="list-unstyled e-p-bx pull-right">
                                <li><i class="fa fa-envelope"></i>ventas@jmequipos.com</li>
                                <li><i class="fa fa-phone"></i>PBX: (574) 322 06 19 - (571) 755 9969</li>
                                <li><i class="fa fa-phone"></i>CEL: (310) 798 35 26 - (320) 235 4380</li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAIN BAR START -->
            <div class="sticky-header main-bar-wraper">
                <div class="main-bar bg-primary">
                    <div class="container">
                    	<!-- SITE LOGO -->
                        <div class="logo-header mostion header-skew">
                            <a href="index.php">
                                <img src="https://jmequipos.com/imagenes/logo/2020/logoBlancoJm.png" width="130" height="30" alt="" style="height: 100px;" />
                            </a>
                        </div>
                        <!-- NAV TOGGLE BUTTON -->
                        <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <!-- MAIN NAV -->
                        <div class="header-nav navbar-collapse collapse ">
                            <ul class=" nav navbar-nav">
                                <li class="active"><a href="index.php">Inicio</a></li>
                                <li><a href="nosotros.php">Nosotros</a></li>
                                <li><a href="services.php">Servicios</a></li>
                                <li><a href="promociones.php">Promociones</a></li>
                            
                                <li>
                                    <a href="javascript:;">Productos<i class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">

                                    <?php
												$spcategorias = mysqli_query($conexion,"SELECT * FROM gw_supcategorias");
												while($spcat = mysqli_fetch_array($spcategorias)){
												?>
                                        <li>
                                            <a href="categorias.php?supcat=<?=$spcat[0];?>"><?=strtoupper($spcat[1]);?></a>
                                            <ul class="sub-menu">
                                            <?php
														$categorias = mysqli_query($conexion,"SELECT * FROM gw_prod_categorias 
														WHERE catep_id_supercat='".$spcat[0]."'
														ORDER BY catep_posicion
														");
														while($cat = mysqli_fetch_array($categorias)){
														?>
                                                <li><a href="productos.php?cat=<?=$cat[0];?>"><?=strtoupper($cat[1]);?></a></li>
                                                <?php }?>
                                            </ul>
                                        </li>  
                                        <?php }?>                                    
                                    </ul>
                                </li>

                                <li><a href="clientes.php">Clientes</a></li>
                                <li><a href="eventos.php">Eventos</a></li>
                                <li><a href="contactenos.php">Contáctenos</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER END -->