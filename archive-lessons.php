<?php get_header(); ?>
<div class="lessons">
	<?php get_template_part('blocks/schedule/schedule-top') ?>
	<div class="schedule__bottom">
		<div class="container">
			<div id="schedule_response" class="row">
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
					$custom_query_lessons = new WP_Query( array( 
						'post_type' => 'lessons',
						'meta_query' => array(
							array(
								'key'     => 'crb_lessons_city',
					      'value'   => $_SESSION['cityvar'],
					      'compare' => '=', 
							)
						),
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
				    ),
					) );
					if ($custom_query_lessons->have_posts()) : while ($custom_query_lessons->have_posts()) : $custom_query_lessons->the_post(); ?>
				<?php get_template_part('blocks/schedule/schedule-bottom') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>