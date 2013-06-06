<?php
  include_once 'includes.php';

  $preview_marquee = new Marquee();
  $marquee = $preview_marquee->previewMarquee($_POST['id']);
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
					<?php print $marquee['preview']; ?>
				</div>
			</div>
		</div>
		<div class='uds-bb-slides'>
			<?php print $marquee['view']; ?>
			<div>
				<a href='#' class='uds-bb-link'>
					<img src='ctgrande/promo.jpg' alt='' class='uds-bb-bg-image' width="921"/>			
				</a>
			</div>
		</div>
	</div>
	<!-- END uBillboard ID:0 -->			
</div>

<script type='text/javascript'>
	//<![CDATA[
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
				0: {
					linkTarget: '',
					delay: 10000,
					transition: 'fade',
					direction: 'bottom',
					bgColor: 'transparent',
					repeat: 'repeat',
					stop: false,
					autoplayVideo: true
				},
				1: {
					linkTarget: '',
					delay: 5000,
					transition: 'scale',
					direction: 'spiralOut',
					bgColor: '#FFFFFF',
					repeat: 'repeat',
					stop: false,
					autoplayVideo: true
				},
				2: {
					linkTarget: '',
					delay: 5000,
					transition: 'none',
					direction: 'none',
					bgColor: '#0F0F0F',
					repeat: 'repeat',
					stop: false,
					autoplayVideo: false
				},
				3: {
					linkTarget: '',
					delay: 5000,
					transition: 'scale',
					direction: 'center',
					bgColor: 'transparent',
					repeat: 'repeat',
					stop: false,
					autoplayVideo: true
				},
				4: {
					linkTarget: '',
					delay: 5000,
					transition: 'slide',
					direction: 'top',
					bgColor: 'transparent',
					repeat: 'repeat',
					stop: false,
					autoplayVideo: true
				},
				5: {
					linkTarget: '',
					delay: 5000,
					transition: 'fade',
					direction: 'none',
					bgColor: 'transparent',
					repeat: 'repeat',
					stop: false,
					autoplayVideo: true
				}
			}
		});
	
	});
	//]]>
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
