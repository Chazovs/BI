<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Idea;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Image;
use App\Company;
use Auth;
use App\User;
use DB;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $companies = $user->companies()->paginate(12);
        $myC = 'disabled';
        $allC = '';
        $cardButton = false;
        return view('home')->with(['companies' => $companies,
            'my_c' => $myC,
            'allC' => $allC,
            'user' => $user,
            'cardButton' => $cardButton,
        ]);

    }

// показывает все компании
    public function all()
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $myC = '';//деактивирует кнопку компании
        $allC = 'disabled';
        $cardButton = true;
        $companies = Company::paginate(12);
        return view('home', compact($companies))->with([
            'companies' => $companies,
            'user' => $user,
            'my_c' => $myC,
            'allC' => $allC,
            'cardButton' => $cardButton,
        ]);
    }

    public function editProfile($id)
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        return view('editprofile')->with([
            'user' => $user,
        ]);
    }

    public function profile($id)
    {
        /*$userID = Auth::user()->id;*/
        $user = User::find($id);
        return view('profile')->with([
            'user' => $user,
        ]);
    }

    public function allTasks($id)
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $allCompanies = $user->companies()->get();
        $tasks_status1 = DB::table('dot_tasks')->where([
            ['status', '=', '1'],
            ['responsible_id', '=', $userID],
        ])->orWhere([
            ['status', '=', '1'],
            ['author_id', '=', $userID],
        ])->get();
        $tasks_status2 = DB::table('dot_tasks')->where([
            ['status', '=', '2'],
            ['responsible_id', '=', $userID],
        ])->orWhere([
            ['status', '=', '2'],
            ['author_id', '=', $userID],
        ])->get();
        $tasks_status3 = DB::table('dot_tasks')->where([
            ['status', '=', '3'],
            ['responsible_id', '=', $userID],
        ])->orWhere([
            ['status', '=', '3'],
            ['author_id', '=', $userID],
        ])->get();
        $tasks_status4 = DB::table('dot_tasks')->where([
            ['status', '=', '4'],
            ['responsible_id', '=', $userID],
        ])->orWhere([
            ['status', '=', '4'],
            ['author_id', '=', $userID],
        ])->get();
        $tasks_status5 = DB::table('dot_tasks')->where([
            ['status', '=', '5'],
            ['responsible_id', '=', $userID],
        ])->orWhere([
            ['status', '=', '5'],
            ['author_id', '=', $userID],
        ])->get();
        $nowMdel =new DateTime('now');
        $now=$nowMdel->format('Y-m-d');

        return view('allTasks')->with([
            'user' => $user,
            'allCompanies' => $allCompanies,
            'tasks_status1' => $tasks_status1,
            'tasks_status2' => $tasks_status2,
            'tasks_status3' => $tasks_status3,
            'tasks_status4' => $tasks_status4,
            'tasks_status5' => $tasks_status5,
            'now'=>$now,
        ]);
    }


    public function about()
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        return view('about')->with([
            'user' => $user,
        ]);
    }

    public function registerCompany()
    {
        return view('registerCompany');
    }


    /**
     * Регистрирует новую компанию
     * @param Request $request список полей новой компании
     * @return [type]       возвращает страницу мои компании
     */
    public function pushRegisterCompany(Request $request)
    {

        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'front_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ]);
        $reqArray = $request->all();
        if (isset($request['front_image'])) {
            $frontImage = Image::make($request->file('front_image'))->heighten(225)->crop(348, 225)->encode('png')->fill(public_path() . '/img/main/shadow.png');
            $frontImagePath = public_path() . "/companies/front/";
            $frontImage->save($frontImagePath . str_random(20) . ".png");
            $reqArray['front_image'] = "/companies/front/" . $frontImage->basename;
        } else {
            $rundomImage = rand(1, 10);
            $reqArray['front_image'] = url("/img/main/" . $rundomImage . ".png");
        }
        $path = public_path() . "/companies/logo/";
        $img = Image::make($request->file('logo'))->heighten(100)->encode('png');
        $img->save($path . str_random(10) . str_random(10) . ".png");
        $reqArray['logo'] = "/companies/logo/" . $img->basename;
        $reqArray['chart_data']="0";
        $newCompany = new Company;
        $newCompany->fill($reqArray);
        $newCompany->save();
        User::find($newCompany->admin_id)->companies()->attach($newCompany->id);
        return redirect()->route('companyHome', ['id' => $newCompany->id])->with('alert', 'Ваша компания добавлена!Спасибо за участие в проекте!');
    }


    /*'<strong class="text-primary"> Ж</strong>:{{count($companyModel->dots_tasks->where("status", 1))}} <strong class="text-warning"> Р</strong>:{{count($companyModel->dots_tasks->where(\"status\", 2))}} <strong class=\"text-success\"> С</strong>:{{count($companyModel->dots_tasks->where(\"status\", 3))}} <strong class=\"text-danger\">Ф</strong>:{{count($companyModel->dots_tasks->where(\"status\", 4))}} <strong class=\"text-dark\"> О</strong>:{{count($companyModel->dots_tasks->where(\"status\", 5))}}'*/


    /**
     * показывает дерево точек компании, принимает айдишник компании, для которой строится дерево.
     * Содержит рекурсивную функцию recursiveDotAdd
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tree($id)
    {
        $companyModel = Company::find($id);
        $allDots = $companyModel->dots;
        $nowMdel =new DateTime('now');
        $now=$nowMdel->format('Y-m-d');

        //вызывает рекурсию, создающую дерево точек
        /**
         * @param $child -содержит модель отцовской точки
         * @param $allDots - модели всех точек, относящихся к компании
         * @param $id - айдишник компании, для которой строится карта
         * @param $companyModel - модель компании, к которой принадлежат все точки, найденная по $id
         */
        function recursiveDotAdd($parent, $allDots, $id, $companyModel)
        {
            $nowMdel =new DateTime('now');
            $now=$nowMdel->format('Y-m-d');
            $dataChild = null;

            //перебираем все точки, в которых в качестве родительской точки указана точка для которой запущена функция
            foreach ($allDots->where('parent_id', $parent->id) as $child) {
                //если за точкой вообще закреплен график
                if ($child->chart_id != '0' && isset($child->chart->id)) {
                    $Chart = Chart::find($child->chart->id);
                //если в графике есть информация
                    if ($Chart->data != '0') {
                        $dataArray = unserialize($Chart->data);
                        //первое значение
                        $startDataArray = $dataArray[0]['value'];
                        //последнее значение
                        $endDataArray = end($dataArray);
                        $endData = $endDataArray['value'];
                            //считаем среднее значение
                        $summZnachen=0;
                        if(count($dataArray)>2){
                            foreach ($dataArray as $znachenArray) {
                                $summZnachen=$summZnachen+$znachenArray['value'];
                            }
                            $sredZnachen=($summZnachen-$endDataArray['value'])/(count($dataArray)-1);
                        }elseif (count($dataArray)==2 || count($dataArray)==1){
                            $sredZnachen=$dataArray[0]['value'];
                        }
                        //повышение или понижение считается успехом?
                        if ($Chart->up_or_down == 'up') {
                            $up = 'success';
                            $down = 'danger';
                        } else {
                            $up = 'danger';
                            $down = 'success';
                        };
                        //считаем процент сравнивая последний и первый элементы
                        if ($sredZnachen > $endData) {
                            //если первое значание массива больше последнего
                            $percent = 100 - round($endData / ($sredZnachen / 100));
                            $arrow = '<br>Сред. <span class="text-' . $down . '">↓' . $percent . '% </span>';
                        } elseif ($sredZnachen == $endData) {
                            $arrow = '<br>Сред. <span class="text-dark">=</span>';
                        } elseif ($sredZnachen < $endData) {
                            $percent = round($endData / ($sredZnachen / 100)) - 100;
                            $arrow = '<br>Сред. <span class="text-' . $up . '">↑' . $percent . '% </span>';
                        }
                        //если у массива вообще есть предпоследнее значение
                        if (count($dataArray) - 2 >= 0) {
                            $preendDataArray = $dataArray[count($dataArray) - 2]['value'];

                        //считаем проценты сравнивая последний и предпоследний
                        if ($preendDataArray > $endData) {
                            //если первое значание массива больше последнего
                            $percent2 = 100 - round($endData / ($preendDataArray / 100));
                            $arrow2 = ' <br>Посл. <span class="text-' . $down . '">↓' . $percent2 . '% </span>';
                        } elseif ($preendDataArray == $endData) {
                            $arrow2 = ' <br>Посл. <span class="text-dark">=</span>';
                        } elseif ($preendDataArray < $endData) {
                            $percent2 = round($endData / ($preendDataArray / 100)) - 100;
                            $arrow2 = ' <br>Посл. <span class="text-' . $up . '">↑' . $percent2 . '% </span>';
                        }
                        }
                        else {
                            $arrow = '';
                            $arrow2 = '';
                        }
                    }else {
                        $arrow = '';
                        $arrow2 = '';
                    }
                } else {
                    $arrow = '';
                     $arrow2 = '';
                }
                if (!isset($dataChild)) {
                    $dataChild = "{ head: '<a href=\'" . route("dotIndex", ['id' => $companyModel->id, 'dotId' => $child->id]) . "\'>" . $child->name . "</a>', id: '" . $child->id . "',
                        contents: '<strong class=\"text-primary\">" .
                        count($child->dots_tasks->where('status', 1)) .
                        "</strong> <strong class=\"text-warning\">" .
                        count($child->dots_tasks->where('status', 2)) .
                        "</strong> <strong class=\"text-success\">" .
                        count($child->dots_tasks->where('status', 3)) .
                        "</strong>  <strong class=\"text-danger\">" .
                        count($child->dots_tasks->where('status', 4)) .
                        "</strong>  <strong class=\"text-dark\">" .
                        count($child->dots_tasks->where('status', 5)) .
                        "</strong> <br>Дэдлайн: <strong class=\"text-dark\">" .
                        count($child->dots_tasks->where('deadline', '<', $now)) .
                        "</strong>" .
                        $arrow.$arrow2 .
                        " '," .
                        recursiveDotAdd($child, $allDots, $id, $companyModel) . " }";
                } else {
                    $dataChild = $dataChild . ", { head: '<a href=\'" . route("dotIndex", ['id' => $companyModel->id, 'dotId' => $child->id]) . "\'>" . $child->name . "</a>', id: '" . $child->id . "',
 contents: '<strong class=\"text-primary\">" .
                        count($child->dots_tasks->where('status', 1)) .
                        "</strong> <strong class=\"text-warning\">" .
                        count($child->dots_tasks->where('status', 2)) .
                        "</strong> <strong class=\"text-success\">" .
                        count($child->dots_tasks->where('status', 3)) .
                        "</strong>  <strong class=\"text-danger\">" .
                        count($child->dots_tasks->where('status', 4)) .
                        "</strong>  <strong class=\"text-dark\">" .
                        count($child->dots_tasks->where('status', 5)) .
                        "</strong> <br>Дэдлайн: <strong class=\"text-dark\">" .
                        count($child->dots_tasks->where('deadline', '<', $now)) .
                        "</strong>" . $arrow.$arrow2 . " '," .
                        recursiveDotAdd($child, $allDots, $id, $companyModel) .
                        " }";
                }
            }

            if ($dataChild != null) {
                return ("children: [" . $dataChild . "]");
            }
        }

        $allData = 2;
        // пока в коллекции есть точки, у которых нет отцовскиx точек
        //СЧИТАЕМ ГЛАВНЫЕ ТОЧКИ

        foreach ($allDots->where('parent_id', 0) as $dot) {
            //если за точкой вообще закреплен график

            if ($dot->chart_id != '0' && isset($dot->chart->id)) {
                $Chart = Chart::find($dot->chart->id);
                if ($Chart->data != '0') {
                    $dataArray = unserialize($Chart->data);
                    $startDataArray = $dataArray[0]['value'];
                    $endDataArray = end($dataArray);
                    $endData = $endDataArray['value'];

                    //считаем среднее значение
                    $summZnachen=0;

                    if(count($dataArray)>2){
                        foreach ($dataArray as $znachenArray) {
                            $summZnachen=$summZnachen+$znachenArray['value'];
                        }
                        $sredZnachen=($summZnachen-$endDataArray['value'])/(count($dataArray)-1);
                    }elseif (count($dataArray)==2 || count($dataArray)==1){
                      $sredZnachen=$dataArray[0]['value'];
                    }
                    //повышение или понижение считается успехом?
                    if ($Chart->up_or_down == 'up') {
                        $up = 'success';
                        $down = 'danger';
                    } else {
                        $up = 'danger';
                        $down = 'success';
                    };
                    if ($sredZnachen > $endData) {
                        //если первое значание массива больше последнего
                        $percent = 100 - round($endData / ($sredZnachen / 100));
                        $arrow = '<br>Сред. <span class="text-' . $down . '">↓' . $percent . '% </span>';
                    } elseif ($sredZnachen == $endData) {
                        $arrow = '<br>Сред. <span class="text-dark">=</span>';
                    } elseif ($sredZnachen < $endData) {
                        $percent = round($endData / ($sredZnachen / 100)) - 100;
                        $arrow = '<br>Сред. <span class="text-' . $up . '">↑' . $percent . '% </span>';
                    };
                    //если вообще есть предпоследнее
                    if (count($dataArray) - 2 >= 0) {
                        $preendDataArray = $dataArray[count($dataArray) - 2]['value'];
                    //считаем проценты сравнивая последний и предпоследний
                    if ($preendDataArray > $endData) {
                        //если первое значание массива больше последнего
                        $percent2 = 100 - round($endData / ($preendDataArray / 100));
                        $arrow2 = ' <br>Посл. <span class="text-' . $down . '">↓' . $percent2 . '% </span>';
                    } elseif ($preendDataArray == $endData) {
                        $arrow2 = ' <br>Посл. <span class="text-dark">=</span>';
                    } elseif ($preendDataArray < $endData) {
                        $percent2 = round($endData / ($preendDataArray / 100)) - 100;
                        $arrow2 = ' <br>Посл. <span class="text-' . $up . '">↑' . $percent2 . '% </span>';
                    }
                    }else {

                        $arrow2 = '';}
                } else {
                    $arrow = '';
                    $arrow2 = '';
                }
            } else {
                $arrow = '';
                $arrow2 = '';
            }

            if ($allData == 2) {
                $allData = "{
                            head:'<a href=\'" . route("dotIndex", ['id' => $companyModel->id, 'dotId' => $dot->id]) . "\'>" . $dot->name . "</a>',
                            id: '" . $dot->id . "',
                            contents: '<strong class=\"text-primary\">" .
                    count($dot->dots_tasks->where('status', 1)) .
                    "</strong> <strong class=\"text-warning\">" .
                    count($dot->dots_tasks->where('status', 2)) .
                    "</strong> <strong class=\"text-success\">" .
                    count($dot->dots_tasks->where('status', 3)) .
                    "</strong>  <strong class=\"text-danger\">" .
                    count($dot->dots_tasks->where('status', 4)) .
                    "</strong>  <strong class=\"text-dark\">" .
                    count($dot->dots_tasks->where('status', 5)) .
                    "</strong> <br>Дэдлайн: <strong class=\"text-dark\">" .
                    count($dot->dots_tasks->where('deadline', '<', $now)) .
                    "</strong>" .
                    $arrow. $arrow2 .
                    " ', " .
                    recursiveDotAdd($dot, $allDots, $id, $companyModel) . "
                        }";
            } else {
                $allData = $allData . ", {
                            head:'<a href=\'" . route("dotIndex", ['id' => $companyModel->id, 'dotId' => $dot->id]) . "\'>" . $dot->name . "</a>',
                            id: '" . $dot->id . "',
                            contents: '<strong class=\"text-primary\">" .
                    count($dot->dots_tasks->where('status', 1)) .
                    "</strong> <strong class=\"text-warning\">" .
                    count($dot->dots_tasks->where('status', 2)) .
                    "</strong> <strong class=\"text-success\">" .
                    count($dot->dots_tasks->where('status', 3)) .
                    "</strong>  <strong class=\"text-danger\">" .
                    count($dot->dots_tasks->where('status', 4)) .
                    "</strong>  <strong class=\"text-dark\">" .
                    count($dot->dots_tasks->where('status', 5)) .
                    "</strong> <br>Дэдлайн: <strong class=\"text-dark\">" .
                    count($dot->dots_tasks->where('deadline', '<', $now)) .
                    "</strong>" . $arrow. $arrow2 .
                    " ', " .
                    recursiveDotAdd($dot, $allDots, $id, $companyModel) . "
                        }";
            }
        }

        //вот сюда мы напишем анализ главного графика компании
        /*return $companyModel->chart_data;*/
        if ($companyModel->chart_data != '' && $companyModel->chart_data != '0') {
            $dataCompanyArray = unserialize($companyModel->chart_data);
            $startDataArray = $dataCompanyArray[0]['value'];
            $endDataArray = end($dataCompanyArray);
            $endCompanyData = $endDataArray['value'];
            //считаем среднее значение
            $summCompanyZnachen = 0;
            if (count($dataCompanyArray) > 2) {
                foreach ($dataCompanyArray as $znachenArray) {
                    $summCompanyZnachen = $summCompanyZnachen + $znachenArray['value'];

                }
                $sredZnachenCompany = ($summCompanyZnachen - $endDataArray['value']) / (count($dataCompanyArray)-1);
            } elseif (count($dataCompanyArray) == 2 || count($dataCompanyArray) == 1) {
                $sredZnachenCompany = $dataCompanyArray[0]['value'];
            }
            /*return $sredZnachenCompany;*/

            if ($sredZnachenCompany > $endCompanyData && count($dataCompanyArray)>1) {
                //если первое значание массива больше последнего
                $percent = 100 - round($endCompanyData / ($sredZnachenCompany / 100));
                $arrowCompanyGlobal = '<br>Сред. <span class="text-danger">↓' . $percent . '% </span>';
            } elseif ($sredZnachenCompany == $endCompanyData && count($dataCompanyArray)>1) {
                $arrowCompanyGlobal = '<br>Сред. <span class="text-dark">=</span>';
            } elseif ($sredZnachenCompany < $endCompanyData && count($dataCompanyArray)>1) {
                $percent = round($endCompanyData / ($sredZnachenCompany / 100)) - 100;
                $arrowCompanyGlobal = '<br>Сред. <span class="text-success">↑' . $percent . '% </span>';
            }else{
                $arrowCompanyGlobal='';
            };

            //если вообще есть предпоследнее
            if (count($dataCompanyArray) - 2 >= 0) {
                $preendDataArray = $dataCompanyArray[count($dataCompanyArray) - 2]['value'];
                $endData=$dataCompanyArray[count($dataCompanyArray) - 1]['value'];
                //считаем проценты сравнивая последний и предпоследний
                if ($preendDataArray > $endData) {
                    //если первое значание массива больше последнего
                    $percent3 = 100 - round($endCompanyData / ($preendDataArray / 100));
                    $arrowCompanyTactic = ' <br>Посл. <span class="text-danger">↓' . $percent3 . '% </span>';
                } elseif ($preendDataArray == $endCompanyData) {
                    $arrowCompanyTactic = ' <br>Посл. <span class="text-dark">=</span>';
                } elseif ($preendDataArray < $endCompanyData) {
                    $percent3 = round($endCompanyData / ($preendDataArray / 100)) - 100;
                    $arrowCompanyTactic = ' <br>Посл. <span class="text-success">↑' . $percent3 . '% </span>';
                }
            }else{
                $arrowCompanyTactic = ' ';
            };
        } else {
            $arrowCompanyGlobal = ' ';
            $arrowCompanyTactic = ' ';
        }
        //конец анализа графика компании

        return view('dottree')->with([
            'companyModel' => $companyModel,
            'allData' => $allData,
            'arrowCompanyTactic'=>$arrowCompanyTactic,
            'arrowCompanyGlobal'=>$arrowCompanyGlobal,
            'now'=>$now,
        ]);
    }

    /**
     * показывает страницу со всеми пользователями
     */
    public function usersAll(Request $request)
    {
        $users = User::paginate(20);
        $reqArray = $request->all();
        if (array_key_exists('selectedCompany', $reqArray) == false) {
            $selectedCompany = Auth::user()->companies()->where('admin_id', Auth::user()->id)->first();
        } else {
            $selectedCompany = Company::find($reqArray['selectedCompany']);
        }
        return view('allUsers')->with([
            'users' => $users,
            'selectedCompany' => $selectedCompany,
        ]);
    }


    /**
     * показывает пользователю список пригласивших его компаний
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myCompaniesInvitation()
    {
        return view('companiesInvitation');
    }


    /**
     * показываем всех пользователей  компании
     * @param $companyId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function companyUsers($companyId)
    {
        $company = Company::find($companyId);
        $users = $company->users()->paginate(20);
        return view('companyUsers')->with([
            'users' => $users,
        ]);
    }

    /**
     * показывает список идей, предложенных сообществом для конкретной компании
     * @param $companyId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function idea($companyId)
    {
        $company = Company::find($companyId);
        $ideas = $company->ideas()->paginate(2);
        return view('idea')->with([
            'ideas' => $ideas,
        ]);
    }

    /**
     * редактирует профайл пользователя
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pushEditProfile(Request $request, $userId)
    {
        $reqArray = $request->all();
        $user = User::find($userId);

        if (isset($request['avatar'])) {
            $avatar = Image::make($reqArray['avatar'])->heighten(100)->crop(100, 100)->encode('png');
            $avatarPath = public_path() . "/users/photo/";
            $avatar->save($avatarPath . str_random(20) . ".png");
            $reqArray['avatar'] = "/users/photo/" . $avatar->basename;
        }
        if (!isset($reqArray['hh'])) {
            $reqArray['hh'] = '';
        }
        if (!isset($reqArray['about'])) {
            $reqArray['about'] = '';
        }
        if (!isset($reqArray['profession'])) {
            $reqArray['profession'] = '';
        }
        if (!isset($reqArray['experience'])) {
            $reqArray['experience'] = '';
        }
        if (!isset($reqArray['city'])) {
            $reqArray['city'] = '';
        }
        $user->update($reqArray);
        return redirect()->route("profile", ["id" => $userId]);
    }


    public function companyProfile($id)
    {
        $company = Company::find($id);
        if ($company->site != "") {
            $site = parse_url($company->site);
            if(isset($site['host'])){
                $siteHost = $site['host'];
            }else{
                $siteHost='';
            }

        } else {
            $siteHost = "";
        }
        return view('companyProfile')->with([
            'company' => $company,
            'siteHost' => $siteHost,
        ]);
    }
}










