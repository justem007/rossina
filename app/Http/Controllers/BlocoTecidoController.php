<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoTecido;
use Rossina\Repositories\Repository\BlocoTecidoRepositoryEloquent as BlocoTRE;
use Rossina\Repositories\Transformers\BlocoTecidoTransformer;

class BlocoTecidoController extends ApiController
{

    /**
     * @var BlocoTRE
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoTecidoTransformer
     */
    protected $blocoTecidoTransformer;

    protected $fractal;
    /**
     * @var BlocoTecido
     */
    protected $blocoTecido;

    public function __construct(BlocoTRE $repository,BlocoTecido $blocoTecido ,ApiController $apiController,
                                Manager $fractal, BlocoTecidoTransformer $blocoTecidoTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoTecidoTransformer = $blocoTecidoTransformer;
        $this->blocoTecido = $blocoTecido;
    }

    /**
     * @param BlocoTecido $model
     * @return array
     */
    public function transform(BlocoTecido $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'user_id'    => (int) $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @return array
     */
    public function all()
    {
        $blocoTecido = array();

        $data = $this->repository->with([])->all();

        foreach ($data as $blocoTecidos) {
            $blocoTecido[] = $this->transform($blocoTecidos);
        }

        return $blocoTecido;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $blocoTecido = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoTecido, $this->blocoTecidoTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoTecidoTransformer $blocoTecidoTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoTecidoTransformer $blocoTecidoTransformer)
    {
        $project = $this->blocoTecido->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco tecido não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $blocoTecidoTransformer);

//        $data = $fractal->createData($item)->toArray();

        return $this->respond($project);
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
                'message' => 'Bloco tecido CRIADO com sucesso',
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
                'message' => 'Bloco tecido MODIFICADO com sucesso',
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
                'message' => 'Bloco tecido DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
