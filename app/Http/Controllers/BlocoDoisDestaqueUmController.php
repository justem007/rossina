<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoDoisDestaqueUmRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueUmTransformer;

class BlocoDoisDestaqueUmController extends ApiController
{

    /**
     * @var BlocoDoisDestaqueUmRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoDoisDestaqueUmTransformer
     */
    protected $blocoDoisDestaqueTransformer;

    public function __construct(BlocoDoisDestaqueUmRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, BlocoDoisDestaqueUmTransformer $blocoDoisDestaqueUmTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoDoisDestaqueUmTransformer = $blocoDoisDestaqueUmTransformer;
    }

    public function index()
    {
        $blocoDoisDestaqueUm = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoDoisDestaqueUm, $this->blocoDoisDestaqueUmTransformer);
    }

    public function show($id, Manager $fractal, BlocoDoisDestaqueUmTransformer $blocoDDUT)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoDDUT);

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
