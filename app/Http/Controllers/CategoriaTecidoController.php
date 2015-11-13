<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CategoriaTecidoRepositoryEloquent;
use Rossina\Repositories\Transformers\CategoriaTecidoTransformer;

class CategoriaTecidoController extends ApiController
{
    /**
     * @var CategoriaTecidoRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var CategoriaTecidoTransformer
     */
    protected $categoriaTecidoTransformer;

    public function __construct(CategoriaTecidoRepositoryEloquent $repository, ApiController $apiController,
                                CategoriatecidoTransformer $categoriaTecidoTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->categoriaTecidoTransformer = $categoriaTecidoTransformer;
    }

    public function index(Manager $fractal)
    {
        $categoriaTecido = $this->repository->with(['tecidos'])->all();

        $collection = new Collection($categoriaTecido, $this->categoriaTecidoTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CategoriaTecidoTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, CategoriaTecidoTransformer $categoriaTecido)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $categoriaTecido);

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
