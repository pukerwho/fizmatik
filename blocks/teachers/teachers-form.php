<div class="fizmat__form selected-teachers">
	<div class="fizmat__items">
		<div class="fizmat__item">
			<span>Направление</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="teachers-subject">
		    	Выберете направление
		    </div>
		    <div class="fizmat__item-list" data-listId="teachers-subject">
		    	<?php $subject_cats = get_terms( array( 'taxonomy' => 'subject', 'parent' => 0, 'hide_empty' => false ) );
		    	foreach ( $subject_cats as $subject_cat ): ?>
		    		<input type="checkbox" name="" value="<?php echo $subject_cat->term_id ?>" id="subject-<?php echo $subject_cat->term_id ?>" class="filter-teachers-subject fizmat-checkbox fizmat-teachers-checkbox" data-array="teachersSubjectArray"/>
						<label for="subject-<?php echo $subject_cat->term_id ?>">
							<?php echo $subject_cat->name ?>
			      </label>
		    	<?php endforeach; ?>
		    </div>
		  </div>	
		</div>
		<div class="fizmat__item">
			<span>Класс</span>
			<div class="select-wrapper">
				<div class="fizmat__item-title" data-itemId="teachers-class">
		    	Выберете класс
		    </div>
		    <div class="fizmat__item-list" data-listId="teachers-class">
		    	<?php $class_cats = get_terms( array( 'taxonomy' => 'class', 'parent' => 0, 'hide_empty' => false ) );
		    	foreach ( $class_cats as $class_cat ): ?>
		    		<input type="checkbox" name="" value="<?php echo $class_cat->term_id ?>" id="teacher-class-<?php echo $class_cat->term_id ?>" class="filter-teachers-class fizmat-checkbox fizmat-teachers-checkbox" data-array="teachersClassArray"/>
							<label for="teacher-class-<?php echo $class_cat->term_id ?>">
								<?php echo $class_cat->name ?>
				      </label>
		    	<?php endforeach; ?>
		    </div>
		  </div>
		</div>
	</div>
	<input type="hidden" class="teachers-city" value="<?php echo $_SESSION['cityvar'] ?>">
	<div class="fizmat__button fizmat__clean teachers-clean">
		Очистить все
	</div>
</div>