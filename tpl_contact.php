<?php
/*
Template Name: КОНТАКТЫ страница
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="contact">
		<?php get_template_part('blocks/balls/balls-contact') ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="contact__title"><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="contact__block">
						<div class="balls">
							<div class="balls__contact-green">
								<img src="<?php bloginfo('template_url') ?>/img/contact-green.svg" alt="">
							</div>
						</div>
						<div class="contact__block-map">
							<?php echo carbon_get_the_post_meta('crb_contact_kiev_map') ?>
						</div>
						<div class="contact__block-title">
							Киев
						</div>
						<div class="contact__block-address">
							<?php echo carbon_get_the_post_meta('crb_contact_kiev_address') ?>
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
							<?php echo carbon_get_the_post_meta('crb_contact_kvarkov_map') ?>
						</div>
						<div class="contact__block-title">
							Харьков
						</div>
						<div class="contact__block-address">
							<?php echo carbon_get_the_post_meta('crb_contact_kvarkov_address') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>