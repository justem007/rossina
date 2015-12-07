<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 21/10/15
 * Time: 15:08
 */

namespace Rossina\Repositories\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class CamisetaCriteria implements  CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
//        $model = $model->whereNotBetween('id', [2, 7]);
        $model = $model->orderBy('id', 'asc');

        return $model;

    }
}