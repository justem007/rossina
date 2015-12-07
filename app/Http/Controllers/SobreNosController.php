<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\SobreNoRepositoryEloquent;
use Rossina\Repositories\Transformers\SobreNoTransformer;
use Rossina\SobreNo;

class SobreNosController extends ApiController
{
    protected $apiController;

    protected $repository;
    /**
     * @var SobreNo
     */
    protected $sobre;

    /**
     * @param ApiController $apiController
     * @param SobreNo $sobre
     * @param SobreNoRepositoryEloquent $repository
     */
    public function __construct(ApiController $apiController, SobreNo $sobre, SobreNoRepositoryEloquent $repository){
        $this->apiController = $apiController;
        $this->repository = $repository;
        $this->sobre = $sobre;
    }

    /**
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonApiSerializer());

        $faq = $this->repository->all();

        $collection = new Collection($faq, new SobreNoTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param SobreNoTransformer $sobreTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, SobreNoTransformer $sobreTransformer)
    {
        $fractal->setSerializer(new JsonApiSerializer());

        $project = $this->sobre->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O sobre nos não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $sobreTransformer);

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
                'message' => 'Sobre Nós CRIADO com sucesso',
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
        $repository = $this->sobre->update( $request->all(), $id );

        return Response::json([
            'sucesso' => [
                'message' => 'Sobre Nós MODIFICADO com sucesso',
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
                'message' => 'Sobre Nós DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
