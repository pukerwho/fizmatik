<?php
/*
Template Name: ГЛАВНАЯ страница
*/
?>

<?php get_header(); ?>

<?php get_template_part('blocks/home/hero') ?>
<?php get_template_part('blocks/home/subjects') ?>
<div class="balls">
	<div id="balls__home-yellowone" class="balls__home-yellowone">
		<img src="<?php bloginfo('template_url') ?>/img/yellow.png" alt="" data-depth="2">
	</div>
	<div id="balls__home-greenone" class="p-absolute">
		<div class="balls__home-greenone" data-depth-x="1" data-depth-y="5"></div>	
	</div>
</div>
<div class="balls">
	<div id="balls__home-blue" class="p-absolute">
		<div class="balls__home-blue" data-depth="1"></div>	
	</div>
</div>
<div class="balls">
	<div id="balls__home-red" class="p-absolute">
		<div class="balls__home-red" data-depth="2"></div>	
	</div>
</div>
<!-- EVENTS -->
<div class="events__page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pc-show">
					<div class="events__page-title fizmatik-animate">И мы умеем не только учиться, <br> но и веселиться</div>	
				</div>
				<div class="mobile-show">
					<div class="events__page-title fizmatik-animate">И мы умеем не только учиться, но и веселиться</div>	
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="events__page-grid">
					<?php 
						$custom_query_events = new WP_Query( array( 
							'post_type' => 'events',
							'posts_per_page' => 6
						) );
						if ($custom_query_events->have_posts()) : while ($custom_query_events->have_posts()) : $custom_query_events->the_post(); ?>
						<?php get_template_part('blocks/events/events-page') ?>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="<?php echo get_post_type_archive_link( 'events' ); ?>">
					<div class="events__more">
						<div>
							Еще мероприятия	
						</div>
					</div>
				</a>
				<div class="balls">
					<div id="balls__home-greentwo" class="p-absolute">
						<div class="balls__home-greentwo" data-depth="1"></div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- CONTACT -->
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="balls">
					<div id="balls__home-yellowtwo" class="balls__home-yellowtwo">
						<img src="<?php bloginfo('template_url') ?>/img/yellow.png" alt="" data-depth="2">
					</div>
				</div>
				<div class="contact__title">Контакты</div>
			</div>
		</div>
		<?php 
    $args_contact_page = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'tpl_contact.php'
    ];
    $contact_pages = get_posts( $args_contact_page );
    foreach ( $contact_pages as $contact_page ): ?>
		<div class="row">
			<div class="col-md-6">
				<div class="contact__block">
					<div class="balls">
						<div class="balls__contact-green">
							<img src="<?php bloginfo('template_url') ?>/img/contact-green.svg" alt="">
						</div>
					</div>
					<div class="contact__block-map fizmatik-animate">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kiev_map') ?>
					</div>
					<div class="contact__block-title fizmatik-animate">
						Киев
					</div>
					<div class="contact__block-address fizmatik-animate">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kiev_address') ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact__block">
					<div class="balls">
						<div class="balls__contact-red">
							<img src="<?php bloginfo('template_url') ?>/img/contact-red.svg" alt="">
						</div>
					</div>
					<div class="contact__block-map fizmatik-animate">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kvarkov_map') ?>
					</div>
					<div class="contact__block-title fizmatik-animate">
						Харьков
					</div>
					<div class="contact__block-address fizmatik-animate">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kvarkov_address') ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php get_footer(); ?>