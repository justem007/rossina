<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoCamisetaDestaque;
use Rossina\Repositories\Repository\BlocoCamisetaDestaqueRepositoryEloquent as BlocoCDRE;
use Rossina\Repositories\Transformers\BlocoCamisetaDestaqueTransformer;

class BlocoCamisetaDestaqueController extends ApiController
{
    /**
     * @var BlocoCDRE
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
     * @var BlocoCamisetaDestaqueTransformer
     */
    protected $blocoCamisetaTransformer;
    /**
     * @var BlocoCamisetaDestaque
     */
    protected $blocoCamisetaDestaque;

    public function __construct(BlocoCDRE $repository,BlocoCamisetaDestaque $blocoCamisetaDestaque ,ApiController $apiController,
                                Manager $fractal, BlocoCamisetaDestaqueTransformer $blocoCamisetaDestaqueTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoCamisetaDestaqueTransformer = $blocoCamisetaDestaqueTransformer;
        $this->blocoCamisetaDestaque = $blocoCamisetaDestaque;
    }

    /**
     * @param BlocoCamisetaDestaque $model
     * @return array
     */
    public function transform(BlocoCamisetaDestaque $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @return array
     */
    public function all()
    {
        $blocoCamisetaDestaque = array();

        $data = $this->repository->with([])->all();

        foreach ($data as $blocoCamisetaDestaques) {
            $blocoCamisetaDestaque[] = $this->transform($blocoCamisetaDestaques);
        }

        return $blocoCamisetaDestaque;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocoCamiseta = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoCamiseta, $this->blocoCamisetaDestaqueTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoCamisetaDestaqueTransformer $blocoCamisetaDestaqueTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoCamisetaDestaqueTransformer $blocoCamisetaDestaqueTransformer)
    {
        $project = $this->blocoCamisetaDestaque->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco camiseta destaque não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $blocoCamisetaDestaqueTransformer);

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
                'message' => 'Bloco camiseta destaque CRIADO com sucesso',
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
                'message' => 'Bloco camiseta destaque MODIFICADO com sucesso',
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
                'message' => 'Bloco camiseta destaque DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
