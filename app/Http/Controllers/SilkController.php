<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\SilkRepositoryEloquent;
use Rossina\Repositories\Transformers\SilkTransformer;
use Rossina\Silk;

class SilkController extends ApiController
{

    /**
     * @var SilkRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var Silk
     */
    protected $silk;

    public function __construct(SilkRepositoryEloquent $repository,Silk $silk ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->silk = $silk;
    }

    /**
     * @param Manager $fractal
     * @param SilkTransformer $silkTransformer
     * @return mixed
     */
    public function index(Manager $fractal, SilkTransformer $silkTransformer)
    {

        $projects = $this->repository->with(['camisetas'])->all();

        $collection = new Collection($projects, $silkTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new SilkTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param SilkTransformer $silkTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, SilkTransformer $silkTransformer)
    {
        $project = $this->silk->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Silk não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $silkTransformer);

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
                'message' => 'Silk CRIADO com sucesso',
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
                'message' => 'Silk MODIFICADO com sucesso',
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
                'message' => 'Silk DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
