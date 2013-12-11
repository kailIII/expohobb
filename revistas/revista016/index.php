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
                      <area shape="rect" coords="59,24,424,298" href="http://www.fibrofacileltigre.com.ar/" target="_blank" alt="Artística El tigre">
                      <area shape="rect" coords="61,326,423,587" href="http://www.elnuevoemporio.com.ar/" target="_blank" alt="El Nuevo Emporio">
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
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>05.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map13"/>
                    <map name="Map13" id="Map13">
                      <area shape="rect" coords="41,443,391,568" href="http://www.libreriaedorado.com.ar/" target="_blank" alt="Ensueño Dorado" />
                    </map>
                	</span>
              </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>06.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>07.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
          </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>08.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>09.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map12"/>
                    <map name="Map12" id="Map12">
                      <area shape="rect" coords="41,437,368,559" href="http://www.rustoleum.com.ar/" target="_blank" alt="Rust-Oleum" />
                    </map>
                	</span>
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
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>12.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map"/>
                    <map name="Map" id="Map">
                      <area shape="rect" coords="45,453,206,576" href="http://www.fleibor.com.ar/" target="_blank" alt="Fleibor" />
                      <area shape="rect" coords="221,452,380,577" href="http://www.mundomagicodetortas.com.ar/" target="_blank" alt="MmT" />
                    </map>
                	</span>
              </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>13.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map14"/>
                    <map name="Map14" id="Map14">
                      <area shape="rect" coords="45,30,376,577" href="http://www.cooperreposteria.com.ar/" target="_blank" alt="Cooper" />
                    </map>
                	</span>
        </div>
           
            <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>14.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
              </div>
           
           <!-- empieza hoja -->
                <div>
               	  <span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>15.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map4"/>
                  <map name="Map4" id="Map4">
                    <area shape="rect" coords="201,442,393,588" href="http://www.cotillon-alas.com.ar/" target="_blank" alt="Taller Alas" />
                    <area shape="rect" coords="320,357,399,426" href="https://www.facebook.com/PaulasDecoLaminasParaSublimar" target="_blank" alt="Paulas Deco Laminas Para Sublimar" />
                  </map>
               	  </span>
          </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>16.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>17.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map6"/></span>
                     <map name="Map6" id="Map6">
                      <area shape="rect" coords="216,28,396,301" href="http://www.flogus.com.ar" target="_blank" alt="Cortantes Flogus" />
                      <area shape="rect" coords="28,27,208,298" href="http://www.arteztv.com.ar" target="_blank" alt="Artez" />
                      <area shape="rect" coords="211,307,393,574" href="http://www.tedigoquetequiero.com.ar" target="_blank" alt="te digo que te quiero" />
                    </map>
             </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>18.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>19.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map11"/>
					<map name="Map11" id="Map11">
                      <area shape="rect" coords="28,446,391,572" href="http://www.facebook.com/gabyedeldesigns" target="_blank" alt="Gaby Edel" />
                    </map>
                	</span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>20.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>21.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map8"/>
                    <map name="Map8" id="Map8">
                      <area shape="rect" coords="220,21,385,565" href="http://www.artesanataller.com.ar" target="_blank" alt="Artesana taller" />
                    </map>
                	</span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>22.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>23.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map9"/>
                    <map name="Map9" id="Map9">
                      <area shape="rect" coords="33,449,395,566" href="http://www.alejandragutierrez.com.ar" target="_blank" alt="Alejandra Gutierrez" />
                    </map>
               	  </span>
                </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>24.jpg' alt='Expohobby Decodigital' width= '429' border="0"/>
                    
                	</span>
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
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>27.jpg' alt='Expohobby Decodigital' width= '429' border="0"/>
                    
               	  </span>
                </div>
          
           <!-- empieza hoja -->
                <div>
               	  <span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>28.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
          </div>
          
           <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>29.jpg' alt='Expohobby Decodigital' width= '429' border="0"/>
                    
               	  </span>
                </div>
              
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>30.jpg' alt='Expohobby Decodigital' width= '429' border="0" usemap="#Map3"/>
                    <map name="Map3" id="Map3">
                      <area shape="rect" coords="28,448,388,566" href="http://productoscreaciones.com.ar/" target="_blank" alt="Productos Creaciones" />
                    </map>
                	</span>
                </div>
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>31.jpg' alt='Expohobby Decodigital' width= '429' border="0"  usemap="#Map10"/></span>
                    <map name="Map10" id="Map10">
                      <area shape="rect" coords="34,26,210,298" href="http://www.facebook.com/diadeamigas" target="_blank" alt="Día de Amigas" />
                      <area shape="rect" coords="219,27,390,300" href="http://www.facebook.com/andrearabal" target="_blank" alt="Andrea Rabal" />
                      <area shape="rect" coords="23,314,392,443" href="http://www.sylviarodriguezartistika.com" target="_blank" alt="Sylvia Rodriguez" />
                      <area shape="rect" coords="24,451,389,583" href="http://www.porcelanamamadora.com.ar" target="_blank" alt="Porcelana Mamá Dora" />
                    </map>
          </div>
          <!-- empieza hoja -->
                <div>
                	<span class='zoom ex1'><img src='<?php echo 'revistas/revista'.$revista['id'].'/pages/';?>32.jpg' alt='Expohobby Decodigital' width= '429' border="0"/></span>
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
