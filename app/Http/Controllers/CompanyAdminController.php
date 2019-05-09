<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use App\User;

class CompanyAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('company:id');
        $this->middleware('companyAdmin:id');
    }

    /**
     * выводит список пользователей, подавших заявку на вступление в компанию
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function userRequest(Request $request, $id)
    {
        $company=Company::find($id);
        return view('userRequest')->with([
            'company'=>$company,
        ]);
    }

    public function acceptUserRequest(Request $request){
        $reqArray=$request->all();
        $user=User::find($reqArray['user_id']);
        $user->rqcompanies()->detach($reqArray['company_id']);
        $user->companies()->attach($reqArray['company_id']);
    }
}
