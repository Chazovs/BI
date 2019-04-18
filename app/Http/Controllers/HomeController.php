<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
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
    return view('home')->with(['companies'=> $companies,
            'my_c'=> $myC,
            'allC' => $allC,
            'user' => $user,
        ]);
        
    }

    public function all()
    {
      $userID = Auth::user()->id;
    $user = User::find($userID);
        $myC='';//деактивирует кнопку компании
        $allC='disabled';
       $companies = Company::paginate(2);
         return view('home', compact($companies))->with([
            'companies'=> $companies,
            'user'=> $user,
            'my_c'=> $myC,
            'allC' => $allC
        ]);
    }
  
/*public function companyHome($id) коммент
{

    //проверяем: есть ли компании с $ID, в которых зарегистрирован пользователь.
$userID  = Auth::user()->id;
$userModel = User::find($userID);
$postsHasMany = $userModel->companies();
$companies = $postsHasMany->where('id','like',$id)->count();

  
if (!$companies){
    return view('idea');
}
else{
    $company=Company::find($id);
    return view('companyIndex', compact($company))->with([
        'company'=>$company
    ]);
    }
}*/

public function idea($id)
    {
         return view('idea');
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

public function pushRegisterCompany(Request $request)
{

/*$this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/
        dump($request);
       /* $path = $request['logo']->store('public/img');*/
$reqArray = $request->all();
/*$file=$request->file('logo')->store('logo');
$file=Storage::size($file);*/

if($request->hasFile('logo'))
        {
            
            // Get user avatar image request
            $image = $request->file('logo');
            $extension = $image->getClientOriginalExtension();

            // Resize image user avatar
            $size = \Config::get('image.avatar_size');
            $avatar = Image::make($image)->fit($size)->encode($extension);

            // Save user avatar image
            $path = "/logo.' . $extension";
           
            Storage::disk('local')->put($path, $avatar);
           $reqArray['logo'] = $path;
           

        }



$dot_task = new Company;
$dot_task->fill($reqArray);
$dot_task->save();

}
}
