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
        Field::make( 'textarea', 'crb_contact_kvarkov_map', 'Карта для Харьков (iframe)' ),
        Field::make( 'textarea', 'crb_contact_kvarkov_address', 'Адрес (Харьков)' ),
    ) );
}

?>