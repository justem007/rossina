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
//        $model = $model->whereNotBetween('id', [2, 7]);
        $model = $model->orderBy('id', 'asc');

        return $model;
    }
}