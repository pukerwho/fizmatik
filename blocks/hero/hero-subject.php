<div class="hero__subject">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero__subject-img">
					<img src="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_subject_img') ?>" alt="">
				</div>
				<div class="hero__subject-title">
					<?php single_term_title(); ?>
				</div>
			</div>
		</div>
	</div>
</div>