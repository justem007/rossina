<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\BlocoUmDestaque;
use Rossina\Repositories\Repository\BlocoUmDestaqueRepositoryEloquent as BlocoUDRE;
use Rossina\Repositories\Transformers\BlocoUmDestaqueTransformer;

class BlocoUmDestaqueController extends ApiController
{
    protected $repository;

    protected $apiController;
    /**
     * @var BlocoUmDestaque
     */
    protected $blocoUmDestaque;

    /**
     * @param BlocoUDRE $repository
     * @param BlocoUmDestaque $blocoUmDestaque
     * @param ApiController $apiController
     */
    public function __construct(BlocoUDRE $repository,BlocoUmDestaque $blocoUmDestaque ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->blocoUmDestaque = $blocoUmDestaque;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new BlocoUmDestaqueTransformer());
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new BlocoUmDestaqueTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoUmDestaqueTransformer $blocoUmDestaqueTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoUmDestaqueTransformer $blocoUmDestaqueTransformer)
    {
        $project = $this->blocoUmDestaque->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco dois destaques dois não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $blocoUmDestaqueTransformer);

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
                'message' => 'Bloco um destaque, CRIADO com sucesso',
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
                'message' => 'Bloco um destaque, MODIFICADO com sucesso',
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
                'message' => 'Bloco um destaque, DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
