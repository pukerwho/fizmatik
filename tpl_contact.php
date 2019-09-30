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
						<div class="contact__block-map fizmatik-animate">
							<?php echo carbon_get_the_post_meta('crb_contact_kiev_map') ?>
						</div>
						<div class="contact__block-title fizmatik-animate">
							Киев
						</div>
						<div class="contact__block-address fizmatik-animate">
							<?php 
								$contact_kiev = carbon_get_the_post_meta('crb_contact_kiev_contact');
								foreach ($contact_kiev as $c_kiev):
							?>
								<div class="contact__block-address__item">
									<div class="mb-1">
										<?php echo $c_kiev['crb_contact_kiev_address'] ?>	
									</div>
									<?php 
										$kiev_phones = $c_kiev['crb_contact_kiev_phones'];
										foreach ($kiev_phones as $kiev_phone):
									?>
										<div>
											<a href="tel:<?php echo $kiev_phone['crb_contact_kiev_phone'] ?>">
												<?php echo $kiev_phone['crb_contact_kiev_phone'] ?>
											</a>
										</div>
									<?php endforeach; ?>
									<div class="line"></div>
								</div>
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
							<?php 
								$contact_kh = carbon_get_the_post_meta('crb_contact_kvarkov_contact');
								foreach ($contact_kh as $c_kh):
							?>
								<div class="contact__block-address__item">
									<div class="mb-1">
										<?php echo $c_kh['crb_contact_kvarkov_address'] ?>	
									</div>
									<?php 
										$kh_phones = $c_kh['crb_contact_kvarkov_phones'];
										foreach ($kh_phones as $kh_phone):
									?>
										<div>
											<a href="tel:<?php echo $kh_phone['crb_contact_kvarkov_phone'] ?>">
												<?php echo $kh_phone['crb_contact_kvarkov_phone'] ?>
											</a>
										</div>
									<?php endforeach; ?>
									<div class="line"></div>
								</div>
							<?php endforeach; ?>
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