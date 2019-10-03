<div class="fizmat__form selected-homeworks">
	<div class="fizmat__items">
		<div class="fizmat__item">
			<span>Направление</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="homeworks-subject">
		    	Выберете направление
		    </div>
		    <div class="fizmat__item-list" data-listId="homeworks-subject">
		    	<?php $subject_cats = get_terms( array( 'taxonomy' => 'subject', 'parent' => 0, 'hide_empty' => false ) );
		    	foreach ( $subject_cats as $subject_cat ): ?>
		    		<input type="checkbox" name="" value="<?php echo $subject_cat->term_id ?>" id="teacher-<?php echo $subject_cat->term_id ?>" class="filter-homeworks-subjects fizmat-checkbox fizmat-homeworks-checkbox" data-array="homeworksSubjectsArray"/>
						<label for="teacher-<?php echo $subject_cat->term_id ?>">
							<?php echo $subject_cat->name ?>
			      </label>
		    	<?php endforeach; ?>
		    </div>
		  </div>	
		</div>
		<div class="fizmat__item">
			<span>Преподаватель</span>
			<div class="select-wrapper">
		    <div class="fizmat__item-title" data-itemId="homeworks-teacher">
		    	Выберете преподавателя
		    </div>
		    <div class="fizmat__item-list" data-listId="homeworks-teacher">
		    	<?php 
						$custom_query_teachers = new WP_Query( array( 
							'post_type' => 'teachers',
						) );
						if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post(); ?>
							<input type="checkbox" name="collectionsfilter[]" value="<?php echo get_the_id(); ?>" id="teacher-<?php echo get_the_id(); ?>" class="filter-homeworks-teachers fizmat-checkbox fizmat-homeworks-checkbox" data-array="homeworksTeachersArray"/>
							<label for="teacher-<?php echo get_the_id(); ?>">
								<?php the_title(); ?>
				      </label>
		    		<?php endwhile; endif; wp_reset_postdata(); 
		    	?>
		    </div>
		  </div>
		</div>
		<div class="fizmat__item">
			<span>Класс</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="homeworks-class">
		    	Выберете класс
		    </div>
		    <div class="fizmat__item-list" data-listId="homeworks-class">
		    	<?php $class_cats = get_terms( array( 'taxonomy' => 'class', 'parent' => 0, 'hide_empty' => false ) );
		    	foreach ( $class_cats as $class_cat ): ?>
		    		<input type="checkbox" name="" value="<?php echo $class_cat->term_id ?>" id="teacher-<?php echo $class_cat->term_id ?>" class="filter-homeworks-class fizmat-checkbox fizmat-homeworks-checkbox" data-array="homeworksClassArray"/>
						<label for="teacher-<?php echo $class_cat->term_id ?>">
							<?php echo $class_cat->name ?>
			      </label>
		    	<?php endforeach; ?>
		    </div>
		  </div>
		</div>
	</div>
	<div class="fizmat__button fizmat__clean homeworks-clean">
		Очистить все
	</div>
</div>