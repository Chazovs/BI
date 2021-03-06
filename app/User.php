<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'real_name', 'real_lastname', 'avatar', 'look_for_work', 'hh', 'experience', 'profession', 'about', 'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//пользователь может может иметь приглашения от разных компаний
    public function incompanies()
    {
        return $this->belongsToMany('App\Company', 'incompany_inuser', 'user_id', 'company_id');
    }

//пользователь может подать заявку на участие в нескольких компаниях
    public function rqcompanies()
    {
        return $this->belongsToMany('App\Company', 'rqcompany_rquser', 'user_id', 'company_id');
    }

    //пользователь может состоять в нескольких компаниях
    public function companies()
    {
        return $this->belongsToMany('App\Company', 'companies_users');
    }

    //у пользователя может быть много идей
    public function ideas()
    {
        return $this->hasMany('App\Idea');
    }

//пользователь может быть автором многих задач
      public function authors()
    {
        return $this->hasMany('App\Dot_tasks', 'author_id');
    }

    //пользователь может быть ответственным по многим задачам
      public function responsibles()
    {
        return $this->hasMany('App\Dot_tasks', 'responsible_id');
    }
}
