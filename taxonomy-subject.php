<?php get_header(); ?>

<div class="subjects">
	<!-- hero banner -->
	<?php get_template_part('blocks/hero/hero-subject') ?>

	<!-- teachers -->
	<?php get_template_part('blocks/balls/balls-subjects') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Преподаватели</h2>
			</div>
		</div>
		<div id="teachers_subject_response" class="row">
			<?php 
				$current_term = get_queried_object_id();
				$custom_query_teachers = new WP_Query( array( 
					'post_type' => 'teachers',
					'tax_query' => array(
				    array(
				      'taxonomy' => 'subject',
					    'terms' => $current_term,
				      'field' => 'term_id',
				      'include_children' => true,
				      'operator' => 'IN'
				    )
					),
				) );
				if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post(); ?>
					<?php get_template_part('blocks/teachers/teachers') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<!-- schedule -->
	<?php get_template_part('blocks/schedule/schedule-top') ?>

	<div class="schedule__bottom">
		<div class="container">
			<div class="row">
				<?php 
					$current_term = get_queried_object_id();
					$custom_query_lessons = new WP_Query( array( 
						'post_type' => 'lessons',
						'tax_query' => array(
					    array(
					      'taxonomy' => 'subject',
						    'terms' => $current_term,
					      'field' => 'term_id',
					      'include_children' => true,
					      'operator' => 'IN'
					    )
						),
						'meta_query' => array(
							array(
								'key'     => 'crb_lessons_city',
					      'value'   => $_SESSION['cityvar'],
					      'compare' => '=', 
							)
						)
					) );
					if ($custom_query_lessons->have_posts()) : while ($custom_query_lessons->have_posts()) : $custom_query_lessons->the_post(); ?>
						<?php get_template_part('blocks/schedule/schedule-bottom') ?>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>

	<!-- events -->
	<?php get_template_part('blocks/events/events-blocks') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="<?php echo get_post_type_archive_link( 'events' ); ?>">
					<div class="events__more">
						<div>
							Еще мероприятия	
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>