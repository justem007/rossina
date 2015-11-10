<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\HorarioRepositoryEloquent;
use Rossina\Repositories\Transformers\HorarioTransformer;

class HorarioController extends ApiController
{

    /**
     * @var HorarioRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var HorarioTransformer
     */
    protected $horarioTransformer;

    public function __construct(HorarioRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, HorarioTransformer $horarioTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->horarioTransformer = $horarioTransformer;
    }

    public function index()
    {
        $horario = $this->repository->all();

        return $this->apiController->respondWithCollection($horario, $this->horarioTransformer);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new horarioTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, HorarioTransformer $horario)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $horario);

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
