    </section>
    <footer class="footer">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
	          <div class="footer__content">
	            <div class="footer__left">
	            	<a href="<?php echo home_url(); ?>?city=<?php echo $_SESSION['cityvar'] ?>">
		              <div class="footer__logo">
		                <img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt="">
		              </div>
		            </a>
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
		              <div class="footer__social">
		                <li>
		                	<a href="<?php echo carbon_get_post_meta($contact_page, 'crb_contact_facebook_link') ?>" target="_blank">
		                		facebook
		                	</a>
		                </li>
		              </div>
		            <?php endforeach; ?>
	            </div>
	            <div class="footer__right">
	              <div class="footer__menu">
	                <?php wp_nav_menu([
	                  'theme_location' => 'footer_menu',
	                  'container' => 'nav',
	                  'menu_id' => 'footer_menu',
	                ]); ?>
	                <div class="footer__menu-email">
	                	<li class="mr-0">Возникли вопросы?</li>
	                	<?php foreach ( $contact_pages as $contact_page ): ?>
		                	<a href="mailto:<?php echo carbon_get_post_meta($contact_page, 'crb_contact_email') ?>">
		                		<?php echo carbon_get_post_meta($contact_page, 'crb_contact_email') ?>
		                	</a>
	                	<?php endforeach; ?>
	                </div>
	                
	              </div>
	            </div>
	          </div>
	        </div>
    		</div>
    	</div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>