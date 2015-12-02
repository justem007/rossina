<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\CategoriaTecido;
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
    /**
     * @var CategoriaTecido
     */
    protected $categoriaTecido;

    /**
     * @param CategoriaTecidoRepositoryEloquent $repository
     * @param CategoriaTecido $categoriaTecido
     * @param ApiController $apiController
     * @param CategoriaTecidoTransformer $categoriaTecidoTransformer
     */
    public function __construct(CategoriaTecidoRepositoryEloquent $repository,CategoriaTecido $categoriaTecido ,ApiController $apiController,
                                CategoriatecidoTransformer $categoriaTecidoTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->categoriaTecidoTransformer = $categoriaTecidoTransformer;
        $this->categoriaTecido = $categoriaTecido;
    }

    /**
     * @param Manager $fractal
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonSerializer());

        $categoriaTecido = $this->repository->all();

//        $collection = new Collection($categoriaTecido, $this->categoriaTecidoTransformer);

//        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($categoriaTecido);
    }

    public function getAll(Manager $fractal)
    {
        $fractal->setSerializer(new JsonSerializer());

        $categoriaTecido = $this->repository->with(['tecidos'])->all();

        $collection = new Collection($categoriaTecido, $this->categoriaTecidoTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CategoriaTecidoTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CategoriaTecidoTransformer $categoriaTecidoTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CategoriaTecidoTransformer $categoriaTecidoTransformer)
    {
        $project = $this->categoriaTecido->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Categoria tecido não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $categoriaTecidoTransformer);

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
                'message' => 'Categoria tecido CRIADO com sucesso',
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
                'message' => 'Categoria tecido MODIFICADO com sucesso',
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
                'message' => 'Categoria tecido DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
