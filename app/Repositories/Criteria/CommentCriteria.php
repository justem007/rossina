<?php

namespace Rossina\Repositories\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class CommentCriteria implements CriteriaInterface {

    /**
     * Apply criteria in query repository
     *
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
//        $query = $model->whereNotBetween('id', [2, 7]);
        $query = $model->orderBy('text', 'asc');

        return $query;
    }
}