<?php
	$body_classes = get_body_class();
	if (in_array('term-math',$body_classes)) {
		$current_class = 'math';
		$img_url = 'math-img-1.svg';
		$img_inner_url = 'math-img-2.svg';
	} else if (in_array('term-program',$body_classes)) {
		$current_class = 'program';
		$img_url = 'program-img-1.svg';
		$img_inner_url = 'program-img-2.svg';
	} else if (in_array('term-chemistry',$body_classes)) {
		$current_class = 'chemistry';
		$img_url = 'khimia-img-1.svg';
		$img_inner_url = 'khimia-img-2.svg';
	} else if (in_array('term-physics',$body_classes)) {
		$current_class = 'physics';
		$img_url = 'physics-img-1.svg';
		$img_inner_url = 'physics-img-2.svg';
	}
?>

<div class="hero__subject">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero__subject-img <?php echo $current_class ?>__subject-img">
					<img src="<?php bloginfo('template_url') ?>/img/<?php echo $img_url ?>" alt="">
					<div id="hero__subject-img__inner" class="hero__subject-img__inner <?php echo $current_class ?>__img-inner">
						<img src="<?php bloginfo('template_url') ?>/img/<?php echo $img_inner_url ?>" alt="" data-depth-x="0.7" data-depth-y="1">
					</div>
				</div>
				<div class="hero__subject-title <?php echo $current_class ?>__subject-title">
					<?php single_term_title(); ?>
				</div>
			</div>
		</div>
	</div>
</div>