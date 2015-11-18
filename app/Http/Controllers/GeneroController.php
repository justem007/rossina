<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Genero;
use Rossina\Http\Requests;
use Rossina\Repositories\Transformers\GeneroTransformer;
use Rossina\Repositories\GeneroRepositoryEloquent;

class GeneroController extends ApiController
{
    protected $repository;

    protected $apiController;

    /**
     * @param Genero $repository
     * @param ApiController $apiController
     */
    public function __construct(Genero $repository, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
    }

    /**
     * @param Manager $fractal
     * @param GeneroTransformer $generoTransformer
     * @return mixed
     */
    public function index(Manager $fractal, GeneroTransformer $generoTransformer)
    {
        $projects = $this->repository->with(['camisetas'])->get();

        $collection = new Collection($projects, $generoTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new GeneroTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param GeneroTransformer $generoTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, GeneroTransformer $generoTransformer)
    {
        $project = $this->repository->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Genero não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $generoTransformer);

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
                'message' => 'Genero CRIADO com sucesso',
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
                'message' => 'Genero MODIFICADO com sucesso',
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
                'message' => 'Genero DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
