
 /**
  * Перезагружает страницу
  * @return {[type]}          [description]
  */
 function reloadPage() {
 location.reload();
 }

/**
 * добавляет задачу с главной страницы отличается тем, что выводит селектором список всех точек
 * @param {[type]} companyid [description]
 * @param {[type]} userid    [description]
 */
function addTaskFromCompanyIndex(companyId, userId) {
    $('#mainModalLabel').html( 
          '<div class="form-group">'+
            '<input type="text" class="form-control w-100" id="newTaskName" placeholder="Заголовок" value="" rows="5" >'+
            '</div>'
            );
    $('#closeModalButton').attr('onClick', 'reloadPage()');
    $('#mainModalBody').html( 
    '<div class="form-group">'+
        '<label for="newTaskProblem"><b>В чем проблема</b></label>'+
        '<textarea type="text" class="form-control" id="newTaskProblem" rows="4">'+
      '</textarea></div>'+
      '<div class="form-group">'+
        '<label for="newTaskDescription"><b>Как исправить</b></label>'+
        '<textarea type="text" class="form-control" id="newTaskDescription" rows="4">'+
      '</textarea></div>'+
      '<div class="form-group">'+
        '<label for="newTaskDeadline"><b>Крайний срок</b></label>'+
        '<input type="date" class="form-control w-50" id="newTaskDeadline" value="" rows="5" >'+
        '<input type="hidden" id="newTaskCompanyId" value="'+ companyId +'">'+
        '<input type="hidden" id="newTaskAuthorId" value="'+ userId +'">'+
        '</div>'
     );
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/get/responsibles/and/dots', {_token : token, companyId : companyId, userId : userId}, function( result ){
         data= JSON.parse(result);
      $('#mainModalBody').append( '<select class="custom-select" id="newTaskResponsibleId"> <option selected>Ответственный</option>'+ data.allUsers + '</select>');
      $('#mainModalBody').append( '<label for="newTaskDotId" class="mt-2"><b>Точка задачи</b></label><select class="custom-select" id="newTaskDotId">'+ data.allDots + '</select>');
    });
      $('#mainModalFooter').html( '<button type="button" href="#" onClick="postNewTask()" class="btn btn-success" >Добавить задачу</button> ' );

}



/**
 * Удаляет задачу
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function delTask(id, idForController)
{
    if (confirm("Вы уверены, то хотите удалить задачу?")) 
    {
        $('#'+id).attr('class', 'card  bg-light bg-primary mb-2 d-none w-100');
         var token = $('meta[name="csrf-token"]').attr('content');
        $.post('/delete/task', {_token : token, id : idForController});
    } 
    else
    {
    }
}

/**
 * перемещает задачи по канбану
 * @param  {[type]} statusid     статус, в который нужно переместить
 * @param  {[type]} taskid       id задачи
 * @param  {[type]} statusidtask текущий статус
 * @return {[type]}              [description]
 */
function goStatus(statusid, taskid, statusidtask)
{
    
    if (statusid == 'status1') 
    {
        /**/
        $fromStatusId=$('#'+statusidtask).parent().parent().parent().attr('id');
        $('#'+$fromStatusId+taskid).removeAttr('disabled');
        $('#'+statusidtask).attr('disabled', '');
        $('#'+ taskid).hide(1000, function(){ $('#'+ taskid).detach().prependTo('#status1')});
        $('#'+ taskid).show(1000);
    } 
    else if (statusid == 'status2') 
    {
        
      
       $fromStatusId=$('#'+statusidtask).parent().parent().parent().attr('id');
       $('#'+$fromStatusId+taskid).removeAttr('disabled');
       $('#'+statusidtask).attr('disabled', '');
       $('#'+ taskid).hide(1000, function(){ $('#'+ taskid).detach().prependTo('#status2')});
       $('#'+ taskid).show(1000);
       
    }
    else if (statusid == 'status3') 
    {
        $fromStatusId=$('#'+statusidtask).parent().parent().parent().attr('id');
        $('#'+$fromStatusId+taskid).removeAttr('disabled');
        $('#'+statusidtask).attr('disabled', '');
        $('#'+ taskid).hide(1000, function(){ $('#'+ taskid).detach().prependTo('#status3')});
        $('#'+ taskid).show(1000);
    }
    else if (statusid == 'status4') 
    {
        $fromStatusId=$('#'+statusidtask).parent().parent().parent().attr('id');
        $('#'+$fromStatusId+taskid).removeAttr('disabled');
        $('#'+statusidtask).attr('disabled', '');
        $('#'+ taskid).hide(1000, function(){ $('#'+ taskid).detach().prependTo('#status4')});
        $('#'+ taskid).show(1000);
    }
    else if (statusid == 'status5') 
    {
        $fromStatusId=$('#'+statusidtask).parent().parent().parent().attr('id');
        $('#'+$fromStatusId+taskid).removeAttr('disabled');
        $('#'+statusidtask).attr('disabled', '');
        $('#'+ taskid).hide(1000, function(){ $('#'+ taskid).detach().prependTo('#status5')});
        $('#'+ taskid).show(1000);
    }
}


/**
 *  Срабатывает при нажатии кноки ред.
 *  Отображает форму редактирования задачи
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function editTask(id){
           $.ajax({
                    url : "/taskContent",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                    "id": id
                    },
                    datatype: 'JSON',
                    type: "POST",
                    success: function( data ) {
                        data= JSON.parse(data);
    $('#closeModalButton').attr('onClick', 'reloadPage()');
    $('#mainModalLabel').html( 
          
          '<div class="form-group">'+
            '<label for="taskEditedName"><b>Заголовок</b></label>'+
            '<input type="text" class="form-control w-100" id="taskEditedName" value="'+data.name+'" rows="5" >'+
            '</div>'
            );
    $('#mainModalBody').html( 
    '<div class="form-group">'+
        '<label for="taskEditedProblem"><b>В чем проблема</b></label>'+
        '<textarea type="text" class="form-control" id="taskEditedProblem" rows="5">'
        + data.problem +
      '</textarea></div>'+
      '<div class="form-group">'+
        '<label for="taskEditedDescription"><b>Как исправить</b></label>'+
        '<textarea type="text" class="form-control" id="taskEditedDescription" rows="5">'
        +data.taskDescription+
      '</textarea></div>'+
      '<div class="form-group">'+
        '<label for="taskEditedDeadline"><b>Крайний срок</b></label>'+
        '<input type="date" class="form-control w-50" id="taskEditedDeadline" value="'+data.deadline+'" rows="5" >'+
        '</div>'
     );
    $('#mainModalFooter').html( data.submit_button );
    
                    }
                    });
}

/**
 * Функция принимает id задачи и возвращает 
 * информацию о задаче, вставляя ее в модальное окно
 * @param  int id - ID задачи, которую надо показать
 * @return string
 */
function showTask(id){
      $.ajax({
                    url : "/taskContent",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                    "id": id
                    },
                    datatype: 'JSON',
                    type: "POST",
                    success: function( data ) {
                        data= JSON.parse(data);
                        $('#mainModalBody').html( '<strong>Что не так:</strong><br>'
                            + data.problem + 
                            '<br><strong>Как исправить:</strong><br>'
                            + data.taskDescription +
                            '<br><br><p> <b>Крайник срок:</b> '
                            + data.deadline +
                            '<br> <b>Дата создания:</b> '
                            + data.created_at +
                            '</p>');
                        $('#mainModalFooter').html( data.edit_button );
                        $('#mainModalLabel').html( data.name );
                    }
                    });
}

/**
 * Срабатывает на кнопке "Обновить" в задаче
 * Функция принимает id задачи, собирает информацию из полей и отправляет в обработчик. 
 */
function submitChanges(taskid) {
    var name = $('#taskEditedName').val();
    var problem = $('#taskEditedProblem').val();
    var description = $('#taskEditedDescription').val();
    var deadline = $('#taskEditedDeadline').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/edit/Task', {_token : token, id : taskid, name : name, problem : problem, description : description, deadline : deadline}, function(result ){
   $('#mainModalLabel').html( name );
    $('#mainModalBody').html( 'Задача отредактирована' );
    $('#mainModalFooter').html( ' ' );
     });
}

/**
 * Отображает форму добавления новой задачи на странице точек
 * @param {[type]} companyId id компании, для которой ставится задача
 * @param {[type]} userid пользователя, который ставит задачу
 * @param {[type]} dotId  айдишник точки, для которой ставится задача
 */
function addTask(companyId, dotId, userId) {
   $('#closeModalButton').attr('onClick', 'reloadPage()');
   $('#mainModalLabel').html( 
          '<div class="form-group">'+
            '<input type="text" class="form-control w-100" id="newTaskName" placeholder="Заголовок" value="" rows="5" >'+
            '</div>'
            );
    $('#mainModalBody').html( 
    '<div class="form-group">'+
        '<label for="newTaskProblem"><b>В чем проблема</b></label>'+
        '<textarea type="text" class="form-control" id="newTaskProblem" rows="4">'+
      '</textarea></div>'+
      '<div class="form-group">'+
        '<label for="newTaskDescription"><b>Как исправить</b></label>'+
        '<textarea type="text" class="form-control" id="newTaskDescription" rows="4">'+
      '</textarea></div>'+
      '<div class="form-group">'+
        '<label for="newTaskDeadline"><b>Крайний срок</b></label>'+
        '<input type="date" class="form-control w-50" id="newTaskDeadline" value="" rows="5" >'+
        '<input type="hidden" id="newTaskCompanyId" value="'+ companyId +'">'+
        '<input type="hidden" id="newTaskAuthorId" value="'+ userId +'">'+
        '<input type="hidden" id="newTaskDotId" value="'+ dotId +'">'+
        '</div>'
     );
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/get/responsibles', {_token : token, id : companyId}, function( result ){
    $('#mainModalBody').append( '<select class="custom-select" id="newTaskResponsibleId"> <option selected>Ответственный</option>'+ result + '</select>');
    });
      $('#mainModalFooter').html( '<button type="button" href="#" onClick="postNewTask()" class="btn btn-success" >Добавить задачу</button> ' );

 }


/**
 * добавляет новую задачу
 * @return {[type]} [description]
 */
function postNewTask() {
    var name = $('#newTaskName').val();
    var problem = $('#newTaskProblem').val();
    var description = $('#newTaskDescription').val();
    var deadline = $('#newTaskDeadline').val();
    var company_id = $('#newTaskCompanyId').val();
    var author_id = $('#newTaskAuthorId').val();
    var dot_id = $('#newTaskDotId').val();
    var responsible_id = $('#newTaskResponsibleId').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/push/task/new', {_token : token, name : name, problem : problem, description : description, deadline : deadline, company_id : company_id, author_id : author_id, dot_id : dot_id, responsible_id : responsible_id }, function( result ){
    $('#mainModalBody').html( 'Задача добавлена' + result);
    $('#mainModalLabel').html(' ');
    });
}



//вызывается при нажатии "идея разработчикам"
 function newIdea() {
     $('#mainModalLabel').html( 
          
          '<div class="form-group">'+
            '<h5>Новая идея</h5>'+
            '</div>'
            );
    $('#mainModalBody').html( 
   
      '<div class="form-group">'+
        '<label for="taskEditedDescription"><b>Что можно исправить/улучшить?</b></label>'+
        '<textarea type="text" class="form-control" id="ideaEditedDescription" rows="4">'+
      '</textarea></div>'
     );
    $('#mainModalFooter').html( '<button type="button" href="#" onClick="postNewIdea()" class="btn btn-success" >Отправить идею</button> ' );
 }