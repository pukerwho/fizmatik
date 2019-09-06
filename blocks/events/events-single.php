<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="events__single-photos">
				<ul id="lightSlider">
					<?php 
						$events_photos = carbon_get_the_post_meta('crb_events_photos');
						foreach ( $events_photos as $events_photo ): ?>
						<?php $photo_src = wp_get_attachment_image_src($events_photo, 'large'); ?>
						<li data-thumb="<?php echo $photo_src[0]; ?>">
					    <img src="<?php echo $photo_src[0]; ?>" />
					  </li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<div class="events__single-content">
				<?php the_content(); ?>	
			</div>
		</div>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>