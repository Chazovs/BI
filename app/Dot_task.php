<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dot_task extends Model
{
   /*  protected $fillable = ['from_user_id'];*/

protected $fillable = [
        'name', 'problem', 'description', 'deadline', 'company_id', 'author_id', 'responsible_id', 'dot_id', 'status',
    ];

    //у каждой задачи лишь одна точка
     public function dot()
    {
        return $this->belongsTo('App\Dot');
    }

    //у задачи всегда только одна компания
     public function company()
    {
        return $this->belongsTo('App\Company');
    }

    // у задачи может быть только один ответственны
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    // у задачи только один постановщик
    public function responsible()
    {
        return $this->belongsTo('App\User', 'responsible_id');
    }

}
