<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;



class BlocoDoisDestaque extends Model implements Presentable
{
    use PresentableTrait;

//    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    protected $fillable = ['title', 'sub_title', 'alt', 'user_id'];

}
