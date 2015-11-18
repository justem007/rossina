<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoCamiseta;
use Rossina\Repositories\Repository\BlocoCamisetaRepositoryEloquent as BlocoCamisetaRE;
use Rossina\Repositories\Transformers\BlocoCamisetaTransformer;

class BlocoCamisetaController extends ApiController
{

    /**
     * @var BlocoCamisetaRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var Manager
     */
    protected $fractal;
    /**
     * @var BlocoCamisetaTransformer
     */
    protected $blocoCamisetaTransformer;
    /**
     * @var BlocoCamiseta
     */
    protected $blocoCamiseta;

    /**
     * @param BlocoCamisetaRE $repository
     * @param BlocoCamiseta $blocoCamiseta
     * @param ApiController $apiController
     * @param Manager $fractal
     * @param BlocoCamisetaTransformer $blocoCamisetaTransformer
     */
    public function __construct(BlocoCamisetaRE $repository, BlocoCamiseta $blocoCamiseta ,ApiController $apiController,
                                 Manager $fractal, BlocoCamisetaTransformer $blocoCamisetaTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoCamisetaTransformer = $blocoCamisetaTransformer;
        $this->blocoCamiseta = $blocoCamiseta;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $blocoCamiseta = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoCamiseta, $this->blocoCamisetaTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoCamisetaTransformer $blocoCamisetaTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoCamisetaTransformer $blocoCamisetaTransformer)
    {
        $project = $this->blocoCamiseta->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O bloco camisetas não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $blocoCamisetaTransformer);

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
                'message' => 'Bloco Camiseta CRIADO com sucesso',
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
                'message' => 'Bloco Camiseta MODIFICADO com sucesso',
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
                'message' => 'Bloco Camiseta DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
