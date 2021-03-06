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
        $model = $model->select('id','text','name', 'email','active','post_id','created_at','updated_at')->active()->orderBy('id', 'asc')->get();

        return $model;
    }
}