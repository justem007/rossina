<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\StatusProducaoRepositoryEloquent as StatusPRE;
use Rossina\Repositories\Transformers\StatusProducaoTransformer as StatusPT;
use Rossina\Repositories\Transformers\StatusProducaoTransformer;

class StatusProducaoController extends ApiController
{
    protected $repository;

    protected $apiController;

    protected $fractal;

    protected $status;

    public function __construct(StatusPRE $repository, ApiController $apiController,
                                Manager $fractal, StatusPT $status)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->status = $status;
    }

    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new StatusProducaoTransformer);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new StatusProducaoTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, StatusProducaoTransformer $status)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $status);

        $data = $fractal->createData($item)->toArray();

        if (!$data) {
            return $this->errorNotFound('Você inventou um ID e tentou carregar um local? Idiota.');
        }

        return $this->respond($data);
    }

    public function find($id, $columns = array('*'))
    {

        $repository = $this->repository->find($id, $columns = array('id', 'title', 'text'));

        return $repository;

    }

    public function create()
    {

        $repository = $this->repository->create( Input::all() );

        return $repository;
    }

    public function update($id)
    {

        $repository = $this->repository->update( Input::all(), $id );

        return $repository;

    }

    public function delete($id)
    {

        $repository = $this->repository->find($id)->delete();

        return redirect()->route('posts');

    }
}
