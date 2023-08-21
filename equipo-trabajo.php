<!-- OUR TEAM MEMBER SECTION START -->
<div class="section-full wt-our-team bg-white p-t80 p-b50">
                <div class="container">
                
                	<!-- TITTLE START -->
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">NUESTRAS SUCURSALES</h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>
                        <p></p>
                    </div>
                    <!-- TITLE END -->
                    
                    <div class="section-content">
                        <div class="row">

                        <?php
                        $equipo = mysqli_query($conexion,"SELECT * FROM ".$bdPanelControl.".usuarios WHERE usr_activo=1 AND usr_cargo!=''");
                        while($eq = mysqli_fetch_array($equipo)){
                        ?>
                        
                            <!-- COLUMNS 1 --> 
                            <div class="col-md-3 col-sm-6 col-xs-6 col-xs-100pc m-t30">
                                <div class="wt-team-four">
                                    <div class="wt-team-media">
                                        <a href="javascript:void(0);"><img src="../panelcontrol/files/<?=$eq['usr_foto'];?>" alt="" ></a>
                                    </div>
                                    <div class="wt-team-info">
                                        <div class="wt-team-skew-block p-t10">
                                            <div class="social-icons-outer bg-primary  p-a25">
                                            <?=$eq['usr_cargo'];?>
                                            </div>
                                         </div>
                                         <div class="p-a20">
                                            <h4 class="wt-team-title text-uppercase"><a href="javascript:void(0);"><?=$eq['usr_nombre'];?></a></h4>
                                            <p><?=$eq['usr_email'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php }?>

                            
                        
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- OUR TEAM MEMBER SECTION End -->