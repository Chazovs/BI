<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use App\User;
use Image;

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

    /**
     * Принимает запрос пользователя на добавление в компанию
     * @param Request $request
     */
    public function acceptUserRequest(Request $request){
        $reqArray=$request->all();
        $user=User::find($reqArray['user_id']);
        $user->rqcompanies()->detach($reqArray['company_id']);
        $user->companies()->attach($reqArray['company_id']);
    }

    /**
     * Открывает страницу редактирования компании
     */
    public function companyEdit($id){
        $company=Company::find($id);
        return view('editCompany')->with([
            'company'=>$company,
        ]);
    }

    /**
     * вносит новые данные о компании в таблицу
     */
    public function companyEditPush(Request $request, $companyId){


        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'front_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ]);

        $reqArray=$request->all();

        if(isset($request['front_image'])){
            $frontImage = Image::make($request->file('front_image'))->heighten(225)->crop(348, 225)->encode('png')->fill(public_path().'/img/main/shadow.png');
            $frontImagePath=public_path() ."/companies/front/";
            $frontImage->save($frontImagePath . str_random(20). ".png");
            $reqArray['front_image'] = "/companies/front/".$frontImage->basename;
        }else{
            $rundomImage=rand ( 1, 10);
            $reqArray['front_image']=url("/img/main/".$rundomImage.".png");
        }
        if(isset($request['logo'])) {
            $path = public_path() . "\companies\logo\\";
            $img = Image::make($request->file('logo'))->heighten(100)->encode('png');
            $img->save($path . str_random(10) . str_random(10) . ".png");
            $reqArray['logo'] = "companies\logo\\" . $img->basename;
        }else{$reqArray['logo']=url("/img/default/dot.png");}
        if(!isset($request['site'])) {$reqArray['site']="";}
        if(!isset($request['city'])) {$reqArray['city']="";}
        if(!isset($request['slogan'])) {$reqArray['slogan']="";}
        if(!isset($request['adress'])) {$reqArray['adress']="";}
        if(!isset($request['phone'])) {$reqArray['phone']="";}
        if(!isset($request['about'])) {$reqArray['about']="";}
        if(!isset($request['description'])) {$reqArray['description']="";}
        $company = Company::find($companyId);
        $company->fill($reqArray);
        $company->update();
        return redirect()->route('companyProfile', ['companyId' => $company->id]);
    }
}
