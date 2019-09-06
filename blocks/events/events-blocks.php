<div class="events__blocks">
	<div class="container">
		<div class="row">
			<?php 
				$custom_query_events = new WP_Query( array( 
					'post_type' => 'events',
					'posts_per_page' => 6
				) );
				if ($custom_query_events->have_posts()) : while ($custom_query_events->have_posts()) : $custom_query_events->the_post(); ?>
					<div class="col-md-4 mb-5">
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
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>