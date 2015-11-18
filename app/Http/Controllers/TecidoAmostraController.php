<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\TecidoAmostraRepositoryEloquent;
use Rossina\Repositories\Transformers\TecidoAmostraTransformer;
use Rossina\TecidoAmostra;

class TecidoAmostraController extends ApiController
{

    /**
     * @var TecidoAmostraRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var TecidoAmostra
     */
    protected $tecidoAmostra;

    /**
     * @param TecidoAmostra $repository
     * @param TecidoAmostra $tecidoAmostra
     * @param ApiController $apiController
     */
    public function __construct(TecidoAmostra $repository,TecidoAmostra $tecidoAmostra ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->tecidoAmostra = $tecidoAmostra;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $tecidoAmostra = $this->repository->all();

        return $this->apiController->respondWithCollection($tecidoAmostra, new TecidoAmostraTransformer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new TecidoAmostraTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param TecidoAmostraTransformer $tecidoAmostraTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, TecidoAmostraTransformer $tecidoAmostraTransformer)
    {
        $project = $this->tecidoAmostra->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Amostra Tecido não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $tecidoAmostraTransformer);

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
                'message' => 'Amostra Tecido CRIADO com sucesso',
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
                'message' => 'Amostra Tecido MODIFICADO com sucesso',
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
                'message' => 'Amostra Tecido DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
