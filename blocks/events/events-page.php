<div class="events__page-item fizmatik-animate">
	<a href="<?php the_permalink(); ?>">
		<div class="events__blocks-item">
			<div class="events__blocks-img">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
				<div class="events__blocks-img__cover"></div>
				<div class="events__blocks-img__btn">
					Участвовать
				</div>
			</div>
			<div class="events__blocks-subtitle">
				<?php echo carbon_get_the_post_meta('crb_events_subtitle') ?>
			</div>
			<div class="events__blocks-title">
				<?php the_title(); ?>
			</div>
		</div>
	</a>
</div>