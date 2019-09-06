<div class="schedule__top">
	<?php
		$body_classes = get_body_class();
		if (in_array('post-type-archive-lessons',$body_classes)) {
			get_template_part('blocks/balls/balls-one');
		}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Расписание</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php get_template_part('blocks/schedule/schedule-form') ?>			
			</div>
		</div>
	</div>
</div>