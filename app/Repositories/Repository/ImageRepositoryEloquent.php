<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\ImageRepository;
use Rossina\Image;
use Rossina\Repositories\Presenters\ImagePresenter;

/**
 * Class ImageRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class ImageRepositoryEloquent extends BaseRepository implements ImageRepository
{
    protected $presenter = ImagePresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return Image::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){

        return ModelFractalPresenter::class;

    }
}
