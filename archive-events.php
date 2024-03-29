<?php get_header(); ?>

<div class="events__page">
	<?php get_template_part('blocks/balls/balls-events') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="events__page-title fizmatik-animate">Новости</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="events__page-filter">
					<div>
						<input type="checkbox" name="fizmat-checkbox" value="Мероприятие" id="ads" class="ads-filter" checked>	
						<label for="ads">Объявления</label>
					</div>
					<div>
						<input type="checkbox" name="fizmat-checkbox" value="Фотоотчет" id="gallery" class="gallery-filter" checked>	
						<label for="gallery">Галерея</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div id="events_response" class="events__page-grid">
					<?php 
						$custom_query_events = new WP_Query( array( 
							'post_type' => 'events',
							'posts_per_page' => 6,
							'orderby' => 'menu_order',
							'order' => 'ASC'
						) );
						if ($custom_query_events->have_posts()) : while ($custom_query_events->have_posts()) : $custom_query_events->the_post(); ?>
						<?php get_template_part('blocks/events/events-page') ?>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="events__page-more">
					<div>Еще мероприятия</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>