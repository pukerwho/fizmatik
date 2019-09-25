<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_contact.php' )
    ->add_fields( array(
        Field::make( 'textarea', 'crb_contact_kiev_map', 'Карта для Киева (iframe)' ),
        Field::make( 'textarea', 'crb_contact_kiev_address', 'Адрес (Киев)' ),
        Field::make( 'complex', 'crb_contact_kiev_phones', 'Телефоны (Киев)' )->add_fields( array(
          	Field::make( 'text', 'crb_contact_kiev_phone', 'Телефон (Киев)' ),
      	)),
        Field::make( 'textarea', 'crb_contact_kvarkov_map', 'Карта для Харьков (iframe)' ),
        Field::make( 'textarea', 'crb_contact_kvarkov_address', 'Адрес (Харьков)' ),
        Field::make( 'complex', 'crb_contact_kvarkov_phones', 'Телефоны (Харьков)' )->add_fields( array(
          	Field::make( 'text', 'crb_contact_kvarkov_phone', 'Телефон (Харьков)' ),
      	)),
        Field::make( 'text', 'crb_contact_email', 'Основной email' ),
        Field::make( 'text', 'crb_contact_facebook_link', 'Ссылка на facebook' ),
    ) 
  );
}

?>