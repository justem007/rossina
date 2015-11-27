<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\BlocoUm;
use Rossina\Repositories\Repository\BlocoUmRepositoryEloquent as BlocoURE;
use Rossina\Repositories\Transformers\BlocoUmTransformer;

class BlocoUmController extends ApiController
{
    protected $repository;

    protected $apiController;
    /**
     * @var BlocoUm
     */
    protected $blocoUm;

    /**
     * @param BlocoURE $repository
     * @param BlocoUm $blocoUm
     * @param ApiController $apiController
     */
    public function __construct(BlocoURE $repository,BlocoUm $blocoUm ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->blocoUm = $blocoUm;
    }

    /**
     * @param BlocoUm $model
     * @return array
     */
    public function transform(BlocoUm $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'user_id'    => (int) $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new BlocoUmTransformer());
    }

    /**
     * @return array
     */
    public function all()
    {
        $blocoUm = array();

        $data = $this->repository->with([])->all();

        foreach ($data as $blocoUms) {
            $blocoUm[] = $this->transform($blocoUms);
        }

        return $blocoUm;
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new BlocoUmTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoUmTransformer $blocoUmTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoUmTransformer $blocoUmTransformer)
    {
        $project = $this->blocoUm->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco um não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $blocoUmTransformer);

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
                'message' => 'Bloco um CRIADO com sucesso',
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
                'message' => 'Bloco um MODIFICADO com sucesso',
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
                'message' => 'Bloco um DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
