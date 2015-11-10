<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\MenuRepositoryEloquent;
use Rossina\Repositories\Transformers\MenuTransformer;

class MenuController extends ApiController
{

    /**
     * @var MenuRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var MenuTransformer
     */
    protected $menuTransformer;

    public function __construct(MenuRepositoryEloquent $repository, ApiController $apiController,
                                 Manager $fractal, MenuTransformer $menuTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->menuTransformer = $menuTransformer;
    }

    public function index()
    {
        $menu = $this->repository->all();

        return $this->apiController->respondWithCollection($menu, $this->menuTransformer);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new MenuTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, MenuTransformer $menu)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $menu);

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
