/**
 * Перезагружает страницу
 * @return {[type]}          [description]
 */
function reloadPage() {
    location.reload();
}

function addDotFromCompanyIndex(companyId, userId, parentId) {
    $('#mainModalLabel').html(
        '<div class="form-group">' +
        '<input type="text" class="form-control w-100" id="newDotName" placeholder="Заголовок" value="" rows="5" >' +
        '</div>'
    );
    $('#closeModalButton').attr('onClick', 'reloadPage()');
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<label for="newTaskProblem"><b>Опишите, как работает точка сейчас</b></label>' +
        '<textarea type="text" class="form-control" id="newDotDescriptionShort" rows="2">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDescription"><b>Как она должна работать</b></label>' +
        '<textarea type="text" class="form-control" id="newDotDescriptionFull" rows="3">' +
        '</textarea></div>' +
        '<div class="mb-3">' +
        '<label for="logo">Выбирите логотип точки</label><br>' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot1.png" alt="1" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(1)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot2.png" alt="2" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(2)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot3.png" alt="3" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(3)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot4.png" alt="4" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(4)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot5.png" alt="5" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(5)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot6.png" alt="6" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(6)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot7.png" alt="7" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(7)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot8.png" alt="8" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(8)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot9.png" alt="9" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(9)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot10.png" alt="10" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(10)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot11.png" alt="11" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(11)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot12.png" alt="12" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(12)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot13.png" alt="13" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(13)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot14.png" alt="14" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(14)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot15.png" alt="15" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(15)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot16.png" alt="16" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(16)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot17.png" alt="17" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(17)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot18.png" alt="18" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(18)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot19.png" alt="19" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(19)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot20.png" alt="20" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(20)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot21.png" alt="21" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(21)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot22.png" alt="22" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(22)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot23.png" alt="23" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(23)">' +
        '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot24.png" alt="24" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(24)">' +
        '</div>' +
        '<div class="form-group">' +
        '<input type="hidden" id="newDotCompanyId" value="' + companyId + '">' +
        '<input type="hidden" id="newDotUserId" value="' + userId + '">' +
        '<input type="hidden" id="newDotParentId" value="' + parentId + '">' +
        '<input type="hidden" id="newDotlogo" value="">' +
        '</div>'
    );
    var editor = CKEDITOR.replace('newDotDescriptionShort', {height: '100px'});
    var editor = CKEDITOR.replace('newDotDescriptionFull', {height: '100px'});
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postDot()" class="btn btn-success" >Добавить точку</button> ');
    /*добавляем редактор к полям*/

}

function setDotLogo(id) {
    if ($('#newDotLogo')) {
        $('#newDotLogo').remove();
    }
    $('#mainModalBody').prepend('<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot' + id + '.png" class="rounded mx-auto d-block" height="64" width="64" id="newDotLogo">');
    $('#newDotlogo').val('../img/dotlogo/dot' + id + '.png');

}


/**
 * Добавляет новую точку
 * @return {[type]} [description]
 */
function postDot() {
    var name = $('#newDotName').val();
    var parent_id = $('#newDotParentId').val();
    ;
    var description_short = CKEDITOR.instances.newDotDescriptionShort.getData();
    var description_full = CKEDITOR.instances.newDotDescriptionFull.getData();
    console.log(description_full);
    var company_id = $('#newDotCompanyId').val();
    var userId = $('#newDotUserId').val();
    var logo = $('#newDotlogo').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/push/dot/new', {
        _token: token,
        name: name,
        parent_id: parent_id,
        description_short: description_short,
        description_full: description_full,
        logo: logo,
        company_id: company_id,
        author: userId
    }, function (result) {
        $('#mainModalBody').html('Точка добавлена' + result);
        $('#mainModalLabel').html(' ');
        $('#mainModalFooter').html(' ');
    });
}

/**
 * добавляет задачу с главной страницы отличается тем, что выводит селектором список всех точек
 * @param {[type]} companyid [description]
 * @param {[type]} userid    [description]
 */
function addTaskFromCompanyIndex(companyId, userId) {
    $('#mainModalLabel').html(
        '<div class="form-group">' +
        '<input type="text" class="form-control w-100" id="newTaskName" placeholder="Заголовок" value="" rows="5" >' +
        '</div>'
    );
    $('#closeModalButton').attr('onClick', 'reloadPage()');
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<label for="newTaskProblem"><b>В чем проблема</b></label>' +
        '<textarea type="text" class="form-control" id="newTaskProblem" rows="4">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDescription"><b>Как исправить</b></label>' +
        '<textarea type="text" class="form-control" id="newTaskDescription" rows="4">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDeadline"><b>Крайний срок</b></label>' +
        '<input type="date" class="form-control w-50" id="newTaskDeadline" value="" rows="5" >' +
        '<input type="hidden" id="newTaskCompanyId" value="' + companyId + '">' +
        '<input type="hidden" id="newTaskAuthorId" value="' + userId + '">' +
        '</div>'
    );
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/get/responsibles/and/dots', {_token: token, companyId: companyId, userId: userId}, function (result) {
        data = JSON.parse(result);
        $('#mainModalBody').append('<select class="custom-select" id="newTaskResponsibleId"> <option selected>Ответственный</option>' + data.allUsers + '</select>');
        $('#mainModalBody').append('<label for="newTaskDotId" class="mt-2"><b>Точка задачи</b></label><select class="custom-select" id="newTaskDotId">' + data.allDots + '</select>');
    });
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postNewTask()" class="btn btn-success" >Добавить задачу</button> ');

}


/**
 * Удаляет задачу
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function delTask(id, idForController) {
    if (confirm("Вы уверены, то хотите удалить задачу?")) {
        $('#' + id).attr('class', 'card  bg-light bg-primary mb-2 d-none w-100');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post('/delete/task', {_token: token, id: idForController});
    } else {
    }
}

/**
 * перемещает задачи по канбану
 * @param  {[type]} statusid     статус, в который нужно переместить
 * @param  {[type]} taskid       id задачи
 * @param  {[type]} statusidtask текущий статус
 * @return {[type]}              [description]
 */
function goStatus(statusid, taskid, statusidtask) {
    if (statusid == 'status1') {
        $fromStatusId = $('#' + statusidtask).parent().parent().parent().attr('id');
        $('#' + $fromStatusId + taskid).removeAttr('disabled');
        $('#' + statusidtask).attr('disabled', '');
        $('#' + taskid).hide(1000, function () {
            $('#' + taskid).detach().prependTo('#status1')
        });
        $('#' + taskid).show(1000);
    } else if (statusid == 'status2') {
        $fromStatusId = $('#' + statusidtask).parent().parent().parent().attr('id');
        $('#' + $fromStatusId + taskid).removeAttr('disabled');
        $('#' + statusidtask).attr('disabled', '');
        $('#' + taskid).hide(1000, function () {
            $('#' + taskid).detach().prependTo('#status2')
        });
        $('#' + taskid).show(1000);

    } else if (statusid == 'status3') {
        $fromStatusId = $('#' + statusidtask).parent().parent().parent().attr('id');
        $('#' + $fromStatusId + taskid).removeAttr('disabled');
        $('#' + statusidtask).attr('disabled', '');
        $('#' + taskid).hide(1000, function () {
            $('#' + taskid).detach().prependTo('#status3')
        });
        $('#' + taskid).show(1000);
    } else if (statusid == 'status4') {
        $fromStatusId = $('#' + statusidtask).parent().parent().parent().attr('id');
        $('#' + $fromStatusId + taskid).removeAttr('disabled');
        $('#' + statusidtask).attr('disabled', '');
        $('#' + taskid).hide(1000, function () {
            $('#' + taskid).detach().prependTo('#status4')
        });
        $('#' + taskid).show(1000);
    } else if (statusid == 'status5') {
        $fromStatusId = $('#' + statusidtask).parent().parent().parent().attr('id');
        $('#' + $fromStatusId + taskid).removeAttr('disabled');
        $('#' + statusidtask).attr('disabled', '');
        $('#' + taskid).hide(1000, function () {
            $('#' + taskid).detach().prependTo('#status5')
        });
        $('#' + taskid).show(1000);
    }
    var token = $('meta[name="csrf-token"]').attr('content');
    var status = parseInt(/[0-9]+/.exec(statusid));
    var id = parseInt(/[0-9]+/.exec(taskid));
    $.post('/change/task/status', {_token: token, id: id, status: status});
}


/**
 *  Срабатывает при нажатии кноки ред.
 *  Отображает форму редактирования задачи
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function editTask(id) {
    $.ajax({
        url: "/taskContent",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            "id": id
        },
        datatype: 'JSON',
        type: "POST",
        success: function (data) {
            data = JSON.parse(data);
            $('#closeModalButton').attr('onClick', 'reloadPage()');
            $('#mainModalLabel').html(
                '<div class="form-group">' +
                '<label for="taskEditedName"><b>Заголовок</b></label>' +
                '<input type="text" class="form-control w-100" id="taskEditedName" value="' + data.name + '" rows="5" >' +
                '</div>'
            );
            $('#mainModalBody').html(
                '<div class="form-group">' +
                '<label for="taskEditedProblem"><b>В чем проблема</b></label>' +
                '<textarea type="text" class="form-control" id="taskEditedProblem" rows="5">'
                + data.problem +
                '</textarea></div>' +
                '<div class="form-group">' +
                '<label for="taskEditedDescription"><b>Как исправить</b></label>' +
                '<textarea type="text" class="form-control" id="taskEditedDescription" rows="5">'
                + data.taskDescription +
                '</textarea></div>' +
                '<div class="form-group">' +
                '<label for="taskEditedDeadline"><b>Крайний срок</b></label>' +
                '<input type="date" class="form-control w-50" id="taskEditedDeadline" value="' + data.deadline + '" rows="5" >' +
                '</div>'
            );
            $('#mainModalFooter').html(data.submit_button);

        }
    });
}

/**
 * Функция принимает id задачи и возвращает
 * информацию о задаче, вставляя ее в модальное окно
 * @param  int id - ID задачи, которую надо показать
 * @return string
 */
function showTask(id) {
    $.ajax({
        url: "/taskContent",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            "id": id
        },
        datatype: 'JSON',
        type: "POST",
        success: function (data) {
            data = JSON.parse(data);
            $('#mainModalBody').html('<strong>Что не так:</strong><br>'
                + data.problem +
                '<br><strong>Как исправить:</strong><br>'
                + data.taskDescription +
                '<br><br><p> <b>Крайник срок:</b> '
                + data.deadline +
                '<br> <b>Дата создания:</b> '
                + data.created_at +
                '</p>');
            $('#mainModalFooter').html(data.edit_button);
            $('#mainModalLabel').html(data.name);
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
    $.post('/edit/Task', {
        _token: token,
        id: taskid,
        name: name,
        problem: problem,
        description: description,
        deadline: deadline
    }, function (result) {
        $('#mainModalLabel').html(name);
        $('#mainModalBody').html('Задача отредактирована');
        $('#mainModalFooter').html(' ');
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
        '<div class="form-group">' +
        '<input type="text" class="form-control w-100" id="newTaskName" placeholder="Заголовок" value="" rows="5" >' +
        '</div>'
    );
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<label for="newTaskProblem"><b>В чем проблема</b></label>' +
        '<textarea type="text" class="form-control" id="newTaskProblem" rows="4">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDescription"><b>Как исправить</b></label>' +
        '<textarea type="text" class="form-control" id="newTaskDescription" rows="4">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDeadline"><b>Крайний срок</b></label>' +
        '<input type="date" class="form-control w-50" id="newTaskDeadline" value="" rows="5" >' +
        '<input type="hidden" id="newTaskCompanyId" value="' + companyId + '">' +
        '<input type="hidden" id="newTaskAuthorId" value="' + userId + '">' +
        '<input type="hidden" id="newTaskDotId" value="' + dotId + '">' +
        '</div>'
    );
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/get/responsibles', {_token: token, id: companyId}, function (result) {
        $('#mainModalBody').append('<select class="custom-select" id="newTaskResponsibleId"> <option selected>Ответственный</option>' + result + '</select>');
    });
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postNewTask()" class="btn btn-success" >Добавить задачу</button> ');

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
    $.post('/push/task/new', {
        _token: token,
        name: name,
        problem: problem,
        description: description,
        deadline: deadline,
        company_id: company_id,
        author_id: author_id,
        dot_id: dot_id,
        responsible_id: responsible_id
    }, function (result) {
        $('#mainModalBody').html('Задача добавлена' + result);
        $('#mainModalLabel').html(' ');
        $('#mainModalFooter').html(' ');
    });
}


//вызывается при нажатии "идея разработчикам"
function newIdea(userId) {
    $('#mainModalLabel').html(
        '<div class="form-group">' +
        '<h5>Новая идея</h5>' +
        '</div>'
    );
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<label for="taskEditedDescription"><b>Что можно исправить/улучшить?</b></label>' +
        '<textarea type="text" class="form-control" id="ideaEditedDescription" rows="4">' +
        '</textarea>' +
        '<input type="hidden" id="newIdeaAuthorId" value="' + userId + '"></div>'
    );
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postNewIdea()" class="btn btn-success" >Отправить идею</button> ');
}

/**
 * Постит новую идею
 * @return {[type]} возвращает строку об успешном добавлении из контроллера
 */
function postNewIdea() {
    var user_id = $('#newIdeaAuthorId').val();
    var description = $('#ideaEditedDescription').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/push/idea/new', {_token: token, user_id: user_id, description: description}, function (result) {
        $('#mainModalBody').html('Идея добавлена ' + result);
        $('#mainModalLabel').html(' ');
    });
}

/**
 * Добавляет новую идею для компании
 * @param  {[type]} argument [description]
 * @return {[type]}          [description]
 */
function newCompanyIdea(companyId, userId) {
    $('#mainModalLabel').html(
        '<div class="form-group">' +
        '<input type="text" class="form-control w-100" id="newIdeaName" placeholder="Заголовок" value="" rows="5" >' +
        '</div>'
    );
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<label for="ideaSituation"><b>Что происходит?</b></label>' +
        '<textarea type="text" class="form-control" id="ideaSituation" rows="2">' +
        '</textarea>' +
        '<label for="ideaProblem"><b>Почему это нужно менять?</b></label>' +
        '<textarea type="text" class="form-control" id="ideaProblem" rows="2">' +
        '</textarea>' +
        '<label for="ideaDecision"><b>Как это можно исправить?</b></label>' +
        '<textarea type="text" class="form-control" id="ideaDecision" rows="2">' +
        '</textarea>' +
        '<input type="hidden" id="newIdeaAuthorId" value="' + userId + '"></div>'
    );
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postNewCompanyIdea()" class="btn btn-success" >Отправить идею</button> ');
}


/**
 * Создает модальное окно для добавления графиков к компании
 * @param  {[type]} companyId [description]
 * @return {[type]}           [description]
 */
function createChart(companyId) {
    $('#mainModalLabel').html(
        '<div class="form-group">' +
        '<input type="text" class="form-control w-100" id="newIdeaName" placeholder="Заголовок" value="" rows="5" maxlength="50">' +
        '</div>'
    );
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<p><label for="chartDescription"><b>Описание (до 100 символов)</b></label>' +
        '<textarea type="text" class="form-control" id="chartDescription" rows="2" maxlength="100">' +
        '</textarea></p>' +
        '<p><label for="chartYAxis"><b>Что измеряем</b></label>' +
        '<input type="text" class="form-control w-100" id="chartYAxis" placeholder="Например: чистая прибыль" value="" rows="5" maxlength="30"></p>' +

        '<p><label for="upOrDown"><b>Повышение или понижение показателя является положительной тенденцией?</b></label>' +
        '<select class="custom-select" id="upOrDown"> <option selected value="up">Повышение</option> <option value="down">Понижение</option></select></p>' +
        '<input type="hidden" id="chartCompanyId" value="' + companyId + '"></div>'
    );
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postNewChart()" class="btn btn-success" >Создать график</button> ');
}

/**
 * Постить новый график
 * @return {[type]} [description]
 */
function postNewChart() {
    var title = $('#newIdeaName').val();
    var description = $('#chartDescription').val();
    var y_name = $('#chartYAxis').val();
    var up_or_down = $('#upOrDown').val();
    var company_id = $('#chartCompanyId').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/push/chart/new', {
        _token: token,
        title: title,
        description: description,
        y_name: y_name,
        up_or_down: up_or_down,
        company_id: company_id
    }, function (result) {
        $('#mainModalBody').html('График добавлен <br>' + result);
        $('#mainModalLabel').html(' ');
        $('#mainModalFooter').html(' ');
    });
}

/**
 * привязывает график к точке
 * @param {[type]} dotId [description]
 */
function addChartToDot(chartId, dotId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/add/chart/to/dot', {_token: token, chart_id: chartId, id: dotId}, function (result) {
        location.reload();
    });
}

/**
 * Публикует окно добавления новых данных к графику
 * @param {[type]} chartId [description]
 */
function addChartData(chartId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#mainModalLabel').html(
        '<button onclick="" class="btn btn-link disabled">ввести значения</button>/<button onclick="addChartDataUploadFile('
        + chartId +
        ')" class="btn btn-link">загрузить файл</button>'
    );
    $('#mainModalBody').html(
        '<form class="form-inline" method="POST" action="/add/data/to/chart" >' +
        '  <div id="formAddDataChart">' +
        '  <div class="datachart input-group mb-2 mr-sm-2" >' +
        '    <div class="input-group-prepend">' +
        '      <div class="input-group-text">дата</div>' +
        '    </div>' +
        '    <input type="date" required name="chartValueDate1" class="form-control" id="chartValueDate1">' +
        '    <input type="text" required name="chartValue1"  pattern="^[ 0-9]+$" class="form-control" id="chartValue1" placeholder="Значение">' +
        '<button type="button" onClick="addDateDataBlock(1)" id="submitToArray" class="btn btn-link">+</button> ' +
        '<button type="button" onClick="delDateDataBlock()" id="delToArray" class="btn btn-link">-</button>' +
        '  </div>' +
        '  </div>' +
        '<input type="hidden" name="_token" id="_token" value="' + token + '">' +
        '<input type="hidden" name="chartId" id="chartId" value="' + chartId + '">' +
        '  <button type="submit" class="btn btn-primary mb-2">Отправить</button>' +
        '</form>'
    );
}



/**
 * публикует кнопку прикрепления к файлу и отправляет файл в скрипт
 * @param {[type]} chartId [description]
 */
function addChartDataUploadFile(chartId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#mainModalLabel').html(
        '<button onclick="addChartData('+chartId+')" class="btn btn-link">ввести значения</button>/<button onclick="" class="btn btn-link disabled">загрузить файл</button>'
    );
    $('#mainModalBody').html(
        '<form class="form-inline" method="POST" action="/add/data/to/chart/from/file" enctype="multipart/form-data">' +
        '<input type="file" name="xls" id="xls">' +
        '<input type="hidden" name="_token" id="_token" value="' + token + '">' +
        '<input type="hidden" name="chartId" id="chartId" value="' + chartId + '">' +
        '<button type="submit" class="btn btn-primary mb-2">Отправить</brbutton>' +
        '</form>'
    );
}



/**
 * Добавляет блок дата-значение в форме заполения графиков.
 * @param {[type]} dataArrayLocalId [description]
 */
function addDateDataBlock(dataArrayLocalId) {
    var length = $('div.datachart').length;
    if (length == 1) {
        $('#delToArray').attr('onClick', 'delDateDataBlock()');
    }

    var index = dataArrayLocalId + 1;
    $('#submitToArray').attr('onClick', 'addDateDataBlock(' + index + ')');
    $('#formAddDataChart').append(
        '  <div class="datachart input-group mb-2 mr-sm-2" >' +
        '    <div class="input-group-prepend">' +
        '      <div class="input-group-text">дата</div>' +
        '    </div>' +
        '    <input type="date" required name="chartValueDate' + index + '" class="form-control" id="chartValueDate' + index + '" placeholder="Username">' +
        '    <input type="text" required name="chartValue' + index + '" pattern="^[ 0-9]+$" class="form-control" id="chartValue' + index + '" placeholder="Значение">' +
        '  </div>'
    );
}

/**
 * удаляет последний блок дата-значение
 */
function delDateDataBlock() {
    $("div.datachart:last").remove();
    var length = $('div.datachart').length;
    if (length == 1) {
        $('#delToArray').attr('onClick', ' ');
    }
}

/**
 * отправляет запрос на добавление нового пользователя в компанию
 * @param companyId
 * @param userId
 */
function newUserRequest(companyId, userId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/add/new/user/request/to/company', {
        _token: token,
        company_id: companyId,
        user_id: userId
    }, function (result) {
        $("#requestCompany" + companyId).replaceWith('<a class="btn btn-sm btn-outline-success disabled" role="button"> Заявка отправлена</a>');
    });
}

/**
 * принимает запрос  на принятие в команду
 * @param companyId
 * @param userId
 */
function acceptRequest(companyId, userId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/company/' + companyId + '/accept/user/request', {
        _token: token,
        company_id: companyId,
        user_id: userId
    }, function (result) {
        $("#acceptRequest" + userId).replaceWith('<a class="btn btn-sm btn-outline-success disabled" role="button">Принят в команду</a>');
    });
}

/**
 * Отправляет пользователю приглашение в компанию
 * @param userId
 */
function companyInvitation(userId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var companyId = $('#yourCompany').val();
    $.post('/company/invitation', {_token: token, company_id: companyId, user_id: userId}, function (result) {
        $("#companyInvitation" + userId).replaceWith('<a class="btn btn-sm btn-outline-success disabled" role="button">Приглашение отправлено</a>');
    });
}

/**
 * меняет компанию для приглашения
 * @param companyId
 */
function eventCompanySelected(companyId) {
    window.location.href = "/users/all?selectedCompany=" + companyId;
}

/**
 * принимаем приглашение от компании
 * @param companyId
 */
function acceptInvitation(companyId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/company/invitation/accept', {_token: token, company_id: companyId}, function (result) {
        $("#acceptInvitation" + companyId).replaceWith('<a class="btn btn-sm btn-outline-success disabled" role="button">Приглашение принято</a>');
    });
}

/**
 * показывает в модальном окне подробную инфу по идеи
 */
function getIdea(ideaId) {
    $.ajax({
        url: "/get/idea/body",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            "id": ideaId
        },
        datatype: 'JSON',
        type: "POST",
        success: function (data) {
            data = JSON.parse(data);
            $('#mainModalBody').html('<strong>Ситуация:</strong><br>'
                + data.situation +
                '<br><strong>Проблема:</strong><br>'
                + data.problem +
                '<br><p> <b>Решение</b><br> '
                + data.decision +
                '<br><br> <b>Дата создания:</b> '
                + data.created_at +
                '</p>');
            $('#mainModalFooter').html(data.edit_button);
            $('#mainModalLabel').html(data.name);
        }
    });
}


/**
 * редактируем точку(функция пока не дописана) 12.05.19
 * @param dotId
 */
function editDotModal(dotId) {

    $.ajax({
        url: "/get/dot/data",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            "id": dotId
        },
        datatype: 'JSON',
        type: "POST",
        success: function (data) {
            data = JSON.parse(data);
//вся эта безумная портянка добавляет окно редактирования точки :)
            $('#mainModalLabel').html(
                '<div class="form-group">' +
                '<input type="text" class="form-control w-100" id="newDotName" placeholder="Заголовок" value="' + data.name + '" rows="5" >' +
                '</div>'
            );
            $('#closeModalButton').attr('onClick', 'reloadPage()');
            $('#mainModalBody').html(
                '<div class="form-group">' +
                '<label for="newTaskProblem"><b>Опишите, как работает точка сейчас</b></label>' +
                '<textarea type="text" class="form-control" id="newDotDescriptionShort" rows="2">' +
                data.description_short +
                '</textarea></div>' +
                '<div class="form-group">' +
                '<label for="newTaskDescription"><b>Как она должна работать</b></label>' +
                '<textarea type="text" class="form-control" id="newDotDescriptionFull" rows="3">' +
                data.description_full +
                '</textarea></div>' +
                '<div class="mb-3">' +
                '<label for="logo">Выбирите логотип точки</label><br>' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot1.png" alt="1" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(1)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot2.png" alt="2" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(2)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot3.png" alt="3" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(3)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot4.png" alt="4" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(4)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot5.png" alt="5" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(5)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot6.png" alt="6" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(6)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot7.png" alt="7" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(7)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot8.png" alt="8" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(8)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot9.png" alt="9" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(9)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot10.png" alt="10" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(10)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot11.png" alt="11" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(11)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot12.png" alt="12" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(12)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot13.png" alt="13" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(13)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot14.png" alt="14" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(14)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot15.png" alt="15" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(15)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot16.png" alt="16" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(16)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot17.png" alt="17" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(17)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot18.png" alt="18" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(18)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot19.png" alt="19" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(19)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot20.png" alt="20" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(20)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot21.png" alt="21" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(21)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot22.png" alt="22" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(22)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot23.png" alt="23" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(23)">' +
                '<img src="' + location.protocol + '//' + location.host + '/img/dotlogo/dot24.png" alt="24" height="40" width="40" type="button" class="btn-outline-dark" onclick="setDotLogo(24)">' +
                '</div>' +
                '<div class="form-group">' +
                '<input type="hidden" id="newDotCompanyId" value="' + dotId + '">' +
                '<input type="hidden" id="newDotlogo" value="">' +
                '</div>'
            );
            var editor = CKEDITOR.replace('newDotDescriptionShort', {height: '100px'});
            var editor = CKEDITOR.replace('newDotDescriptionFull', {height: '100px'});
            $('#mainModalFooter').html('<button type="button" href="#" onClick="pushEditDot()" class="btn btn-success" >Редактировать точку</button> ');
            /*добавляем редактор к полям*/
        }
    });
}


/**
 * модальное окно добавления задачи со страницы Мои задачи
 * @param companyId
 * @param userId
 */
function addTaskFromAllTasks(userId) {
    $('#mainModalLabel').html(
        '<div class="form-group">' +
        '<input type="text" class="form-control w-100" id="newTaskName" placeholder="Заголовок" value="" rows="5" >' +
        '</div>'
    );
    $('#closeModalButton').attr('onClick', 'reloadPage()');
    $('#mainModalBody').html(
        '<div class="form-group">' +
        '<label for="newTaskProblem"><b>В чем проблема</b></label>' +
        '<textarea type="text" class="form-control" id="newTaskProblem" rows="4">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDescription"><b>Как исправить</b></label>' +
        '<textarea type="text" class="form-control" id="newTaskDescription" rows="4">' +
        '</textarea></div>' +
        '<div class="form-group">' +
        '<label for="newTaskDeadline"><b>Крайний срок</b></label>' +
        '<input type="date" class="form-control w-50" id="newTaskDeadline" value="" rows="5" >' +
        '<input type="hidden" id="newTaskAuthorId" value="' + userId + '">' +
        '</div>'
    );
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/get/companies', {_token: token, userId: userId}, function (result) {
        data = JSON.parse(result);
        $('#mainModalBody').append('<select class="custom-select" id="modalCompanyId" onchange="getDotsAndUsers(' + userId + ')" id="newTaskResponsibleId" required> <option selected>Компания</option>' + data.allCompanies + '</select>');
    });
    $('#mainModalFooter').html('<button type="button" href="#" onClick="postNewTaskFromAllTasksPage()" class="btn btn-success" >Добавить задачу</button> ');
}

/**
 * подгружает в модалку, созданную функцией addTaskFromAllTasks
 * список пользователей и точек компании
 */
function getDotsAndUsers(userId) {
    var token = $('meta[name="csrf-token"]').attr('content');
    companyId = $('#modalCompanyId').val();
    if (companyId != "Компания") {
        if ($('#divNewTaskResponsibleId').length) {
            $('#divNewTaskResponsibleId').remove();
        }

        if ($('#divNewTaskDotId').length) {
            $('#divNewTaskDotId').remove();
        }
        $.post('/get/responsibles/and/dots', {
            _token: token,
            companyId: companyId,
            userId: userId
        }, function (result) {
            data = JSON.parse(result);
            $('#mainModalBody').append('<div id="divNewTaskResponsibleId"><br><br><select class="custom-select" id="newTaskResponsibleId"> <option selected>Ответственный</option>' + data.allUsers + '</select></div>');
            $('#mainModalBody').append('<div id="divNewTaskDotId"><label for="newTaskDotId" class="mt-2"><b>Точка задачи</b></label><select class="custom-select" id="newTaskDotId">' + data.allDots + '</select></div>');
        });

    }
}

/**
 * отправляет новую задачу с главной
 */
function postNewTaskFromAllTasksPage() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var company_id = $('#modalCompanyId').val();
    var responsible_id = $('#newTaskResponsibleId').val();
    var dot_id = $('#newTaskDotId').val();
    var name = $('#newTaskName').val();
    var problem = $('#newTaskProblem').val();
    var description = $('#newTaskDescription').val();
    var deadline = $('#newTaskDeadline').val();
    var author_id = $('#newTaskAuthorId').val();
    $.post('/push/task/new', {
        _token: token,
        name: name,
        problem: problem,
        description: description,
        deadline: deadline,
        company_id: company_id,
        author_id: author_id,
        dot_id: dot_id,
        responsible_id: responsible_id
    }, function (result) {
        $('#mainModalBody').html('Задача добавлена' + result);
        $('#mainModalLabel').html(' ');
        $('#mainModalFooter').html(' ');
    });
}

//удаляет точки
function delDot(dotId,companyId) {
    if (confirm("ВНИМАНИЕ!  Будут удалены все связанные с точной задачи! Вы уверены, что хотите удалить эту точку? Отменить это действие будет невозможно!")) {

        var token = $('meta[name="csrf-token"]').attr('content');
        $.post('/company/'+companyId+'/delete/dot', {_token: token, id: dotId
        }, function (result) {
            alert(result);
            location.reload();
        });
    } else {
    }
}
