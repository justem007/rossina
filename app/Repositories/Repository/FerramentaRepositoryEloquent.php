<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Rossina\Ferramenta;
use Rossina\Repositories;
use Rossina\Repositories\Interfaces\FerramentaRepository;


/**
 * Class FerramentaRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class FerramentaRepositoryEloquent extends BaseRepository implements FerramentaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ferramenta::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
