<?php 
	add_action( 'wp_enqueue_scripts', 'teachers_subject_scripts' );
	function teachers_subject_scripts() {
		wp_register_script( 'forms', get_template_directory_uri() . '/js/forms.js', '','',true);
		wp_localize_script( 'forms', 'filter_params', array(
		  'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		  'class_val' => $custom_query_teachers->class_val,
		  'subject_val' => $custom_query_teachers->subject_val,
		  'homework_subject_val' => $custom_query_homeworks->homework_subject_val,
		  'homework_teachers_val' => $custom_query_homeworks->homework_teachers_val,
		  'homework_class_val' => $custom_query_homeworks->homework_class_val,

		  'schedule_class_val' => $custom_query_schedule->schedule_class_val,
		  'schedule_subject_val' => $custom_query_schedule->schedule_subject_val,
		  'schedule_teachers_val' => $custom_query_schedule->schedule_teachers_val,
		  'schedule_day_val' => $custom_query_schedule->schedule_day_val,
		  'schedule_city_val' => $custom_query_schedule->schedule_city_val,
		  'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		) );
		wp_enqueue_script( 'forms' );
	}

	//events filter
	function events_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$page = $_POST['page'] + 1;
	  $filterargs = array(
	  	'post_type' => 'events', 
	  	'paged' => $page, 
	  	'posts_per_page' => 6,
	  );

    query_posts( $args );
	  $custom_query_events = new WP_Query( $filterargs );
	  if ($custom_query_events->have_posts()) : while ($custom_query_events->have_posts()) : $custom_query_events->the_post();
	    get_template_part( 'blocks/events/events-page' );
	  endwhile; 
	  endif;
	  die;
	}

	add_action('wp_ajax_events_more', 'events_filter_function');
	add_action('wp_ajax_nopriv_events_more', 'events_filter_function');

	//teachers-subject filter
	function teachers_subject_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$class_val = $_POST['class_val'];
	  $subject_val = $_POST['subject_val'];
	  $filterargs = array(
	  	'post_type' => 'teachers', 
	  	'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'subject',
		      'terms' => $subject_val,
		      'field' => 'term_id',
		      'include_children' => true,
		      'operator' => 'IN'
				),
				array(
					'taxonomy' => 'class',
		      'terms' => $class_val,
		      'field' => 'term_id',
		      'include_children' => true,
		      'operator' => 'IN'
				)
	    )
	  );

    query_posts( $args );
	  $custom_query_teachers = new WP_Query( $filterargs );
	  if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post();
	    get_template_part( 'blocks/teachers/teachers' );
	  endwhile; 
	  endif;
	  die;
	}

	add_action('wp_ajax_teachers_subject', 'teachers_subject_filter_function');
	add_action('wp_ajax_nopriv_teachers_subject', 'teachers_subject_filter_function');

	//homeworks filter
	function homeworks_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$homework_subject_val = $_POST['homework_subject_val'];
	  $homework_teachers_val = $_POST['homework_teachers_val'];
	  $homework_class_val = $_POST['homework_class_val'];
	  $teachers = carbon_get_post_meta($homework_teachers_val, 'crb_homeworks_teacher');
	  foreach ($teachers as $teacher) {

	  	// $teacher_id = get_the_id($teacher['id']);
	  	foreach ($teacher as $value) {
	  		echo $value;
	  	}
	  }
	  $filterargs = array(
	  	'post_type' => 'homeworks', 
	  	'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'subject',
		      'terms' => $homework_subject_val,
		      'field' => 'term_id',
		      'include_children' => true,
		      'operator' => 'IN'
				),
				array(
					'taxonomy' => 'class',
		      'terms' => $homework_class_val,
		      'field' => 'term_id',
		      'include_children' => true,
		      'operator' => 'IN'
				)
	    ),
	  );
	  if ($_POST['homework_teachers_val'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_homeworks_teacher',
	      'value'   => 'post:teachers:'. $homework_teachers_val,
	      'compare' => 'IN',
	    );
	  }

    query_posts( $args );
	  $custom_query_homeworks = new WP_Query( $filterargs );
	  if ($custom_query_homeworks->have_posts()) : while ($custom_query_homeworks->have_posts()) : $custom_query_homeworks->the_post();
	  	echo '<div class="col-md-12">';
	    get_template_part( 'blocks/homeworks/homeworks-item' );
	    echo '</div>';
	  endwhile; 
	  endif;
	  die;
	}

	add_action('wp_ajax_homeworks_action', 'homeworks_filter_function');
	add_action('wp_ajax_nopriv_homeworks_action', 'homeworks_filter_function');

	//schedule filter
	function schedule_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$schedule_class_val = $_POST['schedule_class_val'];
	  $schedule_subject_val = $_POST['schedule_subject_val'];
	  $schedule_teachers_val = $_POST['schedule_teachers_val'];
	  $schedule_day_val = $_POST['schedule_day_val'];
	  $schedule_city_val = $_POST['schedule_city_val'];
	  $filterargs = array(
	  	'post_type' => 'lessons', 
	  	'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'subject',
		      'terms' => $schedule_subject_val,
		      'field' => 'term_id',
		      'include_children' => true,
		      'operator' => 'IN'
				),
				array(
					'taxonomy' => 'class',
		      'terms' => $schedule_class_val,
		      'field' => 'term_id',
		      'include_children' => true,
		      'operator' => 'IN'
				)
	    )
	  );

	  if ($_POST['schedule_day_val'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_lessons_day',
	      'value'   => $schedule_day_val,
	      'compare' => '=', 
	    );
    }

    if ($_POST['schedule_city_val'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_lessons_city',
	      'value'   => $schedule_city_val,
	      'compare' => '=', 
	    );
    }

    if ($_POST['schedule_teachers_val'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_lessons_teacher',
	      'value'   => 'post:teachers:'. $schedule_teachers_val,
	      'compare' => 'IN',
	    );
	  }

    query_posts( $args );
	  $custom_query_schedule = new WP_Query( $filterargs );
	  if ($custom_query_schedule->have_posts()) : while ($custom_query_schedule->have_posts()) : $custom_query_schedule->the_post();
	    get_template_part( 'blocks/schedule/schedule-bottom' );
	  endwhile; 
	  endif;
	  die;
	}

	add_action('wp_ajax_schedule_action', 'schedule_filter_function');
	add_action('wp_ajax_nopriv_schedule_action', 'schedule_filter_function');
?>