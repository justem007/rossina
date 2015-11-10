<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoDoisDestaqueRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueTransformer;

class BlocoDoisDestaqueController extends ApiController
{
    protected $apiController;
    protected $repository;

    public function __construct(ApiController $apiController, BlocoDoisDestaqueRepositoryEloquent $repository){
        $this->apiController = $apiController;
        $this->repository = $repository;
    }

    public function index()
    {
        $bloco = $this->repository->all();

        return $this->apiController->respondWithCollection($bloco, new BlocoDoisDestaqueTransformer());
    }

    public function show($id, Manager $fractal, BlocoDoisDestaqueTransformer $projectTransformer)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $projectTransformer);

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

        $repository = $this->repository->create( Input::all() ); return $repository; }

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
