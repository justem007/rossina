<?php

namespace Rossina\Repositories\Criteria;

use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class PostCriteria implements  CriteriaInterface {

    /**
     * Apply criteria in query repository
     *
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */

    public function apply($model, RepositoryInterface $repository)
    {
//
//
//        $model = $model
//            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
//            ->where('user_id', '=', 2)
//            ->get();
        $model = $model->orderBy('id', 'asc');
        return $model;

    }
}