<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoUmRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoUmTransformer;

class BlocoUmController extends ApiController
{
    protected $repository;

    protected $apiController;

    public function __construct(BlocoUmRepositoryEloquent $repository, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
    }

    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new BlocoUmTransformer());
    }

    public function find(){

        $paginator = $this->repository->skipPresenter()->paginate(4);

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new BlocoUmTransformer());

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
