<script>
		$(document).ready(function(){
			$(".ver").click(function(){
				//$('.ex1').zoom();
				
				$('.ex1').zoom({ on:'grab' });
				$('#follower').show();
				$('#ex3').zoom({ on:'click' });			 
				//$('.ex1').zoom({ on:'toggle' });
				$('.ver').attr({
				'style': 'background: url(imagenes/lupahover.png)no-repeat  1px 0;)'
			});
				
		});
			$("#magazine").click(function(){
				$('#follower').hide();
			});
			$(".stop").click(function(){
				$('.ex1').off(".zoom");
				$('.zoomImg').remove();
				$('#follower').hide();
				$('.ver').attr({
				'style': ''
		});
		});
		});	
	</script>  
	<div id="contmag"  class="container">
        <div id="follower" style="display:none">
              <p><span>Para utilizar el zoom:</span>
               <br> 1-Seleccione la hoja que desee<br>
                    2- Mantenga apretado con el botón izquierdo del mouse y deslicelo por toda la hoja</p>
        </div>
        <div id="menuzoom">
        	<div class="contzoom">
                <div  title="Zoom" class="ver"></div>
                <div title="Quitar Zoom" class="stop"></div>
                 <a title="Descargar  <?php echo $revista['title'];?>"  href="<?php echo 'revistas/revista'.$revista['id'].'/revista.pdf';?>" class="des" target="_blank"></a>
            </div>
            <a href="index.php" title="Expohobby"><img width="62" src="imagenes/logoexp.jpg"/></a>
        </div>
		<div id="magazine">
        
        
        <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src="<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>01.jpg" alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
             
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>02.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map2"/>
                    <map name="Map2">
                      <area shape="rect" coords="59,24,424,298" href="http://www.fibrofacileltigre.com.ar/" target="_blank">
                      <area shape="rect" coords="61,326,423,587" href="http://www.elnuevoemporio.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>03.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>04.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>05.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>06.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>07.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map"/>
                    <map name="Map" id="Map">
                      <area shape="rect" coords="12,24,381,570" href="http://www.productoscreaciones.com.ar/" target="_blank" />
                    </map>
                	</span>
              </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>08.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>09.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>10.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>11.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>12.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>13.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>14.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>15.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#MapMap"/>
                	<map name="MapMap">
                	  <area shape="rect" coords="17,24,210,299" href="http://www.arteztv.com.ar/" target="_blank">
                	  <area shape="rect" coords="218,26,372,299" href="http://www.flogus.com.ar/home.html" target="_blank">
                	  <area shape="rect" coords="221,305,371,584" href="http://diadeamigas.wix.com/diadeamigas" target="_blank">
              	  </map>
                	</span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>16.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>17.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>18.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>19.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>20.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>21.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>22.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>23.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>24.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>25.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>26.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>27.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>28.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map3"/>
                    <map name="Map3">
                      <area shape="rect" coords="42,448,208,580" href="http://www.fleibor.com.ar/" target="_blank">
                      <area shape="rect" coords="221,453,412,576" href="http://mundomagicodetortas.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>29.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map4"/>
                    <map name="Map4">
                      <area shape="rect" coords="214,9,360,575" href="http://www.artesanataller.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>30.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map5"/>
                    <map name="Map5">
                      <area shape="rect" coords="59,14,412,572" href="http://www.productoscreaciones.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
              
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>31.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map6"/>
                    <map name="Map6">
                      <area shape="rect" coords="25,23,366,581" href="http://www.cooperreposteria.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>32.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>33.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>34.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>35.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map7"/>
                    <map name="Map7">
                      <area shape="rect" coords="21,451,340,573" href="http://www.alejandragutierrez.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>36.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>37.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map8"/>
                    <map name="Map8">
                      <area shape="rect" coords="19,26,364,165" href="https://www.facebook.com/graciela.maglioco" target="_blank">
                      <area shape="rect" coords="12,311,358,444" href="http://sylviarodriguezartistika.com/" target="_blank">
                      <area shape="rect" coords="14,452,356,588" href="http://www.porcelanamamadora.com.ar/" target="_blank">
<area shape="rect" coords="18,168,362,296" href="http://www.libreriaedorado.com.ar/" target="_blank">
                    </map>
                	</span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>38.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>39.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>40.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
            
	  </div>
	</div>
<script type="text/javascript">
	
	
	$('#magazine').bind('turned', function(e, page) {

		console.log('Current view: ', $('#magazine').turn('view'));

	})

	$('#magazine').turn({width: 858, height: 607, acceleration: true, shadows: !$.isTouch});
	
	$(document).ready(function() {
	$(document).mousemove(function(e){
			$('#follower').css({left: e.pageX, top:e.pageY});
	});
});

</script>
