<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;


class BlocoUm extends Model implements Transformable, Presentable
{
    use PresentableTrait;
    use TransformableTrait;

    protected $fillable = ['title', 'sub_title', 'alt', 'user_id'];

    public function transform()
    {
        return [
            'id'         => (int) $this->id,
            'title'      =>$this->title,
            'sub_title'  =>$this->sub_title,
            'alt'        =>$this->alt,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
