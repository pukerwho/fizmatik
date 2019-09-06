<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', 'Options' )
    ->where( 'term_taxonomy', '=', 'subject' )
    ->add_fields( array(
    	Field::make( 'image', 'crb_subject_img', 'Заглавная картинка' )->set_value_type( 'url'),
  ) );
}

?>