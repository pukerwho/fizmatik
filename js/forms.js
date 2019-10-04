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
  });

  //Events filter
  var eventsArray = ['Мероприятие', 'Фотоотчет'];
  $(document).on('change', '.ads-filter, .gallery-filter', function(){
    var events_this = $(this).val();
    if (eventsArray.length > 0) {
      var index = eventsArray.indexOf(events_this);
      if (index > -1) {
        eventsArray.splice(index, 1);
      } else {
        eventsArray.push(events_this);
      }
    } else {
      eventsArray.push(events_this);
    }
    console.log(eventsArray);
    var button = $(this),
      data = {
        'action': 'events_page_filter',
        'eventsArray': eventsArray,
      };

    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю');
      },
      success : function( data ){
        if( data ) { 
          $('#events_response').addClass('events_filter_response');
          $('#events_response').html(data);
          let animateClass = document.querySelectorAll('#events_response .fizmatik-animate');
          for (let aClass of animateClass) {
            aClass.classList.remove('fizmatik-animate');
            aClass.style.opacity = 1;
          };
        } else {
          $('#events_response').html('Совпадений не найдено');
        }
      }
    });
  });

  // Teachers clean
  $(document).on('click', '.teachers-clean', function(){
    var teachers_city = $('.teachers-city').val();
    var button = $(this),
    data = {
      'action': 'teachers_clean_action',
      'teachers_city': teachers_city
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
          $('#teachers_subject_response').html(data);
        } else {
          console.log('no');
          $('#teachers_subject_response').html('Совпадений не найдено');
        }
      }
    });
  });

  //Teachers
  var teachersSubjectArray = [];
  var teachersClassArray = [];
  // $(document).on('click', '.selected-teachers .select-items div', function(){
  $(document).on('change', '.fizmat-teachers-checkbox', function(){
    //Ловим клик
    var teachers_city = $('.teachers-city').val();
    var teachers_this = $(this).val();
    //Проверяем в какой массив добавлять
    let checkArray = this.getAttribute('data-array');
    if (checkArray === 'teachersSubjectArray') {
      if (teachersSubjectArray.length > 0) {
        var index = teachersSubjectArray.indexOf(teachers_this);
        if (index > -1) {
          teachersSubjectArray.splice(index, 1);
        } else {
          teachersSubjectArray.push(teachers_this);
        }
      } else {
        teachersSubjectArray.push(teachers_this);
      }  
    }
    if (checkArray === 'teachersClassArray') {
      if (teachersClassArray.length > 0) {
        var index = teachersClassArray.indexOf(teachers_this);
        if (index > -1) {
          teachersClassArray.splice(index, 1);
        } else {
          teachersClassArray.push(teachers_this);
        }
      } else {
        teachersClassArray.push(teachers_this);
      }  
    }
    var button = $(this),
    data = {
      'action': 'teachers_subject',
      'teachersSubjectArray': teachersSubjectArray,
      'teachersClassArray': teachersClassArray,
      'teachers_city': teachers_city
    };
    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю');
      },
      success : function( data ){
        if( data ) { 
          $('#teachers_subject_response').html(data);
          console.log('yes');
        } else {
          $('#teachers_subject_response').html('Совпадений не найдено');
          console.log('no');
        }
      }
    });
  });

  // Homeworks clean
  $(document).on('click', '.homeworks-clean', function(){
    var button = $(this),
    data = {
      'action': 'homeworks_clean_action',
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

  // Homeworks filter
  // $(document).on('click', '.selected-homeworks .select-items div', function(){
  var homeworksSubjectsArray = [];
  var homeworksTeachersArrayBase = [];
  var homeworksTeachersArray = [];
  var homeworksClassArray = [];
  $(document).on('change', '.fizmat-homeworks-checkbox', function(){
    //Ловим клик
    var homeworks_this = $(this).val();
    //Проверяем в какой массив добавлять
    let checkArray = this.getAttribute('data-array');
    if (checkArray === 'homeworksSubjectsArray') {
      if (homeworksSubjectsArray.length > 0) {
        var index = homeworksSubjectsArray.indexOf(homeworks_this);
        if (index > -1) {
          homeworksSubjectsArray.splice(index, 1);
        } else {
          homeworksSubjectsArray.push(homeworks_this);
        }
      } else {
        homeworksSubjectsArray.push(homeworks_this);
      }  
    }
    if (checkArray === 'homeworksTeachersArray') {
      if (homeworksTeachersArrayBase.length > 0) {
        var index = homeworksTeachersArrayBase.indexOf(homeworks_this);
        if (index > -1) {
          homeworksTeachersArrayBase.splice(index, 1);
        } else {
          homeworksTeachersArrayBase.push(homeworks_this);
        }
      } else {
        homeworksTeachersArrayBase.push(homeworks_this);
      }  
    }
    for (iHomeworksTeachersArray of homeworksTeachersArrayBase) {
      iHomeworksTeachersArray = 'post:teachers:'+iHomeworksTeachersArray;
      homeworksTeachersArray.push(iHomeworksTeachersArray); 
      //Нужно удалить повторяющиеся
    }
    if (checkArray === 'homeworksClassArray') {
      if (homeworksClassArray.length > 0) {
        var index = homeworksClassArray.indexOf(homeworks_this);
        if (index > -1) {
          homeworksClassArray.splice(index, 1);
        } else {
          homeworksClassArray.push(homeworks_this);
        }
      } else {
        homeworksClassArray.push(homeworks_this);
      }  
    }
    var button = $(this),
      data = {
        'action': 'homeworks_action',
        'homeworksSubjectsArray': homeworksSubjectsArray,
        'homeworksTeachersArray': homeworksTeachersArray,
        'homeworksClassArray': homeworksClassArray,
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

  // Lessons clean
  $(document).on('click', '.lessons-clean', function(){
    var button = $(this),
    data = {
      'action': 'lessons_clean_action',
    };
    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю');
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

  //Lessons filter
  $(document).on('change', '.fizmat-lessons-checkbox', function(){
    //Меняем для направления заголовок (если страница Направления)
    var lessonsSubjectsItemTitleBig = document.querySelector('.tax-subject .fizmat__item-title-big');
    lessonsSubjectsItemTitleBig.innerHTML = 'Выберите направления';

    var lessonsSubjectsArray = [];
    var lessonsCityArray = [];
    var lessonsClassArray = [];
    var lessonsTeacherArray = [];
    var lessonsDayArray = [];
    //Ловим клик
    var lessons_this = $(this).val();
    //Проверяем какой массив
    let checkArray = this.getAttribute('data-array');
    let itemTitle = document.querySelector('.fizmat__item-title[data-array=' + checkArray +']');
    //Собераем все чекнутые инпуты
    var checkedBoxes = document.querySelectorAll('.fizmat__item-list input[name=fizmat-checkbox]:checked');    
    for (checkedBox of checkedBoxes) {
      //Определяем в какой массив записать чекнутые значения
      switch(checkedBox.dataset.array) {
        case 'lessonsSubjectsArray':
        lessonsSubjectsArray.push(checkedBox.value);
        // itemTitle.innerHTML = checkedBox.getAttribute('data-title');
        break;
        case 'lessonsClassArray':
        lessonsClassArray.push(checkedBox.value);
        // itemTitle.innerHTML = checkedBox.getAttribute('data-title');
        break;
        case 'lessonsTeacherArray':
        teacherI = 'post:teachers:'+checkedBox.value;
        lessonsTeacherArray.push(teacherI);
        // itemTitle.innerHTML = checkedBox.getAttribute('data-title');
        break;
        case 'lessonsDayArray':
        lessonsDayArray.push(checkedBox.value);
        // itemTitle.innerHTML = checkedBox.getAttribute('data-title');
        break;
        case 'lessonsCityArray':
        lessonsCityArray.push(checkedBox.value);
        // itemTitle.innerHTML = checkedBox.getAttribute('data-title');
        break;
      }
    }
    var button = $(this),
    data = {
      'action': 'schedule_action',
      'lessonsSubjectsArray': lessonsSubjectsArray,
      'lessonsCityArray': lessonsCityArray,
      'lessonsClassArray': lessonsClassArray,
      'lessonsTeacherArray': lessonsTeacherArray,
      'lessonsDayArray': lessonsDayArray
    };

    $.ajax({
      url: filter_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('Загружаю');
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