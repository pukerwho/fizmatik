<?php
/*
Template Name: ГЛАВНАЯ страница
*/
?>

<?php get_header(); ?>

<?php get_template_part('blocks/home/hero') ?>
<?php get_template_part('blocks/home/subjects') ?>
<!-- EVENTS -->
<div class="events__page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="events__page-title">И мы умеем не только учиться, <br> но и веселиться</h1>
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
			</div>
		</div>
	</div>
</div>
<!-- CONTACT -->
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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
					<div class="contact__block-map">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kiev_map') ?>
					</div>
					<div class="contact__block-title">
						Киев
					</div>
					<div class="contact__block-address">
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
					<div class="contact__block-map">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kvarkov_map') ?>
					</div>
					<div class="contact__block-title">
						Харьков
					</div>
					<div class="contact__block-address">
						<?php echo carbon_get_post_meta($contact_page, 'crb_contact_kvarkov_address') ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php get_footer(); ?>