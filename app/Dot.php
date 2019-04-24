<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dot extends Model
{

    protected $fillable = [
        'name', 'parent_id', 'logo', 'description_full', 'description_short', 'author', 'company_id', 'chart_id',
    ];

	//у нескольких точек может быть одна компания
   public function company()
    {
        return $this->belongsTo('App\Сompany');
    }
//только один график может быть у точки
     public function chart()
    {
        return $this->belongsTo('App\Chart');
    }


   //у каждой точки может быть несколько задач
    public function dots_tasks()
    {
        return $this->hasMany('App\Dot_task');
    }
}


