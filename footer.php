    </section>
    <footer class="footer">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
	          <div class="footer__content">
	            <div class="footer__left">
	              <div class="footer__logo">
	                <img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt="">
	              </div>
	              <div class="footer__city">
	                Киев
	              </div>
	            </div>
	            <div class="footer__right">
	              <div class="footer__menu">
	                <?php wp_nav_menu([
	                  'theme_location' => 'head_menu',
	                  'container' => 'nav',
	                  'menu_id' => 'head_menu',
	                ]); ?>
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