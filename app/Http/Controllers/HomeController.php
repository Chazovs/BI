<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Image;
use App\Company;
use Auth;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
    $companies=$user->companies()->paginate(1);
    $myC='disabled';
    $allC='';
    $cardButton=false;
    return view('home')->with(['companies'=> $companies,
            'my_c'=> $myC,
            'allC' => $allC,
            'user' => $user,
            'cardButton' => $cardButton,
        ]);
        
    }

    public function all()
    {
      $userID = Auth::user()->id;
    $user = User::find($userID);
        $myC='';//деактивирует кнопку компании
        $allC='disabled';
        $cardButton=true;
       $companies = Company::paginate(2);
         return view('home', compact($companies))->with([
            'companies'=> $companies,
            'user'=> $user,
            'my_c'=> $myC,
            'allC' => $allC,
            'cardButton'=>$cardButton,
        ]);
    }
  
public function idea($id)
    {
         return view('idea');
    }

    //показывает дерево точек компании
    protected function tree($id)
    {
        return view('dottree');
    }

    public function editProfile($id)
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
  return view('editprofile')->with([
            'user'=> $user, 
        ]);
    }

public function profile($id)
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
  return view('profile')->with([
            'user'=> $user, 
        ]);
    }

public function allTasks($id)
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $allCompanies = $user->companies()->get();      
 $tasks_status1=DB::table('dot_tasks')->where([
  ['status', '=', '1'],
  ['responsible_id', '=', $userID],
    ])->orWhere([
  ['status', '=', '1'],
  ['author_id', '=', $userID],
    ])->get();
 $tasks_status2=DB::table('dot_tasks')->where([
  ['status', '=', '2'],
  ['responsible_id', '=', $userID],
    ])->orWhere([
  ['status', '=', '2'],
  ['author_id', '=', $userID],
    ])->get();
  $tasks_status3=DB::table('dot_tasks')->where([
  ['status', '=', '3'],
  ['responsible_id', '=', $userID],
    ])->orWhere([
  ['status', '=', '3'],
  ['author_id', '=', $userID],
    ])->get();
   $tasks_status4=DB::table('dot_tasks')->where([
  ['status', '=', '4'],
  ['responsible_id', '=', $userID],
    ])->orWhere([
  ['status', '=', '4'],
  ['author_id', '=', $userID],
    ])->get();
    $tasks_status5=DB::table('dot_tasks')->where([
  ['status', '=', '5'],
  ['responsible_id', '=', $userID],
    ])->orWhere([
  ['status', '=', '5'],
  ['author_id', '=', $userID],
    ])->get();

  return view('allTasks')->with([
            'user'=> $user,
            'allCompanies'=> $allCompanies,
            'tasks_status1'=>$tasks_status1,
            'tasks_status2'=>$tasks_status2,
            'tasks_status3'=>$tasks_status3,
            'tasks_status4'=>$tasks_status4,
            'tasks_status5'=>$tasks_status5,
        ]);
    }


public function about()
 {
        $userID = Auth::user()->id;
        $user = User::find($userID);
  return view('about')->with([
            'user'=> $user,
          ]);
 }

public function registerCompany()
 {
  return view('registerCompany');
 }


/**
 * Регистрирует новую компанию
 * @param  Request $request список полей новой компании
 * @return [type]       возвращает страницу мои компании
 */
public function pushRegisterCompany(Request $request)
{

$this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
$path = public_path()."\companies\logo\\";   
$img = Image::make($request->file('logo'))->heighten(100)->encode('png');
$img->save($path . str_random(10) . str_random(10) . ".png");
$reqArray = $request->all();
$reqArray['logo'] = "companies\logo\\".$img->basename;
$newCompany = new Company;
$newCompany->fill($reqArray);
$newCompany->save();
User::find($newCompany->admin_id)->companies()->attach($newCompany->id);
return redirect()->route('companyHome', ['id' => $newCompany->id])->with('alert', 'Ваша компания добавлена!Спасибо за участие в проекте!');
}
}
