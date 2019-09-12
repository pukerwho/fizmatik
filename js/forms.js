jQuery(function($){
  //More Events
  $(document).on('click', '.events__page-more', function(){
    var button = $(this),
      data = {
        'action': 'events_more',
        'query': filter_params.posts,
        'page' : filter_params.current_page,
      };

    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        button.text('Загружаю...');
      },
      success : function( data ){
        if( data ) { 
          button.text('Еще мероприятия');
          $('.events__page-grid .events__page-item:last-of-type').after(data);
          if (filter_params.current_page == filter_params.max_page) {
            button.remove();
          }
          filter_params.current_page++;
        } else {
          button.remove();
        }
      }
    });
  })
  //Teachers
  $(document).on('click', '.selected-teachers .select-items div', function(){
  // $(document).on('change', '.select-teachers-subject, .select-teachers-class', function(){
    var class_val = $('.select-teachers-class').val();
    var subject_val = $('.select-teachers-subject').val();
    console.log(class_val);
    console.log(subject_val);
    var button = $(this),
      data = {
        'action': 'teachers_subject',
        'class_val': class_val,
        'subject_val': subject_val
      };

    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю')
      },
      success : function( data ){
        if( data ) { 
          $('#teachers_subject_response').html(data);
        } else {
          $('#teachers_subject_response').html('Совпадений не найдено');
        }
      }
    });
  });

  // Homeworks
  $(document).on('click', '.selected-homeworks .select-items div', function(){
  // $(document).on('change', '.select-homeworks-subject, .select-homeworks-teachers, .select-homeworks-class', function(){
    var homework_subject_val = $('.select-homeworks-subject').val();
    var homework_teachers_val = $('.select-homeworks-teachers').val();
    var homework_class_val = $('.select-homeworks-class').val();
    console.log(homework_subject_val);
    console.log(homework_teachers_val);
    console.log(homework_class_val);
    var button = $(this),
      data = {
        'action': 'homeworks_action',
        'homework_subject_val': homework_subject_val,
        'homework_teachers_val': homework_teachers_val,
        'homework_class_val': homework_class_val,
      };

    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю')
      },
      success : function( data ){
        if( data ) { 
          console.log('yes');
          $('#homeworks_response').html(data);
        } else {
          console.log('no');
          $('#homeworks_response').html('Совпадений не найдено');
        }
      }
    });
  });

  //schedule
  $(document).on('click', '.selected-schedule-subject .select-items div', function(){
  // $(document).on('change', '.select-schedule-subject, .select-schedule-class, .select-schedule-day, .select-schedule-teachers, .select-schedule-city', function(){
    var schedule_class_val = $('.select-schedule-class').val();
    var schedule_subject_val = $('.select-schedule-subject').val();
    var schedule_teachers_val = $('.select-schedule-teachers').val();
    var schedule_day_val = $('.select-schedule-day').val();
    var schedule_city_val = $('.select-schedule-city').val();
    var button = $(this),
      data = {
        'action': 'schedule_action',
        'schedule_class_val': schedule_class_val,
        'schedule_subject_val': schedule_subject_val,
        'schedule_teachers_val': schedule_teachers_val,
        'schedule_day_val': schedule_day_val,
        'schedule_city_val': schedule_city_val,
      };

    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю')
      },
      success : function( data ){
        if( data ) { 
          console.log('yes');
          $('#schedule_response').html(data);
        } else {
          console.log('no');
          $('#schedule_response').html('Совпадений не найдено');
        }
      }
    });
  });
});