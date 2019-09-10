<?php get_header(); ?>
<div class="lessons">
	<?php get_template_part('blocks/schedule/schedule-top') ?>
	<div class="schedule__bottom">
		<div class="container">
			<div id="schedule_response" class="row">
				<?php 
					$custom_query_homeworks = new WP_Query( array( 
						'post_type' => 'lessons',
						'meta_query' => array(
							array(
								'key'     => 'crb_lessons_city',
					      'value'   => $_SESSION['cityvar'],
					      'compare' => '=', 
							)
						)
					) );
					if ($custom_query_homeworks->have_posts()) : while ($custom_query_homeworks->have_posts()) : $custom_query_homeworks->the_post(); ?>
				<?php get_template_part('blocks/schedule/schedule-bottom') ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>