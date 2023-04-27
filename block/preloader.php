<? // unset($_SESSION['loader']); ?>
<? if (!isset($_SESSION['loader']) || !$_SESSION['loader']): ?>
	<div class="preload">
		<!-- <div class="preload_c">
			<div class="preload_logo"></div>
			<div class="preload_animate"><?=t::w('loading')?></div>
		</div> -->
		<div class="preload_o2">
			<div class="preload_o21"><div class="nocaret1">SHIPA</div></div>
			<div class="preload_o22"><div class="nocaret2">DELUXE</div></div>
		</div>
	</div>
	<script>
		window.onload =()=> {
			setTimeout(function () {
				$(".preload").addClass('preloader_act')
				setTimeout(function(){$(".preload").addClass('dsp_n')}, 300)
			}, 2000)
		}
	</script>
   <? $_SESSION['loader'] = true; ?>
<? endif ?>