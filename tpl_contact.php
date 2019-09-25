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
			<div class="row mb-5">
				<div class="col-md-6">
					<div class="contact__block">
						<div class="balls">
							<div class="balls__contact-green">
								<img src="<?php bloginfo('template_url') ?>/img/contact-green.svg" alt="">
							</div>
						</div>
						<div class="contact__block-map fizmatik-animate">
							<?php echo carbon_get_the_post_meta('crb_contact_kiev_map') ?>
						</div>
						<div class="contact__block-title fizmatik-animate">
							Киев
						</div>
						<div class="contact__block-address fizmatik-animate">
							<div class="mb-3">
								<?php echo carbon_get_the_post_meta('crb_contact_kiev_address') ?>	
							</div>
							<?php 
								$kiev_phones = carbon_get_the_post_meta('crb_contact_kiev_phones');
								foreach( $kiev_phones as $kiev_phone ):
							?>
								<div><a href="tel:<?php echo $kiev_phone['crb_contact_kiev_phone'] ?>"><?php echo $kiev_phone['crb_contact_kiev_phone'] ?></a></div>
							<?php endforeach; ?>
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
							<?php echo carbon_get_the_post_meta('crb_contact_kvarkov_map') ?>
						</div>
						<div class="contact__block-title fizmatik-animate">
							Харьков
						</div>
						<div class="contact__block-address fizmatik-animate">
							<div class="mb-3">
								<?php echo carbon_get_the_post_meta('crb_contact_kvarkov_address') ?>	
							</div>
							<?php 
								$kharkov_phones = carbon_get_the_post_meta('crb_contact_kvarkov_phones');
								foreach( $kharkov_phones as $kharkov_phone ):
							?>
								<div><a href="tel:<?php echo $kharkov_phone['crb_contact_kvarkov_phone'] ?>"><?php echo $kharkov_phone['crb_contact_kvarkov_phone'] ?></a></div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="contact__block-title fizmatik-animate">
						Написать нам:
					</div>
					<div class="contact__block-email fizmatik-animate">
						<a href="mailto:<?php echo carbon_get_the_post_meta('crb_contact_email') ?>"><?php echo carbon_get_the_post_meta('crb_contact_email') ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>