<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\StatusProducaoRepositoryEloquent as StatusPRE;
use Rossina\Repositories\Transformers\StatusProducaoTransformer;
use Rossina\Repositories\Transformers\StatusProducaoTransformer as StatusPT;
use Rossina\StatusProducao;

class StatusProducaoController extends ApiController
{
    protected $repository;

    protected $apiController;

    protected $fractal;

    protected $status;
    /**
     * @var StatusProducao
     */
    protected $statusProducao;

    /**
     * @param StatusPRE $repository
     * @param StatusProducao $statusProducao
     * @param ApiController $apiController
     * @param Manager $fractal
     * @param StatusProducaoTransformer $status
     */
    public function __construct(StatusPRE $repository,StatusProducao $statusProducao ,ApiController $apiController,
                                Manager $fractal, StatusPT $status)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->status = $status;
        $this->statusProducao = $statusProducao;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new StatusProducaoTransformer);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new StatusProducaoTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param StatusProducaoTransformer $statusProducaoTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, StatusProducaoTransformer $statusProducaoTransformer)
    {
        $project = $this->statusProducao->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Status Produção não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $statusProducaoTransformer);

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
                'message' => 'Status Produção CRIADO com sucesso',
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
                'message' => 'Status Produção MODIFICADO com sucesso',
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
                'message' => 'Status Produção DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
