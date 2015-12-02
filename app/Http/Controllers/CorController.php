<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Cor;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CorRepositoryEloquent;
use Rossina\Repositories\Transformers\CorTransformer;

class CorController extends ApiController
{

    protected $repository;

    protected $apiController;
    /**
     * @var Cor
     */
    protected $cor;

    /**
     * @param CorRepositoryEloquent $repository
     * @param Cor $cor
     * @param ApiController $apiController
     */
    public function __construct(CorRepositoryEloquent $repository,Cor $cor ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->cor = $cor;
    }

    /**
     * @param Cor $model
     * @return array
     */
    public function transform(Cor $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'rgb'        => $model->rgb,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param Manager $fractal
     * @param CorTransformer $corTransformer
     * @return mixed
     */
    public function index(Manager $fractal, CorTransformer $corTransformer)
    {
        $fractal->setSerializer(new JsonSerializer());

        $projects = $this->repository->with(['camisetas'])->all();

        $collection = new Collection($projects, $corTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CorTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CorTransformer $corTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CorTransformer $corTransformer)
    {
        $project = $this->cor->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Cor não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $corTransformer);

//        $data = $fractal->createData($item)->toArray();

        return $this->transform($project);

//        return Response::json([
//            'success' => [
//                'message' => 'Cor encontrada',
//                'data'   => $data
//            ]
//        ], 200);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $repository = $this->repository->create($request->all());

        return Response::json([
            'success' => [
                'message' => 'Cor CRIADO com sucesso',
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
            'success' => [
                'message' => 'Cor MODIFICADO com sucesso',
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
            'success' => [
                'message' => 'Cor DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
