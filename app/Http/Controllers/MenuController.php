<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Http\Requests;
use Rossina\Menu;
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
    /**
     * @var Menu
     */
    protected $menu;

    public function __construct(MenuRepositoryEloquent $repository,Menu $menu ,ApiController $apiController,
                                 Manager $fractal, MenuTransformer $menuTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->menuTransformer = $menuTransformer;
        $this->menu = $menu;
    }

    /**
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonApiSerializer());

        $projects = $this->repository->with([])->all();

        $collection = new Collection($projects, new MenuTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new MenuTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param MenuTransformer $menuTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, MenuTransformer $menuTransformer)
    {
        $fractal->setSerializer(new JsonApiSerializer());

        $project = $this->menu->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Menu não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $menuTransformer);

        $data = $fractal->createData($item)->toArray();

        return $this->respond($data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $repository = $this->repository->create($request->all());

        return Response::json([
            'sucesso' => [
                'message' => 'Menu CRIADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request,$id)
    {
        $repository = $this->repository->update( $request->all(), $id );

        return Response::json([
            'sucesso' => [
                'message' => 'Menu MODIFICADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $repository = $this->repository->find($id)->delete();

        return Response::json([
            'sucesso' => [
                'message' => 'Menu DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
