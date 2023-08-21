
<!-- SLIDER START -->
<div class="main-slider style-two default-banner">
           		<div class="tp-banner-container">
                    <div class="tp-banner">
                        <!-- START REVOLUTION SLIDER 5.4.1 -->
                        <div id="rev_slider_1014_1wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="typewriter-effect" data-source="gallery" style="background:#212427;">
                           <div id="rev_slider_1014_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                                <ul>
                                    
                                <?php
                                $slider = mysqli_query($conexion,"SELECT * FROM ".$bdPanelControl.".slider WHERE sli_activo=1 ORDER BY sli_posicion");
                                while($sli = mysqli_fetch_array($slider)){
                                    $url = '';
                                    if($sli['sli_url']!=""){
                                        $url = 'href="'.$sli['sli_url'].'" target="_blank"';
                                    }
                                ?>
                                    <!-- SLIDE 1 -->	
                                    <li data-index="rs-1000" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="2000"  data-thumb="../panelcontrol/files/slider/<?=$sli['sli_imagen'];?>"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    
                                    <!-- MAIN IMAGE -->
                                    <img src="../panelcontrol/files/slider/<?=$sli['sli_imagen'];?>"  alt=""  data-bgposition="center center" data-bgfit="cover" class="rev-slidebg" data-no-retina/>
                                    <!-- LAYERS -->
                                    
                                    <!-- LAYER NR. 1 [ for overlay ] -->
                                    <div class="tp-caption tp-shape tp-shapewrapper " 
                                    id="slide-100-layer-1" 
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                    data-width="full"
                                    data-height="full"
                                    data-whitespace="nowrap"
                                    data-type="shape" 
                                    data-basealign="slide" 
                                    data-responsive_offset="off" 
                                    data-responsive="off"
                                    data-frames='[
                                    {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                    {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                    ]'
                                    data-textAlign="['left','left','left','left']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    
                                    style="z-index: 12;background-color:rgba(0, 0, 0, 0.4);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                    </div>
                                    
                                    <!-- LAYER NR. 2 [ for video ] -->
                                    <div class="rs-background-video-layer" 
                                    data-forcerewind="on" 
                                    data-volume="mute" 
                                    data-videowidth="100%" 
                                    data-videoheight="100%" 
                                    data-videomp4="media/video/dronjm.mp4" 
                                    data-videopreload="auto" 
                                    data-videoloop="loop" 
                                    data-aspectratio="16:9" 
                                    data-autoplay="true" 
                                    data-autoplayonlyfirsttime="false"></div>


                                <?php if($sli['sli_titulo']!=""){?>  
                                    <!-- LAYER NR. 3 [ for title ] -->
                                    <div class="tp-caption  tp-resizeme" 
                                    id="slide-100-layer-3" 
                                    data-x="['left','left','left','left']" data-hoffset="['280','280','280','280']" 
                                    data-y="['top','top','top','top']" data-voffset="['200','200','200','200']"  
                                    data-width="none"
                                    data-height="none"
                                    data-fontsize="['60','60','60','50']"
                                    data-lineheight="['70','70','70','60']"
                                    data-whitespace="nowrap"
                                    data-type="text" 
                                    data-responsive_offset="on" 
                                    
                                    data-frames='[
                                    {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                    {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                    ]'
                                    
                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                
                                    style="z-index: 13; 
                                    white-space: normal; 
                                    font-weight: 700; 
                                    color: rgba(255, 255, 255, 1.00);
                                    border-width:0px;">
                                    <span style="font-family:'Roboto' ;">
                                        <span class="text-primary text-uppercase"><?=$sli['sli_titulo'];?> </span>
                                        <!--<span class="typewrite text-white font-weight-500 text-uppercase" data-period="2000" data-type='[ "Your House. " , "Your Hospital.", "Your Office."]'></span>-->
                                    </span>
                                    </div>
                                    <?php }?>

                                        
                                    <?php if($sli['sli_texto_corto']!=""){?>    
                                    <!-- LAYER NR. 8 [ for paragraph] -->
                                    <div class="tp-caption  tp-resizeme" 
                                    id="slide-100-layer-8" 
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['300','300','300','300']"    
                                    data-fontsize="['18','18','18','30']"
                                    data-lineheight="['30','30','30','40']"
                                    data-width="['800','800','800','800']"
                                    data-height="['none','none','none','none']"
                                    data-whitespace="['normal','normal','normal','normal']"
                                    
                                    data-type="text" 
                                    data-responsive_offset="on"
                                    data-frames='[
                                    {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                    {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                    ]'
                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    
                                    style="z-index: 13; 
                                    font-weight: 500; 
                                    color: rgba(255, 255, 255, 0.85);
                                    border-width:0px;">
                                    <span style="font-family:'Roboto';"><?=$sli['sli_texto_corto'];?></span>
                                    </div>
                                    <?php }?>
                                
                                    <!-- LAYER NR. 9 [ for readmore botton ] -->
                                    <div class="tp-caption tp-resizeme" 	
                                    id="slide-100-layer-9"						
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['400','400','400','500']"    
                                    data-lineheight="['none','none','none','none']"
                                    data-width="['300','300','300','300']"
                                    data-height="['none','none','none','none']"
                                    data-whitespace="['normal','normal','normal','normal']"
                                    
                                    data-type="text" 
                                    data-responsive_offset="on"
                                    data-frames='[ 
                                    {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeOut"},
                                    {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                    ]'
                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    
                                    style="z-index:13; text-transform:uppercase; font-weight:700;">

                                    <?php if($sli['sli_boton']!="" and $sli['sli_url']!=""){?>    
                                        <a href="<?=$sli['sli_url'];?>" class="site-button button-lg skew-icon-btn m-r15"><?=$sli['sli_boton'];?><i class="fa fa-angle-double-right"></i></a>
                                    <?php }?>
                                    
                                    </div>
                                    
                                  </li>

                                  <?php }?>



                                </ul>
                                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	
                           </div>
                        </div>
                        <!-- END REVOLUTION SLIDER -->
                    </div>
            	</div>
            </div>
            <!-- SLIDER END -->