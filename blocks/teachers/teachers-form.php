<div class="fizmat__form selected-teachers">
	<div class="fizmat__item">
		<span>Направление</span>
		<div class="select-wrapper">
	    <select class="select select-teachers-subject">
	    	<?php $subject_cats = get_terms( array( 'taxonomy' => 'subject', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $subject_cats as $subject_cat ): ?>
	    		<option value="<?php echo $subject_cat->term_id ?>"><?php echo $subject_cat->name ?></option>
	    	<?php endforeach; ?>
	    </select>
	  </div>	
	</div>
	<div class="fizmat__item">
		<span>Класс</span>
		<div class="select-wrapper">
	    <select class="select select-teachers-class">
	    	<?php $class_cats = get_terms( array( 'taxonomy' => 'class', 'parent' => 0, 'hide_empty' => false ) );
	    	foreach ( $class_cats as $class_cat ): ?>
	    		<option value="<?php echo $class_cat->term_id ?>"><?php echo $class_cat->name ?></option>
	    	<?php endforeach; ?>
	    </select>
	  </div>
	</div>
</div>