<?php 
	add_action( 'wp_enqueue_scripts', 'teachers_subject_scripts' );
	function teachers_subject_scripts() {
		wp_register_script( 'forms', get_template_directory_uri() . '/js/forms.js', '','',true);
		wp_localize_script( 'forms', 'filter_params', array(
		  'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		  
		  'teachersSubjectArray' => $custom_query_teachers->teachersSubjectArray,
		  'teachersClassArray' => $custom_query_teachers->teachersClassArray,
		  'teachers_city' => $custom_query_teachers->teachers_city,

		  'homeworksSubjectsArray' => $custom_query_homeworks->homeworksSubjectsArray,
		  'homeworksTeachersArray' => $custom_query_homeworks->homeworksTeachersArray,
		  'homeworksClassArray' => $custom_query_homeworks->homeworksClassArray,

		  'eventsArray' => $custom_query_events->eventsArray,

		  'lessonsSubjectsArray' => $custom_query_schedule->lessonsSubjectsArray,
		  'lessonsCityArray' => $custom_query_schedule->lessonsCityArray,
		  'lessonsClassArray' => $custom_query_schedule->lessonsClassArray,
		  'lessonsTeacherArray' => $custom_query_schedule->lessonsTeacherArray,
		  'lessonsDayArray' => $custom_query_schedule->lessonsDayArray,
		  
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

	//teachers clean 
	function teachers_clean(){
		$teachers_city = $_POST['teachers_city'];
		$filterargs = array(
	  	'post_type' => 'teachers',
	  );
	  if ($_POST['teachers_city'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_teachers_city',
	      'value'   => $teachers_city,
	      'compare' => '=',
	    );
	  };
	  query_posts( $args );
	  $custom_query_teachers = new WP_Query( $filterargs );
	  if ($custom_query_teachers->have_posts()) : while ($custom_query_teachers->have_posts()) : $custom_query_teachers->the_post();
	    get_template_part( 'blocks/teachers/teachers' );
	  endwhile; 
	  endif;
	  die;
	}
	add_action('wp_ajax_teachers_clean_action', 'teachers_clean');
	add_action('wp_ajax_nopriv_teachers_clean_action', 'teachers_clean');

	//teachers filter
	function teachers_subject_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$teachersSubjectArray = $_POST['teachersSubjectArray'];
	  $teachersClassArray = $_POST['teachersClassArray'];
	  $teachers_city = $_POST['teachers_city'];
	  $filterargs = array(
	  	'post_type' => 'teachers', 
	  	'tax_query' => array(
				'relation' => 'AND',
	    ),
	    'meta_query' => array(
	    	'relation' => 'AND',
	    )
	  );
	  if ($_POST['teachersSubjectArray'] != '') { 
	    $filterargs['tax_query'][] = array(
	      'taxonomy' => 'subject',
	      'terms' => $teachersSubjectArray,
	      'field' => 'term_id',
	      'include_children' => true,
	      'operator' => 'IN'
	    );
	  };
	  if ($_POST['teachersClassArray'] != '') { 
	    $filterargs['tax_query'][] = array(
	      'taxonomy' => 'class',
	      'terms' => $teachersClassArray,
	      'field' => 'term_id',
	      'include_children' => true,
	      'operator' => 'IN'
	    );
	  };

	  if ($_POST['teachers_city'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_teachers_city',
	      'value'   => $teachers_city,
	      'compare' => '=',
	    );
	  };

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

	//homeworks clean
	function homeworks_clean(){
		$filterargs = array(
	  	'post_type' => 'homeworks', 
	  );
	  $custom_query_homeworks = new WP_Query( $filterargs );
	  if ($custom_query_homeworks->have_posts()) : while ($custom_query_homeworks->have_posts()) : $custom_query_homeworks->the_post();
	  	echo '<div class="col-md-12">';
	    get_template_part( 'blocks/homeworks/homeworks-item' );
	    echo '</div>';
	  endwhile; 
	  endif;
	  die;
	}
	add_action('wp_ajax_homeworks_clean_action', 'homeworks_clean');
	add_action('wp_ajax_nopriv_homeworks_clean_action', 'homeworks_clean');

	//homeworks filter
	function homeworks_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$homeworksSubjectsArray = $_POST['homeworksSubjectsArray'];
	  $homeworksTeachersArray = $_POST['homeworksTeachersArray'];
	  $homeworksClassArray = $_POST['homeworksClassArray'];
	  $filterargs = array(
	  	'post_type' => 'homeworks', 
	  	'tax_query' => array(
				'relation' => 'AND',
	    ),
	    'meta_query' => array(
	    	'relation' => 'AND',
	    )
	  );
	  if ($_POST['homeworksSubjectsArray'] != '') { 
	    $filterargs['tax_query'][] = array(
	      'taxonomy' => 'subject',
	      'terms' => $homeworksSubjectsArray,
	      'field' => 'term_id',
	      'include_children' => true,
	      'operator' => 'IN'
	    );
	  };
	  if ($_POST['homeworksClassArray'] != '') { 
	    $filterargs['tax_query'][] = array(
	      'taxonomy' => 'class',
	      'terms' => $homeworksClassArray,
	      'field' => 'term_id',
	      'include_children' => true,
	      'operator' => 'IN'
	    );
	  };
	  if ($_POST['homeworksTeachersArray'] != '') { 
	  	$filterargs['meta_query'][] = array(
	      'key'     => 'crb_homeworks_teacher',
	      'value'   => $homeworksTeachersArray,
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

	//lessons clean
	function lessons_clean() {
		$filterargs = array(
	  	'post_type' => 'lessons', 
	  );
	  query_posts( $args );
	  $custom_query_schedule = new WP_Query( $filterargs );
	  if ($custom_query_schedule->have_posts()) : while ($custom_query_schedule->have_posts()) : $custom_query_schedule->the_post();
	    get_template_part( 'blocks/schedule/schedule-bottom' );
	  endwhile; 
	  endif;
	  die;
	}
	add_action('wp_ajax_lessons_clean_action', 'lessons_clean');
	add_action('wp_ajax_nopriv_lessons_clean_action', 'lessons_clean');

	//lessons filter
	function schedule_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$lessonsSubjectsArray = $_POST['lessonsSubjectsArray'];
	  $lessonsCityArray = $_POST['lessonsCityArray'];
	  $lessonsClassArray = $_POST['lessonsClassArray'];
	  $lessonsTeacherArray = $_POST['lessonsTeacherArray'];
	  $lessonsDayArray = $_POST['lessonsDayArray'];
	  $filterargs = array(
	  	'post_type' => 'lessons', 
	  	'tax_query' => array(
				'relation' => 'AND',
	    )
	  );

	  if ($_POST['lessonsSubjectsArray'] != '') { 
	    $filterargs['tax_query'][] = array(
	      'taxonomy' => 'subject',
	      'terms' => $lessonsSubjectsArray,
	      'field' => 'term_id',
	      'include_children' => true,
	      'operator' => 'IN'
	    );
	  };
	  
	  if ($_POST['lessonsClassArray'] != '') { 
	    $filterargs['tax_query'][] = array(
	      'taxonomy' => 'class',
	      'terms' => $lessonsClassArray,
	      'field' => 'term_id',
	      'include_children' => true,
	      'operator' => 'IN'
	    );
	  };

	  if ($_POST['lessonsDayArray'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_lessons_day',
	      'value'   => $lessonsDayArray,
	      'compare' => 'IN', 
	    );
    }

    if ($_POST['lessonsCityArray'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_lessons_city',
	      'value'   => $lessonsCityArray,
	      'compare' => 'IN', 
	    );
    }

    if ($_POST['lessonsTeacherArray'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_lessons_teacher',
	      'value'   => 'post:teachers:'. $lessonsTeacherArray,
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

	//events filter
	function events_page_filter_function(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
	  $eventsArray = $_POST['eventsArray'];
	  $filterargs = array(
	  	'post_type' => 'events', 
	  );

	  if ($_POST['eventsArray'] != '') { 
	    $filterargs['meta_query'][] = array(
	      'key'     => 'crb_events_subtitle',
	      'value'   => $eventsArray,
	      'compare' => 'IN', 
	    );
	  }

    query_posts( $args );
	  $custom_query_events = new WP_Query( $filterargs );
	  if ($custom_query_events->have_posts()) : while ($custom_query_events->have_posts()) : $custom_query_events->the_post();
	    get_template_part('blocks/events/events-page');
	  endwhile; 
	  endif;
	  die;
	}

	add_action('wp_ajax_events_page_filter', 'events_page_filter_function');
	add_action('wp_ajax_nopriv_events_page_filter', 'events_page_filter_function');

?>