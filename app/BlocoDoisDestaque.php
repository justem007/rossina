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

}
