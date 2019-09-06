
<!-- <div class="row">
	<div class="col-md-12">
		<h2>Преподаватели</h2>
	</div>
</div> -->

<!-- TEACHERS BLOCK -->
<div class="col-md-6">
	<div class="teachers__block">
		<div class="teachers__block-img">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
		</div>
		<div class="teachers__block-title">
			<?php the_title(); ?>
		</div>
		<div class="teachers__block-subtitle">
			<?php echo carbon_get_the_post_meta('crb_teachers_subtitle') ?>
		</div>
		<div class="teachers__block-phones">
			<?php
      $teachers_phones = carbon_get_the_post_meta('crb_teachers_phones' );
      foreach ( $teachers_phones  as $teachers_phone ): ?>
        <a href="tel:<?php echo $teachers_phone['crb_teachers_phone'] ?>"><?php echo $teachers_phone['crb_teachers_phone'] ?></a>
      <?php endforeach; ?>
		</div>
		<div class="teachers__block-emails">
			<?php
      $teachers_emails = carbon_get_the_post_meta('crb_teachers_emails' );
      foreach ( $teachers_emails  as $teachers_email ): ?>
        <a href="mailto:<?php echo $teachers_email['crb_teachers_email'] ?>"><?php echo $teachers_email['crb_teachers_email'] ?></a>
      <?php endforeach; ?>
		</div>
	</div>
</div>