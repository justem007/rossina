<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Rossina\Repositories\Interfaces\BlocoUmDestaqueRepository;
use Rossina\BlocoUmDestaque;

/**
 * Class BlocoUmDestaqueRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoUmDestaqueRepositoryEloquent extends BaseRepository implements BlocoUmDestaqueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlocoUmDestaque::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
