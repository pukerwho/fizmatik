<?php get_header(); ?>

<div class="teachers">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="balls">
					<div id="balls__teachers-yellow" class="p-absolute">
						<img src="<?php bloginfo('template_url') ?>/img/yellow.png" alt="" data-depth="0.7">	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Преподаватели</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php get_template_part('blocks/teachers/teachers-form') ?>			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="balls">
					<div class="balls__teachers-green">
						<img src="<?php bloginfo('template_url') ?>/img/contact-green.svg" alt="">
					</div>
					<div id="balls__teachers-redcircle" class="p-absolute">
						<div class="balls__teachers-redcircle" data-depth="8"></div>	
					</div>
					<div class="balls__teachers-red">
						<img src="<?php bloginfo('template_url') ?>/img/contact-red.svg" alt="">
					</div>
					<div id="balls__teachers-greencircle" class="p-absolute">
						<div class="balls__teachers-greencircle" data-depth="6"></div>	
					</div>
					<div id="balls__teachers-smallblue" class="p-absolute">
						<div class="balls__teachers-smallblue" data-depth="10"></div>	
					</div>
				</div>
			</div>
		</div>
		<div id="teachers_subject_response" class="row">
			<?php 
				$args = array('number' => '1',);
				$subject_cats = get_terms('subject', $args );
				foreach( $subject_cats as $subject_cat ) {
				  $first_subject_cat = $subject_cat->term_id;
				}
				$class_cats = get_terms('class', $args );
				foreach( $class_cats as $class_cat ) {
				  $first_class_cat = $class_cat->term_id;
				}
				$custom_query_teachers = new WP_Query( array( 
					'post_type' => 'teachers',
			    'meta_query' => array(
						array(
							'key'     => 'crb_teachers_city',
				      'value'   => $_SESSION['cityvar'],
				      'compare' => '=', 
						)
					)
				) );
				if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post(); ?>
				<?php get_template_part('blocks/teachers/teachers') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="balls">
		<div id="balls__teachers-bigblue" class="p-absolute">
			<div class="balls__teachers-bigblue" data-depth="0.3"></div>		
		</div>
	</div>
</div>

<?php get_footer(); ?>