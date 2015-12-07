<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoDoisDestaqueUm;
use Rossina\Repositories\Repository\BlocoDoisDestaqueUmRepositoryEloquent as BlocoDDURE;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueUmTransformer;

class BlocoDoisDestaqueUmController extends ApiController
{

    /**
     * @var BlocoDDURE
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var BlocoDoisDestaqueUmTransformer
     */
    protected $blocoDoisDestaqueTransformer;
    /**
     * @var BlocoDoisDestaqueUm
     */
    protected $blocoDoisDestaqueUm;

    /**
     * @param BlocoDDURE $repository
     * @param BlocoDoisDestaqueUm $blocoDoisDestaqueUm
     * @param ApiController $apiController
     * @param Manager $fractal
     * @param BlocoDoisDestaqueUmTransformer $blocoDoisDestaqueUmTransformer
     */
    public function __construct(BlocoDDURE $repository,BlocoDoisDestaqueUm $blocoDoisDestaqueUm ,ApiController $apiController,
                                Manager $fractal, BlocoDoisDestaqueUmTransformer $blocoDoisDestaqueUmTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoDoisDestaqueUmTransformer = $blocoDoisDestaqueUmTransformer;
        $this->blocoDoisDestaqueUm = $blocoDoisDestaqueUm;
    }

    /**
     * @param BlocoDoisDestaqueUm $model
     * @return array
     */
    public function transform(BlocoDoisDestaqueUm $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'user_id'    => $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @return array
     */
    public function all()
    {
        $blocoDoisDestaqueUm = array();

        $data = $this->repository->with([])->all();

        foreach ($data as $blocoDoisDestaquesUm) {
            $blocoDoisDestaqueUm[] = $this->transform($blocoDoisDestaquesUm);
        }

        return $blocoDoisDestaqueUm;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $blocoDoisDestaqueUm = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoDoisDestaqueUm, $this->blocoDoisDestaqueUmTransformer);
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param BlocoDoisDestaqueUmTransformer $blocoDoisDestaqueUmTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, BlocoDoisDestaqueUmTransformer $blocoDoisDestaqueUmTransformer)
    {
        $project = $this->blocoDoisDestaqueUm->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco dois destaques dois não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $blocoDoisDestaqueUmTransformer);

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
                'message' => 'Bloco dois destaques um CRIADO com sucesso',
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
                'message' => 'Bloco dois destaques um MODIFICADO com sucesso',
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
                'message' => 'Bloco dois destaques um DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
