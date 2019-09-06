<div class="fizmat__form">
	<div class="fizmat__item">
		<span>Направление</span>
		<div class="select-wrapper">
	    <select class="select select-homeworks-subject">
	    	<?php $subject_cats = get_terms( array( 'taxonomy' => 'subject', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $subject_cats as $subject_cat ): ?>
	    		<option value="<?php echo $subject_cat->term_id ?>"><?php echo $subject_cat->name ?></option>
	    	<?php endforeach; ?>
	    </select>
	  </div>	
	</div>
	<div class="fizmat__item">
		<span>Преподаватель</span>
		<div class="select-wrapper">
	    <select class="select select-homeworks-teachers">
	    	<option value="" disabled selected>Выберите преподавателя</option>
	    	<?php 
					$custom_query_teachers = new WP_Query( array( 
						'post_type' => 'teachers',
					) );
					if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post(); ?>
	    		<option value="<?php echo get_the_id(); ?>"><?php the_title(); ?></option>
	    	<?php endwhile; endif; wp_reset_postdata(); ?>
	    </select>
	  </div>
	</div>
	<div class="fizmat__item">
		<span>Класс</span>
		<div class="select-wrapper">
	    <select class="select select-homeworks-class">
	    	<?php $class_cats = get_terms( array( 'taxonomy' => 'class', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $class_cats as $class_cat ): ?>
	    		<option value="<?php echo $class_cat->term_id ?>"><?php echo $class_cat->name ?></option>
	    	<?php endforeach; ?>
	    </select>
	  </div>
	</div>
</div>