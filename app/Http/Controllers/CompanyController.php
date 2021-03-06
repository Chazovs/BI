<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use App\User;
use App\Dot;
use App\Dot_task;
use DB;
use DateTime;

class CompanyController extends Controller
{

public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('company:id');
    }

    public function companyHome($id)
{
  $userID = Auth::user()->id;
  $user = User::find($userID);
     $tasks_status1=DB::table('dot_tasks')->where([
  ['status', '=', '1'],
  ['responsible_id', '=', $userID],
  ['company_id', '=', $id],
    ])->orWhere([
  ['status', '=', '1'],
  ['author_id', '=', $userID],
  ['company_id', '=', $id],
    ])->get();
 $tasks_status2=DB::table('dot_tasks')->where([
  ['status', '=', '2'],
  ['responsible_id', '=', $userID],
  ['company_id', '=', $id],
    ])->orWhere([
  ['status', '=', '2'],
  ['author_id', '=', $userID],
  ['company_id', '=', $id],
    ])->get();
  $tasks_status3=DB::table('dot_tasks')->where([
  ['status', '=', '3'],
  ['responsible_id', '=', $userID],
  ['company_id', '=', $id],
    ])->orWhere([
  ['status', '=', '3'],
  ['author_id', '=', $userID],
  ['company_id', '=', $id],
    ])->get();
   $tasks_status4=DB::table('dot_tasks')->where([
  ['status', '=', '4'],
  ['responsible_id', '=', $userID],
  ['company_id', '=', $id],
    ])->orWhere([
  ['status', '=', '4'],
  ['author_id', '=', $userID],
  ['company_id', '=', $id],
    ])->get();
    $tasks_status5=DB::table('dot_tasks')->where([
  ['status', '=', '5'],
  ['responsible_id', '=', $userID],
  ['company_id', '=', $id],
    ])->orWhere([
  ['status', '=', '5'],
  ['author_id', '=', $userID],
  ['company_id', '=', $id],
    ])->get();
  $company=Company::find($id);
    if($company->chart_data=="0"){
        $dateData='';
        $valueData='';
    }elseif(isset($company->chart_data)) {
        $dateData = '';
        $valueData = '';
            $chartData = unserialize($company->chart_data);
            foreach ($chartData as $date) {
                if ($dateData == '') {
                    $dateData = '"' . $date['date'] . '"';
                } else {
                    $dateData = $dateData . ', "' . $date['date'] . '"';
                }
            }
            foreach ($chartData as $value) {
                if ($valueData == '') {
                    $valueData = $value['value'];
                } else {
                    $valueData = $valueData . ', ' . $value['value'];
                }
            }
            substr($dateData, 2);
    }
    else{
        $dateData="";
        $valueData="";
    }
    $nowMdel =new DateTime('now');
    $now=$nowMdel->format('Y-m-d');
    //проверяем: есть ли компании с $ID, в которых зарегистрирован пользователь.
    $mainDots=$company->dots->where('parent_id','=', '0');
    return view('companyIndex', compact($company))->with([
        'company'=>$company,
        'mainDots'=>$mainDots,
        'tasks_status1'=>$tasks_status1,
        'tasks_status2'=>$tasks_status2,
        'tasks_status3'=>$tasks_status3,
        'tasks_status4'=>$tasks_status4,
        'tasks_status5'=>$tasks_status5,
        'user'=>$user,
        'valueData'=>$valueData,
        'dateData'=>$dateData,
        'now'=>$now,
    ]);

}

    /**
     * Возвращает главную страницу любой точки
     * @param $id - айдишник компании
     * @param $dotId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dotIndex($id, $dotId)
{

    $userID = Auth::user()->id;
    $user = User::find($userID);
    $dot=Dot::find($dotId);
    $company=Company::find($id);
    $childs=$company->dots->where('parent_id','=', $dotId);
    $companyCharts=$company->charts;

    if (isset($dot->chart)) {
        $dotChart = $dot->chart;
        $dateData = '';
        $valueData = '';
        if ($dotChart->data != "0") {
            $chartData = unserialize($dotChart->data);
            foreach ($chartData as $date) {
                if ($dateData == '') {
                    $dateData = '"' . $date['date'] . '"';
                } else {
                    $dateData = $dateData . ', "' . $date['date'] . '"';
                }
            }
            foreach ($chartData as $value) {
                if ($valueData == '') {
                    $valueData = $value['value'];
                } else {
                    $valueData = $valueData . ', ' . $value['value'];
                }

            }
            substr($dateData, 2);
        }
    }
     else{
     $dateData="";
     $valueData="";
     $dotChart="";
    }
//выбираем задачи по статусам
    $tasks_status1=DB::table('dot_tasks')->where([
  ['status', '=', '1'],
  ['dot_id', '=', $dotId],
  ['company_id', '=', $id],
])->get();
  $tasks_status2=DB::table('dot_tasks')->where([
  ['status', '=', '2'],
  ['dot_id', '=', $dotId],
  ['company_id', '=', $id],
])->get();
    $tasks_status3=DB::table('dot_tasks')->where([
  ['status', '=', '3'],
  ['dot_id', '=', $dotId],
  ['company_id', '=', $id],
])->get();
    $tasks_status4=DB::table('dot_tasks')->where([
  ['status', '=', '4'],
  ['dot_id', '=', $dotId],
  ['company_id', '=', $id],
])->get();
    $tasks_status5=DB::table('dot_tasks')->where([
  ['status', '=', '5'],
  ['dot_id', '=', $dotId],
  ['company_id', '=', $id],
])->get();
        $nowMdel =new DateTime('now');
        $now=$nowMdel->format('Y-m-d');
    return view('dotIndex', compact($company, $dot))->with([
        'company'=>$company,
        'dot'=>$dot,
        'childs'=>$childs,
        'tasks_status1'=>$tasks_status1,
        'tasks_status2'=>$tasks_status2,
        'tasks_status3'=>$tasks_status3,
        'tasks_status4'=>$tasks_status4,
        'tasks_status5'=>$tasks_status5,
        'user'=>$user,
        'dateData'=>$dateData,
        'valueData' =>$valueData,
        'companyCharts'=>$companyCharts,
        'dotChart'=>$dotChart,
        'now'=>$now,
         ]);
    
}

}
