<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Item;
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

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CamisetasTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, CamisetasTransformer $camisetaT)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $camisetaT);

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
