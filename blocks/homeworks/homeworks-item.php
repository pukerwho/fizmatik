<div class="homeworks__item">
	<div class="homeworks__info">
		<?php 
			$teachers = carbon_get_the_post_meta('crb_homeworks_teacher');
			foreach( $teachers as $teacher ): 
		?>
			<div class="homeworks__item-title">
				<?php echo $teacher['id'] ?>
				<?php echo get_the_title($teacher['id']) ?>
			</div>
		<?php endforeach; ?>	
		<div class="homeworks__item-number">
			Задание <?php echo carbon_get_the_post_meta('crb_homeworks_number') ?>	
		</div>
	</div>
	<div class="homeworks__files">
		<div class="homeworks__item-look">
			<a href="<?php echo carbon_get_the_post_meta('crb_homeworks_file') ?>" target="_blank">
				<img src="<?php bloginfo('template_url') ?>/img/look.svg" alt="">
			</a>
		</div>
		<div class="homeworks__item-download">
			<a href="<?php echo carbon_get_the_post_meta('crb_homeworks_file') ?>" download>
				<img src="<?php bloginfo('template_url') ?>/img/download.svg" alt="">
			</a>
		</div>
	</div>
</div>