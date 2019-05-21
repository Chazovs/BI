<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dot_task;
use App\Dot;
use App\Company;
use App\Proposal;
use App\Chart;
use App\User;
use App\Idea;
use Auth;

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

/**
 * Возвращает всех пользователей и все точки компании
 * @param  Request $request [description]
 * @return [type]           [description]
 */
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

    /**
     * добавляет новую точку с индексной страницы
     * @param Request $request
     */
public function pushNewDotFromIndex(Request $request)
{
  $reqArray = $request->all();
 
/*$this->validate($request, [
'name' => 'required',
'problem' => 'required|max:2000',
'description' => 'required|max:2000',
'company_id' => 'required',
'author_id' => 'required',
'dot_id' => 'required',
'responsible_id' => 'required',
    ]);*/

$dot = new Dot;
$dot->fill($reqArray);
$dot->save();
}


public function pushNewIdea(Request $request)
{
    $reqArray = $request->all();
    $proposal = new Proposal;
    $proposal->fill($reqArray);
    $proposal->save();
}


/**
 * изменяет статус задачи
 * @param  Request $request [description]
 * @return [type]           [description]
 */
public function changeTaskStatus(Request $request)
{
   $reqArray = $request->all();
   $newStatus=Dot_task::find($reqArray['id']);
   $newStatus->status=$reqArray['status'];
   $newStatus->save();
   /*->update($reqArray['status']);*/

}

public function pushChartNew(Request $request)
{
   $reqArray = $request->all();
   $chart = new Chart;
   $chart['data'] = '0';
   $chart->fill($reqArray);
   $chart->save();
}


/**
 * закрепляет график за точкой
 */
public function addСhartToDot(Request $request)
{
 $reqArray = $request->all();
 $newChart=Dot::find($reqArray['id']);
 $newChart->chart_id=$reqArray['chart_id'];
 $newChart->save();
}

/**
 * добавляет данные к графику
 */
public function addDataToChart(Request $request) 
{

  $reqArray = $request->all();
for ($i=1; isset($reqArray["chartValueDate".$i]) && isset($reqArray["chartValue".$i]); $i++) { 
$newData[$i] = array(
  'date' => $reqArray["chartValueDate".$i],
  'value' => $reqArray["chartValue".$i],
 );
}
$Chart=Chart::find($reqArray['chartId']);

//есть ли уже данные у chart
if ($Chart->data=="0") {
$allData=$newData;
}else{
$oldData=unserialize($Chart->data);
/*$allData=array_replace($oldData, $newData);*/
$allData = array_merge($newData, array_udiff($oldData, $newData, function ($a, $b) { return $a['date'] <=> $b['date']; }));
}
usort($allData, function($a, $b) { return strtotime($a["date"]) <=> strtotime($b["date"]); });

$Chart->data=serialize($allData);
$Chart->update();
    return back();
}

    /**
     * меняет родителя у точки
     * @param Request $request
     */
public function pushDotNewParent(Request $request) {
    $reqArray = $request->all();
    if ($reqArray['parent_id']=="company")$reqArray['parent_id']="0";
    $childDot=Dot::find($reqArray['id']);
    $childDot->parent_id=$reqArray['parent_id'];
    $childDot->update();

}

    /**
     * Отправляет новую заявку на участие в компании
     * @param Request $request
     */
public function addNewUserRequestToCompany(Request $request)
{
    $reqArray = $request->all();
    $UserModel=User::find($reqArray['user_id']);
    $UserModel->rqcompanies()->attach($reqArray['company_id']);

}

    /**
     * создает связь многие ко многим  в таблице приглашений от компаний.
     * фиксирует в БД приглашение пользователю от компании
     * @param Request $request
     */
    public function companyInvitation(Request $request){
        $reqArray=$request->all();
        $user=User::find($reqArray['user_id']);
        $user->incompanies()->attach($reqArray['company_id']);
    }


    /**
     * принимаем приглашение в компанию, добавляет приглашенного пользователя в компанию
     */
public function companyInvitationAccept(Request $request){
    $reqArray=$request->all();
    Auth::user()->incompanies()->detach($reqArray['company_id']);
    Auth::user()->companies()->attach($reqArray['company_id']);
}

    /**
     * отдает информацию об идеи сообщества для модального окна
     * @param Request $request
     */
public function getIdeaBody(Request $request){
    $reqArray=$request->all();
    $idea=Idea::find($reqArray['id']);
    $ideaArray ["name"] = $idea->name;
    $ideaArray ["problem"] = $idea->problem;
    $ideaArray ["situation"] = $idea->situation;
    $ideaArray ["decision"] = $idea->decision;
    $ideaArray ["created_at"] = $idea->created_at->format('d.m.Y H:i');
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($ideaArray);
}

    /**
     * Отдает информацию для модального окна редактирования точки
     * @param Request $request
     */
public function getDotData(Request $request){
    $dotId=$request->input('id');
    $dot=Dot::find($dotId);
    $dotArray ["name"] = $dot->name;
    $dotArray ["logo"] = $dot->logo;
    $dotArray ["description_full"] = $dot->description_full;
    $dotArray ["description_short"] = $dot->description_short;
    $dotArray ["edit_button"] = '<button type="button" onClick="editdot('.$dotId.')" class="btn btn-primary">Редактировать</button>';
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($dotArray);
}



    /**
     * Возвращает все компании пользователя
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCompanies(Request $request)
    {
        $userId=$request->input('userId');
        $user = User::find($userId);
        $companies=$user->companies()->get();
        $allUCompanies='';
        foreach ($companies as $company) {
            $allUCompanies=$allUCompanies.'<option value="'.$company->id.'">'.$company->name.'</option>';
        }
        $myArray['allCompanies'] = $allUCompanies;
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($myArray);
    }



}
