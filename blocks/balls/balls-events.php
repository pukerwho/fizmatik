<?php
	$body_classes = get_body_class();
	if (in_array('post-type-archive-events',$body_classes)) {
		$show_balls = true;
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="balls">
				<div id="balls__events-yellow" class="p-absolute">
					<div class="balls__events-yellow" data-depth="0.5"></div>	
				</div>
				<div id="balls__events-red" class="p-absolute">
					<div class="balls__events-red" data-depth="9"></div>	
				</div>
				<div id="balls__events-bigblueone" class="p-absolute">
					<div class="balls__events-bigblueone" data-depth="0.7"></div>	
				</div>
				<div id="balls__events-greenone" class="p-absolute">
					<div class="balls__events-greenone" data-depth="10"></div>	
				</div>
				<?php if($show_balls): ?>
					<div id="balls__events-greentwo" class="p-absolute">
						<div class="balls__events-greentwo" data-depth="15"></div>	
					</div>
				<?php endif; ?>
			</div>	
		</div>
	</div>
</div>

<?php if($show_balls): ?>
	<div id="balls__events-bigbluetwo" class="p-absolute">
		<div class="balls__events-bigbluetwo" data-depth="0.8"></div>	
	</div>
<?php endif; ?>