<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoTecidoDestaqueRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoTecidoDestaqueTransformer;

class BlocoTecidoDestaqueController extends ApiController
{

    /**
     * @var BlocoTecidoDestaqueRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoTecidoDestaqueTransformer
     */
    protected $blocoTecidoDestaqueTransformer;

    protected $fractal;

    public function __construct(BlocoTecidoDestaqueRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, BlocoTecidoDestaqueTransformer $blocoTecidoDestaqueTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoTecidoDestaqueTransformer = $blocoTecidoDestaqueTransformer;
    }

    public function index()
    {
        $blocoTecidoDestaque = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoTecidoDestaque, $this->blocoTecidoDestaqueTransformer);
    }

    public function show($id, Manager $fractal, BlocoTecidoDestaqueTransformer $blocoTDT)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoTDT);

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
