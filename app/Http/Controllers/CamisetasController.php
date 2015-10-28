<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CamisetasRepositoryEloquent;
use Rossina\Repositories\Transformers\CamisetasTransformer;
use League\Fractal\Resource\Collection;

class CamisetasController extends ApiController
{
    protected $repository;

    protected $apiController;

    public function __construct(CamisetasRepositoryEloquent $repository, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
    }

    public function index(Manager $fractal, CamisetasTransformer $camisetasTransformer)
    {
        $projects = $this->repository->with(['generos'])->all();

        $collection = new Collection($projects, $camisetasTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
