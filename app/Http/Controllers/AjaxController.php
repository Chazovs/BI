<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dot_task;
use App\Company;

class AjaxController extends Controller
{
    public function taskContent(Request $request){
    
    $taskId=$request->input('id');
    $taskModel = Dot_task::find($taskId);
    $taskArray ["taskDescription"] = $taskModel->description;
    $taskArray ["name"] = $taskModel->name;
    $taskArray ["problem"] = $taskModel->problem;
    $taskArray ["deadline"] = $taskModel->deadline;
    $taskArray ["created_at"] = $taskModel->created_at->format('d.m.Y H:i');
    $taskArray ["edit_button"] = '<button type="button" onClick="editTask('.$taskId.')" class="btn btn-primary">Редактировать</button>';
    $taskArray ["submit_button"] = '<button type="submit" onClick="submitChanges('.$taskId.')" class="btn btn-success">Обновить</button>';
   header("Content-type: application/json; charset=utf-8");
   echo json_encode($taskArray);
	
}

/**
 * возвращает списко пользователей, зарегистрированных в компании в видео выпадающего списка для выбора
 * @param string $value [description]
 */
public function getCompanyUsers(Request $request)
{
    $companyId=$request->input('id');
    $company = Company::find($companyId);
    $users=$company->users()->get();
    foreach ($users as $user) {

        echo '<option value="'.$user->id.'">'.$user->real_name.' '.$user->real_lastname.'</option>';
    }
}

/**
 * Функция обновляет информацию, пришедшую из модального окна
 * @param  Request $request принимает модель запроса
 * @return  не знаю, что возвращает))           [description]
 */
public function editTask(Request $request)
{
$reqArray = $request->all();
$this->validate($request, [
'name' => 'required',
'problem' => 'required|max:2000',
'description' => 'required|max:2000',
'deadline' => 'required',
	]);

$taskId=$request->input('id');
$taskModelUpdate = Dot_task::find($taskId)->update($reqArray);

}

/**
 * Постит новую задачу к текущей точке
 * @param  Request $request [description]
 * @return [type]           [description]
 */
public function pushNewTask(Request $request)
{
$reqArray = $request->all();
$this->validate($request, [
'name' => 'required',
'problem' => 'required|max:2000',
'description' => 'required|max:2000',
'company_id' => 'required',
'author_id' => 'required',
'dot_id' => 'required',
'responsible_id' => 'required',
    ]);
$dot_task = new Dot_task;
$dot_task->fill($reqArray);
$dot_task->save();
}


public function deleteTask(Request $request)
{
    $reqID=$request->id;
    $task = Dot_task::find($reqID);
    $task->delete();
   
}

public function getCompanyUsersAndDots(Request $request)
{
 

    $companyId=$request->input('companyId');
    $company = Company::find($companyId);
    $users=$company->users()->get();

       $allUsers='';
    foreach ($users as $user) {

        $allUsers=$allUsers.'<option value="'.$user->id.'">'.$user->real_name.' '.$user->real_lastname.'</option>';
          
    }
    $myArray['allUsers'] = $allUsers;

 $companydots=$company->dots()->get();

 $allDots='';
 foreach ( $companydots as  $companydot) {
    $allDots=$allDots.'<option value="'.$companydot->id.'">'.$companydot->name.'</option>';
}
  $myArray['allDots'] =$allDots;
  
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($myArray);
}
}
