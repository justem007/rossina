<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\TecidoRepositoryEloquent;
use Rossina\Repositories\Transformers\TecidoTransformer;
use Rossina\Tecido;

class TecidoController extends ApiController
{
    protected $repository;

    protected $apiController;
    /**
     * @var Tecido
     */
    protected $tecido;

    public function __construct(TecidoRepositoryEloquent $repository,Tecido $tecido ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->tecido = $tecido;
    }

    /**
     * @param Manager $fractal
     * @param TecidoTransformer $projectTransformer
     * @return mixed
     */
    public function index(Manager $fractal, TecidoTransformer $projectTransformer)
    {
        $fractal->setSerializer(new JsonSerializer());

        $projects = $this->repository->with(['tecimages'])->all();

        $collection = new Collection($projects, $projectTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);

    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param TecidoTransformer $tecidoTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, TecidoTransformer $tecidoTransformer)
    {
        $fractal->setSerializer(new JsonSerializer());

        $project = $this->tecido->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Tecido não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $tecidoTransformer);

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
                'message' => 'Tecido CRIADO com sucesso',
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
                'message' => 'Tecido MODIFICADO com sucesso',
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
                'message' => 'Tecido DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
