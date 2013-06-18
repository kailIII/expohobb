<?php
  include_once 'includes.php';
  $listado_marquee = new Marquee();
  $marquees = $listado_marquee->viewMarquee();
  //<?php print $marquees['view']; 
?>
<div class="clear">
	<!-- uBillboard 3.1.1 ID:0 Name:billboard -->			
	<div class='uds-bb uds-dark' id='uds-bb-0' style='width:921px;height:380px'>
		<div class='uds-bb-controls'>
			<div class='uds-bb-paginator modern outside'>
				<div class='uds-bb-paginator moderncontainer'>
					<div class='uds-bb-button uds-bb-prev'>
						<span>Prev</span>
					</div>
					<div class='uds-bb-button uds-bb-playpause uds-left'>
						<span>Play</span>
					</div>
					<div class='uds-bb-button uds-bb-next'>
						<span>Next</span>
					</div>
					<div class='uds-bb-position-indicator-bullets'></div>
				</div>
			</div>

			<div class='uds-bb-thumbnails modern right inside'>
				<div class='uds-bb-thumbnail-container'>
					<?php print $marquees['preview'];?>
				</div>
			</div>
		</div>

		<!-- empieza imagen-->			
		<div class='uds-bb-slides'>

			<?php print $marquees['view']; ?>		
		</div>
	</div>
	<!-- END uBillboard ID:0 -->			
</div>

<script type='text/javascript'>
	jQuery(document).ready(function($){

		$('#uds-bb-0').show().uBillboard({
			width: '921px',
			height: '380px',
			squareSize: '100px',
			autoplay: true,
			pauseOnVideo: false,
			showControls: true,
			showPause: true,
			showPaginator: true,
			showThumbnails: 'hover',
			showTimer: true,
			thumbnailHoverColor: "#40B9FF",
			slides: {
				<?php print $marquees['js']; ?>
			}
		});

	});
</script>
<script type='text/javascript' src='slider/js/billboard.min.js?ver=3.1.1'></script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-13144427-1']);
	_gaq.push(['_setDomainName', 'udesignstudios.net']);
	_gaq.push(['_setAllowHash', 'false']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
