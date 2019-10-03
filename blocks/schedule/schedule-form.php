<div class="fizmat__form selected-schedule-subject">
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
			<div class="fizmat__item-title fizmat__item-title-big" data-itemId="lessons-subject" data-array="lessonsSubjectsArray">
	    	Выберите направление
	    </div>
	    <div class="fizmat__item-list" data-listId="lessons-subject" data-array="lessonsSubjectsArray">
	    	<?php $subject_cats = get_terms( array( 'taxonomy' => 'subject', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $subject_cats as $subject_cat ): ?>
	    		<input 
	    		type="checkbox" 
	    		name="fizmat-checkbox" 
	    		value="<?php echo $subject_cat->term_id ?>" 
	    		id="lessons-subject-<?php echo $subject_cat->term_id ?>" 
	    		<?php if ($current_term === $subject_cat->term_id ) echo 'checked' ; ?> 
	    		class="filter-lessons-subjects fizmat-checkbox fizmat-lessons-checkbox" 
	    		data-array="lessonsSubjectsArray" 
	    		data-title="<?php echo $subject_cat->name ?>"/>
					<label for="lessons-subject-<?php echo $subject_cat->term_id ?>">
						<?php echo $subject_cat->name ?>
		      </label>
	    	<?php endforeach; ?>
	    </div>
	  </div>
	</div>
</div>
<div class="fizmat__form selected-schedule-subject">
	<div class="fizmat__items">
		<?php if($archive_lessons): ?>
			<div class="fizmat__item">
				<span>Город</span>
				<div class="select-wrapper">
					<div class="fizmat__item-title" data-itemId="lessons-city" data-array="lessonsCityArray">
			    	Выберите город
			    </div>
			    <div class="fizmat__item-list" data-listId="lessons-city" data-array="lessonsCityArray">
			    	<input type="checkbox" name="fizmat-checkbox" value="kh" id="city-kh" class="filter-lessons-city fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsCityArray" data-title="Харьков"/>
						<label for="city-kh">
							Харьков
			      </label>
			      <input type="checkbox" name="fizmat-checkbox" value="kyiv" id="city-kyiv" class="filter-lessons-city fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsCityArray" data-title="Киев"/>
						<label for="city-kyiv">
							Киев
			      </label>
			    </div>
				</div>
			</div>
		<?php endif; ?>
		<div class="fizmat__item">
			<span>Класс</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="lessons-class" data-array="lessonsClassArray">
		    	Выберите класс
		    </div>
		    <div class="fizmat__item-list" data-listId="lessons-class" data-array="lessonsClassArray">
		    	<?php $class_cats = get_terms( array( 'taxonomy' => 'class', 'parent' => 0, 'hide_empty' => false ) );
		    	foreach ( $class_cats as $class_cat ): ?>
		    		<input 
		    		type="checkbox" 
		    		name="fizmat-checkbox" 
		    		value="<?php echo $class_cat->term_id ?>" 
		    		id="lessons-class-<?php echo $class_cat->term_id ?>" 
		    		class="filter-lessons-class fizmat-checkbox fizmat-lessons-checkbox" 
		    		data-array="lessonsClassArray" 
		    		data-title="<?php echo $class_cat->name ?>"/>
						<label for="lessons-class-<?php echo $class_cat->term_id ?>">
							<?php echo $class_cat->name ?>
			      </label>
		    	<?php endforeach; ?>
		    </div>
		  </div>
		</div>
		<div class="fizmat__item">
			<span>Преподаватель</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="lessons-teacher" data-array="lessonsTeacherArray">
		    	Выберите преподавателя
		    </div>
		    <div class="fizmat__item-list" data-listId="lessons-teacher" data-array="lessonsTeacherArray">
		    	<?php 
						$custom_query_teachers = new WP_Query( array( 
							'post_type' => 'teachers',
						) );
						if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post(); ?>
		    		<input 
		    		type="checkbox" 
		    		name="fizmat-checkbox" 
		    		value="<?php echo get_the_id(); ?>" 
		    		id="lessons-teacher-<?php echo get_the_id(); ?>" 
		    		class="filter-lessons-teacher fizmat-checkbox fizmat-lessons-checkbox" 
		    		data-array="lessonsTeacherArray" 
		    		data-title="<?php the_title(); ?>"/>
						<label for="lessons-teacher-<?php echo get_the_id(); ?>">
							<?php the_title(); ?>
			      </label>
		    	<?php endwhile; endif; wp_reset_postdata(); ?>
		    </div>
		  </div>
		</div>
		<div class="fizmat__item">
			<span>День недели</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="lessons-day" data-array="lessonsDayArray">
		    	Выберите день недели
		    </div>
		    <div class="fizmat__item-list" data-listId="lessons-day" data-array="lessonsDayArray">
		    	<input type="checkbox" name="fizmat-checkbox" value="Пн" id="day-pn" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Пн"/>
					<label for="day-pn">
						Пн
		      </label>
		      <input type="checkbox" name="fizmat-checkbox" value="Вт" id="day-vt" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Вт"/>
					<label for="day-vt">
						Вт
		      </label>
		      <input type="checkbox" name="fizmat-checkbox" value="Ср" id="day-sr" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Ср"/>
					<label for="day-sr">
						Ср
		      </label>
		      <input type="checkbox" name="fizmat-checkbox" value="Чт" id="day-che" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Чт"/>
					<label for="day-che">
						Чт
		      </label>
		      <input type="checkbox" name="fizmat-checkbox" value="Пт" id="day-pt" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Пт"/>
					<label for="day-pt">
						Пт
		      </label>
		      <input type="checkbox" name="fizmat-checkbox" value="Сб" id="day-sb" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Сб"/>
					<label for="day-sb">
						Сб
		      </label>
		      <input type="checkbox" name="fizmat-checkbox" value="Вс" id="day-vs" class="filter-lessons-day fizmat-checkbox fizmat-lessons-checkbox" data-array="lessonsDayArray" data-title="Вс"/>
					<label for="day-vs">
						Вс
		      </label>
		    </div>
			</div>
		</div>
	</div>
	<div class="fizmat__button fizmat__clean lessons-clean">
		Очистить все
	</div>
</div>