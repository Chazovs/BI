<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

protected $fillable = [
        'name', 'admin_id', 'description', 'city', 'logo', 'adress', 'phone', 'site', 'front_image', 'slogan',
    ];

//у компании может быть много заявок от пользователей на участие в компании
    public function rqusers()
    {
        return $this->belongsToMany('App\User', 'rqcompanies_rqusers', company_id, user_id);
    }


//у компании может быть много пользователей
public function users()
    {
        return $this->belongsToMany('App\User', 'companies_users');
    }

//у компании может быть много идей
public function ideas()
    {
        return $this->hasMany('App\Idea');
    }

//у компании множество точек
public function dots()
    {
        return $this->hasMany('App\Dot');
    }

// у компании может быть много таблиц
    public function charts()
    {
        return $this->hasMany('App\Chart');
    }
//у компании может быть много задач
     public function dots_tasks()
    {
        return $this->hasMany('App\Dot_task');
    }
}
