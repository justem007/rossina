<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Prettus\Repository\Traits\PresentableTrait;

class BlocoDoisDestaque extends Model implements Presentable
{
    use PresentableTrait;

    protected $fillable = ['title', 'sub_title', 'alt', 'user_id'];

    public function presenter()
    {
        return ModelFractalPresenter::class;
    }

    public function getCreatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }
    public function getUpdatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }

}
