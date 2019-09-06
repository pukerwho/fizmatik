<div class="col-md-4">
	<div class="schedule__bottom-box">
		<?php 
			$teachers = carbon_get_the_post_meta('crb_lessons_teacher');
			foreach( $teachers as $teacher ): 
		?>
			<div class="schedule__bottom-teacher">
				<div class="schedule__bottom-teacher__img">
					<img src="<?php echo get_the_post_thumbnail_url($teacher['id']); ?>" alt="">
				</div>
				<div class="schedule__bottom-teacher__info">
					<div class="schedule__bottom-teacher__title">
						<?php echo get_the_title($teacher['id']) ?>
					</div>
					<div class="schedule__bottom-teacher__subtitle">
						<?php echo carbon_get_post_meta($teacher['id'], 'crb_teachers_subtitle') ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>	
		<div class="schedule__bottom-content">
			<div class="schedule__bottom-content__info">
				<div class="schedule__bottom-content__notice">
					<span class="text-uppercase">
						<?php echo carbon_get_the_post_meta('crb_lessons_day') ?>	
					</span>
					<span class="text-lowercase">Аудитория </span><?php echo carbon_get_the_post_meta('crb_lessons_auditory') ?>
				</div>
				<div class="schedule__bottom-content__time">
					<?php echo carbon_get_the_post_meta('crb_lessons_time') ?>	
				</div>
			</div>
			<a href="<?php echo get_permalink(); ?>">
				<div class="schedule__bottom-content__btn">
					Записаться
				</div>
			</a>
		</div>
	</div>
</div>