<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\TecimageRepositoryEloquent;
use Rossina\Repositories\Transformers\TecimageTransformer;
use Rossina\Tecimage;

class TecimageController extends ApiController
{

    /**
     * @var TecimageRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var Tecimage
     */
    protected $tecimage;

    public function __construct(TecimageRepositoryEloquent $repository,Tecimage $tecimage ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->tecimage = $tecimage;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $tecimage = $this->repository->all();

        return $this->apiController->respondWithCollection($tecimage, new TecimageTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param TecimageTransformer $tecimageTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, TecimageTransformer $tecimageTransformer)
    {
        $project = $this->tecimage->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Imagem Tecido não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $tecimageTransformer);

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
                'message' => 'Imagem Tecido CRIADO com sucesso',
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
                'message' => 'Imagem Tecido MODIFICADO com sucesso',
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
                'message' => 'Imagem Tecido DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
