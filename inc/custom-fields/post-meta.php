<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'teachers' )
    ->add_fields( array(
      Field::make( 'text', 'crb_teachers_subtitle', 'Короткое описание' ),
      Field::make( 'complex', 'crb_teachers_emails', 'Почтовые ящики' )->add_fields( array(
          Field::make( 'text', 'crb_teachers_email', 'Email' ),
      )),
      Field::make( 'complex', 'crb_teachers_phones', 'Телефоны' )->add_fields( array(
          Field::make( 'text', 'crb_teachers_phone', 'Номер' ),
      )),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'lessons' )
    ->add_fields( array(
    Field::make( 'association', 'crb_lessons_teacher', 'Учитель' )
    ->set_types( array(
        array(
          'type'      => 'post',
          'post_type' => 'teachers',
        )
    ) ),
    Field::make( 'select', 'crb_lessons_day', 'День недели' )
      ->set_options( array(
        'Пн' => 'Пн',
        'Вт' => 'Вт',
        'Ср' => 'Ср',
        'Чт' => 'Чт',
        'Пт' => 'Пт',
        'Сб' => 'Сб',
        'Вск' => 'Вск',
      ) ),
    Field::make( 'text', 'crb_lessons_auditory', 'Аудитория' ),
    Field::make( 'text', 'crb_lessons_time', 'Время' ),
    Field::make( 'select', 'crb_lessons_city', 'Город' )
      ->set_options( array(
        'kyiv' => 'Киев',
        'kh' => 'Харьков',
      ) ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'events' )
    ->add_fields( array(
      Field::make( 'select', 'crb_events_subtitle', 'Что это?' )
      ->set_options( array(
        'Мероприятие' => 'Мероприятие',
        'Фотоотчет' => 'Фотоотчет',
      ) ),
      Field::make( 'media_gallery', 'crb_events_photos', 'Галерея' )->set_type( array( 'image' ) )
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'homeworks' )
    ->add_fields( array(
      Field::make( 'association', 'crb_homeworks_teacher', 'Учитель' )
      ->set_types( array(
          array(
            'type'      => 'post',
            'post_type' => 'teachers',
          )
      ) ),
      Field::make( 'text', 'crb_homeworks_number', 'Задание №' ),
      Field::make( 'file', 'crb_homeworks_file', 'Файл' )->set_value_type( 'url' )
  ) );
}

?>