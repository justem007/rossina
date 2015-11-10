<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\FerramentaRepositoryEloquent;
use Rossina\Repositories\Transformers\FerramentaTransformer;

class FerramentaController extends ApiController
{
    protected $repository;

    protected $apiController;

    protected $fractal;

    protected $ferramentaTransformer;

    public function __construct(FerramentaRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, FerramentaTransformer $ferramentaTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->ferramentaTransformer = $ferramentaTransformer;
    }

    public function index()
    {
        $repository = $this->repository->with(['images'])->all();

        $collection = new Collection($repository, $this->ferramentaTransformer);

        $data = $this->fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new FerramentaTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, FerramentaTransformer $ferramenta)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $ferramenta);

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
