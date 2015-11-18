<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\CategoriaBlog;
use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CategoriaBlogRepositoryEloquent as CategoriaBRE;
use Rossina\Repositories\Transformers\CategoriaBlogTransformer;

class CategoriaBlogController extends ApiController
{
    /**
     * @var CategoriaBRE
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var CategoriaBlogTransformer
     */
    protected $categoriaBlogTransformer;
    /**
     * @var CategoriaBlog
     */
    protected $categoriaBlog;

    /**
     * @param CategoriaBRE $repository
     * @param CategoriaBlog $categoriaBlog
     * @param ApiController $apiController
     * @param CategoriaBlogTransformer $categoriaBlogTransformer
     */
    public function __construct(CategoriaBRE $repository,CategoriaBlog $categoriaBlog ,ApiController $apiController,
                                CategoriaBlogTransformer $categoriaBlogTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->categoriaBlogTransformer = $categoriaBlogTransformer;
        $this->categoriaBlog = $categoriaBlog;
    }

    /**
     * @param Manager $fractal
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $faq = $this->repository->with(['posts'])->all();

        $collection = new Collection($faq, $this->categoriaBlogTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CategoriaBlogTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CategoriaBlogTransformer $categoriaBlogTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CategoriaBlogTransformer $categoriaBlogTransformer)
    {
        $project = $this->categoriaBlog->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Categoria Blog não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $categoriaBlogTransformer);

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
                'message' => 'Categoria Blog, CRIADO com sucesso',
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
                'message' => 'Categoria Blog, MODIFICADO com sucesso',
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
                'message' => 'Categoria Blog, DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
