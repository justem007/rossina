<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Interfaces\BlocoTecidoRepository;
use Rossina\Repositories\Repository\BlocoTecidoRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoTecidoTransformer;

class BlocoTecidoController extends ApiController
{

    /**
     * @var BlocoTecidoRepository
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoTecidoTransformer
     */
    protected $blocoTecidoTransformer;

    protected $fractal;

    public function __construct(BlocoTecidoRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, BlocoTecidoTransformer $blocoTecidoTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoTecidoTransformer = $blocoTecidoTransformer;
    }

    public function index()
    {
        $blocoTecido = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoTecido, $this->blocoTecidoTransformer);
    }

    public function show($id, Manager $fractal, BlocoTecidoTransformer $blocoTT)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoTT);

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
