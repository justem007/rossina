<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Categoria;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CategoriaRepositoryEloquent;
use Rossina\Repositories\Transformers\CategoriaTransformer;

class CategoriaController extends ApiController
{
    /**
     * @var CategoriaRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var CategoriaTransformer
     */
    protected $categoriaTransformer;
    /**
     * @var Categoria
     */
    protected $categoria;

    /**
     * @param CategoriaRepositoryEloquent $repository
     * @param Categoria $categoria
     * @param ApiController $apiController
     * @param CategoriaTransformer $categoriaTransformer
     */
    public function __construct(CategoriaRepositoryEloquent $repository,Categoria $categoria ,ApiController $apiController,
                                CategoriaTransformer $categoriaTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->categoriaTransformer = $categoriaTransformer;
        $this->categoria = $categoria;
    }

    /**
     * @param Manager $fractal
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonSerializer());

        $categoria = $this->repository->with(['posts'])->all();

        $collection = new Collection($categoria, $this->categoriaTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CategoriaTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CategoriaTransformer $categoriaTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CategoriaTransformer $categoriaTransformer)
    {
        $fractal->setSerializer(new JsonSerializer());

        $project = $this->categoria->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Categoria não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $categoriaTransformer);

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
                'message' => 'Categoria CRIADO com sucesso',
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
                'message' => 'Categoria MODIFICADO com sucesso',
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
                'message' => 'Categoria DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
