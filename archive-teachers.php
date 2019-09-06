<?php get_header(); ?>

<div class="teachers">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="balls">
					<div class="balls__teachers-yellow"></div>
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
					<div class="balls__teachers-redcircle"></div>
					<div class="balls__teachers-red">
						<img src="<?php bloginfo('template_url') ?>/img/contact-red.svg" alt="">
					</div>
					<div class="balls__teachers-greencircle"></div>
					<div class="balls__teachers-smallblue"></div>
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
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'subject',
				      'terms' => $first_subject_cat,
				      'field' => 'term_id',
				      'include_children' => true,
				      'operator' => 'IN'
						),
						array(
							'taxonomy' => 'class',
				      'terms' => $first_class_cat,
				      'field' => 'term_id',
				      'include_children' => true,
				      'operator' => 'IN'
						)
			    )
				) );
				if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post(); ?>
				<?php get_template_part('blocks/teachers/teachers') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="balls">
		<div class="balls__teachers-bigblue"></div>	
	</div>
</div>

<?php get_footer(); ?>