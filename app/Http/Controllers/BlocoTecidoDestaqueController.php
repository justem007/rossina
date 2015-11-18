<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoTecidoDestaque;
use Rossina\Repositories\Repository\BlocoTecidoDestaqueRepositoryEloquent as BlocoTDRE;
use Rossina\Repositories\Transformers\BlocoTecidoDestaqueTransformer;

class BlocoTecidoDestaqueController extends ApiController
{
    /**
     * @var BlocoTDRE
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoTecidoDestaqueTransformer
     */
    protected $blocoTecidoDestaqueTransformer;

    protected $fractal;
    /**
     * @var BlocoTecidoDestaque
     */
    protected $blocoTecidoDestaque;

    /**
     * @param BlocoTDRE $repository
     * @param BlocoTecidoDestaque $blocoTecidoDestaque
     * @param ApiController $apiController
     * @param Manager $fractal
     * @param BlocoTecidoDestaqueTransformer $blocoTecidoDestaqueTransformer
     */
    public function __construct(BlocoTDRE $repository,BlocoTecidoDestaque $blocoTecidoDestaque ,ApiController $apiController,
                                Manager $fractal, BlocoTecidoDestaqueTransformer $blocoTecidoDestaqueTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoTecidoDestaqueTransformer = $blocoTecidoDestaqueTransformer;
        $this->blocoTecidoDestaque = $blocoTecidoDestaque;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $blocoTecidoDestaque = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoTecidoDestaque, $this->blocoTecidoDestaqueTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoTecidoDestaqueTransformer $blocoTecidoDestaqueTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoTecidoDestaqueTransformer $blocoTecidoDestaqueTransformer)
    {
        $project = $this->blocoTecidoDestaque->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco tecido destaque não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $blocoTecidoDestaqueTransformer);

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
                'message' => 'Bloco tecido destaque CRIADO com sucesso',
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
                'message' => 'Bloco tecido destaque MODIFICADO com sucesso',
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
                'message' => 'Bloco tecido destaque DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
