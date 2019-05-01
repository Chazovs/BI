<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{

	protected $fillable = [
        'title', 'description', 'y_name', 'up_or_down', 'company_id', 'data',
    ];

	//у графика может быть только одна компания
    public function company()
    {
        return $this->belongsTo('App\Сompany');
    }


//у графика может быть несколько точек
public function dots()
    {
        return $this->hasMany('App\Dot');
    }
}
