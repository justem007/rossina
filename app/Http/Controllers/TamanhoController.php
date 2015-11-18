<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\TamanhoRepositoryEloquent;
use Rossina\Repositories\Transformers\TamanhoTransformer;
use Rossina\Tamanho;

class TamanhoController extends ApiController
{
    /**
     * @var TamanhoRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var Tamanho
     */
    protected $tamanho;

    /**
     * @param TamanhoRepositoryEloquent $repository
     * @param Tamanho $tamanho
     * @param ApiController $apiController
     */
    public function __construct(TamanhoRepositoryEloquent $repository,Tamanho $tamanho ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->tamanho = $tamanho;
    }

    /**
     * @param Manager $fractal
     * @param TamanhoTransformer $tamanhoTransformer
     * @return mixed
     */
    public function index(Manager $fractal, TamanhoTransformer $tamanhoTransformer)
    {
        $projects = $this->repository->with(['camisetas'])->all();

        $collection = new Collection($projects, $tamanhoTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){
        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new TamanhoTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param TamanhoTransformer $tamanhoTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, TamanhoTransformer $tamanhoTransformer)
    {
        $project = $this->tamanho->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Tamanho não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $tamanhoTransformer);

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
                'message' => 'Tamanho CRIADO com sucesso',
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
                'message' => 'Tamanho MODIFICADO com sucesso',
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
                'message' => 'Tamanho DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
