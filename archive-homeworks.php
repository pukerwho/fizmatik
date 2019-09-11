<?php get_header(); ?>
<div class="homeworks">
	<?php get_template_part('blocks/balls/balls-one') ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="homeworks__title">Домашние задания</h1>
			</div>
		</div>
	</div>
	<!-- homeworks filter -->
	<div class="homeworks__filter">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php get_template_part('blocks/homeworks/homeworks-form') ?>			
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div id="homeworks_response" class="row">
				<div class="col-md-12">
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
						$custom_query_homeworks = new WP_Query( array( 
							'post_type' => 'homeworks',
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
						if ($custom_query_homeworks->have_posts()) : while ($custom_query_homeworks->have_posts()) : $custom_query_homeworks->the_post(); ?>
						<?php get_template_part('blocks/homeworks/homeworks-item') ?>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>