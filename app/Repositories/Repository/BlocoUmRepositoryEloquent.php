<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Rossina\Repositories\Interfaces\BlocoUmRepository;
use Rossina\BlocoUm;

/**
 * Class BlocoUmRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoUmRepositoryEloquent extends BaseRepository implements BlocoUmRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlocoUm::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
