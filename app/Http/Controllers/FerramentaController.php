<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Ferramenta;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\FerramentaRepositoryEloquent;
use Rossina\Repositories\Transformers\FerramentaTransformer;

class FerramentaController extends ApiController
{
    protected $repository;

    protected $apiController;

    protected $fractal;

    protected $ferramentaTransformer;
    /**
     * @var Ferramenta
     */
    protected $ferramenta;

    public function __construct(FerramentaRepositoryEloquent $repository,Ferramenta $ferramenta ,ApiController $apiController,
                                Manager $fractal, FerramentaTransformer $ferramentaTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->ferramentaTransformer = $ferramentaTransformer;
        $this->ferramenta = $ferramenta;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $repository = $this->repository->with(['images'])->all();

        $collection = new Collection($repository, $this->ferramentaTransformer);

        $data = $this->fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new FerramentaTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param FerramentaTransformer $ferramentaTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, FerramentaTransformer $ferramentaTransformer)
    {
        $project = $this->ferramenta->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Ferramenta não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $ferramentaTransformer);

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
                'message' => 'Ferramenta CRIADO com sucesso',
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
                'message' => 'Ferramenta MODIFICADO com sucesso',
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
                'message' => 'Ferramenta DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
