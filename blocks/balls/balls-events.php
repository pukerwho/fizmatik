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
				<div class="balls__events-yellow"></div>
				<div class="balls__events-red"></div>
				<div class="balls__events-bigblueone"></div>
				<div class="balls__events-greenone"></div>
				<?php if($show_balls): ?>
					<div class="balls__events-greentwo"></div>
				<?php endif; ?>
			</div>	
		</div>
	</div>
</div>

<?php if($show_balls): ?>
	<div class="balls__events-bigbluetwo"></div>
<?php endif; ?>