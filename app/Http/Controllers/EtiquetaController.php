<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Etiqueta;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\EtiquetaRepositoryEloquent;
use Rossina\Repositories\Transformers\EtiquetaTransformer;

class EtiquetaController extends ApiController
{

    /**
     * @var EtiquetaRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var Etiqueta
     */
    protected $etiqueta;

    /**
     * @param EtiquetaRepositoryEloquent $repository
     * @param Etiqueta $etiqueta
     * @param ApiController $apiController
     */
    public function __construct(EtiquetaRepositoryEloquent $repository,Etiqueta $etiqueta ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->etiqueta = $etiqueta;
    }

    /**
     * @param EtiquetaTransformer $etiquetaTransformer
     * @param Manager $fractal
     * @return mixed
     */
    public function index(EtiquetaTransformer $etiquetaTransformer, Manager $fractal)
    {
        $projects = $this->repository->all();

        $collection = new Collection($projects, $etiquetaTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new EtiquetaTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param EtiquetaTransformer $etiquetaTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, EtiquetaTransformer $etiquetaTransformer)
    {
        $project = $this->etiqueta->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Comentário não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $etiquetaTransformer);

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
                'message' => 'Etiqueta CRIADO com sucesso',
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
                'message' => 'Etiqueta MODIFICADO com sucesso',
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
                'message' => 'Etiqueta DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
