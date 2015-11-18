<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoDoisDestaqueDois;
use Rossina\Repositories\Repository\BlocoDoisDestaqueDoisRepositoryEloquent as BlocoDDDRE;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueDoisTransformer;

class BlocoDoisDestaqueDoisController extends ApiController
{

    /**
     * @var BlocoDDDRE
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
     * @var BlocoDoisDestaqueDoisTransformer
     */
    protected $blocoDoisDestaqueDoisTransformer;
    /**
     * @var BlocoDoisDestaqueDois
     */
    protected $blocoDoisDestaqueDois;

    /**
     * @param BlocoDDDRE $repository
     * @param BlocoDoisDestaqueDois $blocoDoisDestaqueDois
     * @param ApiController $apiController
     * @param Manager $fractal
     * @param BlocoDoisDestaqueDoisTransformer $blocoDoisDestaqueDoisTransformer
     */
    public function __construct(BlocoDDDRE $repository,BlocoDoisDestaqueDois $blocoDoisDestaqueDois ,ApiController $apiController,
                                Manager $fractal, BlocoDoisDestaqueDoisTransformer $blocoDoisDestaqueDoisTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoDoisDestaqueDoisTransformer = $blocoDoisDestaqueDoisTransformer;
        $this->blocoDoisDestaqueDois = $blocoDoisDestaqueDois;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $blocoDoisDestaqueDois = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoDoisDestaqueDois, $this->blocoDoisDestaqueDoisTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoDoisDestaqueDoisTransformer $blocoDoisDestaqueDoisTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoDoisDestaqueDoisTransformer $blocoDoisDestaqueDoisTransformer)
    {
        $project = $this->blocoDoisDestaqueDois->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco dois destaques dois não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $blocoDoisDestaqueDoisTransformer);

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
                'message' => 'Bloco dois destaques dois CRIADO com sucesso',
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
                'message' => 'Bloco dois destaques dois MODIFICADO com sucesso',
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
                'message' => 'Bloco dois destaques dois DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
