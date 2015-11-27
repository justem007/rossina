<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoDois;
use Rossina\Repositories\Repository\BlocoDoisRepositoryEloquent as BlocoDRE;
use Rossina\Repositories\Transformers\BlocoDoisTransformer;

class BlocoDoisController extends ApiController
{

    /**
     * @var BlocoDRE
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoDois
     */
    protected $blocoDois;

    /**
     * @param BlocoDRE $repository
     * @param BlocoDois $blocoDois
     * @param ApiController $apiController
     */
    public function __construct(BlocoDRE $repository, BlocoDois $blocoDois, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->blocoDois = $blocoDois;
    }

    /**
     * @param BlocoDois $model
     * @return array
     */
    public function transform(BlocoDois $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
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
        $blocoDois = array();

        $data = $this->repository->with([])->all();

        foreach ($data as $blocoDoiss) {
            $blocoDois[] = $this->transform($blocoDoiss);
        }

        return $blocoDois;
    }

    public function index()
    {
        $blocodois = $this->repository->all();

        return $this->apiController->respondWithCollection($blocodois, new BlocoDoisTransformer);
    }

    public function show($id, Manager $fractal, BlocoDoisTransformer $blocoDoisTransformer)
    {
        $project = $this->blocoDois->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco dois não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $blocoDoisTransformer);

//        $data = $fractal->createData($item)->toArray();

        return $this->transform($project);
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
                'message' => 'Bloco dois CRIADO com sucesso',
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
                'message' => 'Bloco dois MODIFICADO com sucesso',
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
                'message' => 'Bloco dois DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
