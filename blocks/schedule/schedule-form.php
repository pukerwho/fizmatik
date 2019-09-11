<div class="fizmat__form">
	<?php
		$body_classes = get_body_class();
		if (in_array('post-type-archive-lessons',$body_classes)) {
			$archive_lessons = true;
		}
	?>
	<?php if (!$archive_lessons) {
		$current_term = get_queried_object_id();
	} ?>
	<div class="fizmat__item-big">
		<span>Направление</span>
		<div class="select-wrapper">
	    <select class="select select-schedule-subject">
	    	<?php $subject_cats = get_terms( array( 'taxonomy' => 'subject', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $subject_cats as $subject_cat ): ?>
	    		<option value="<?php echo $subject_cat->term_id ?>" <?php if ($current_term === $subject_cat->term_id ) echo 'selected' ; ?>><?php echo $subject_cat->name ?></option>
	    	<?php endforeach; ?>
	    </select>
	  </div>
	</div>
</div>
<div class="fizmat__form">
	<?php if($archive_lessons): ?>
		<div class="fizmat__item">
			<span>Город</span>
			<div class="select-wrapper">
				<select class="select select-schedule-city">
					<option value="kh" <?php if ($_SESSION['cityvar'] == 'kh' ) echo 'selected' ; ?> >Харьков</option>
					<option value="kyiv" <?php if ($_SESSION['cityvar'] == 'kyiv' ) echo 'selected' ; ?>>Киев</option>
				</select>
			</div>
		</div>
	<?php endif; ?>
	<div class="fizmat__item">
		<span>Класс</span>
		<div class="select-wrapper">
	    <select class="select select-schedule-class">
	    	<?php $class_cats = get_terms( array( 'taxonomy' => 'class', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $class_cats as $class_cat ): ?>
	    		<option value="<?php echo $class_cat->term_id ?>"><?php echo $class_cat->name ?></option>
	    	<?php endforeach; ?>
	    </select>
	  </div>
	</div>
	<div class="fizmat__item">
		<span>Преподаватель</span>
		<div class="select-wrapper">
	    <select class="select select-schedule-teachers">
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
		<span>День недели</span>
		<div class="select-wrapper">
			<select class="select select-schedule-day">
				<option value="" disabled selected>Выберите день недели</option>
				<option value="Пн">Пн</option>
				<option value="Вт">Вт</option>
				<option value="Ср">Ср</option>
				<option value="Чт">Чт</option>
				<option value="Пт">Пт</option>
				<option value="Сб">Сб</option>
				<option value="Вс">Вс</option>
			</select>
		</div>
	</div>
</div>