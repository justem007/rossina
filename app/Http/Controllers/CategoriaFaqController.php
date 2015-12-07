<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\CategoriaFaq;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CategoriaFaqRepositoryEloquent;
use Rossina\Repositories\Repository\CategoriaRepositoryEloquent;
use Rossina\Repositories\Transformers\CategoriaFaqTransformer;
use Rossina\Repositories\Transformers\CategoriaTransformer;
use Rossina\Repositories\Transformers\FaqTransformer;

class CategoriaFaqController extends ApiController
{
    /**
     * @var CategoriaRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var CategoriaTransformer
     */
    protected $categoriaFaqTransformer;
    /**
     * @var CategoriaFaq
     */
    protected $categoriaFaq;

    /**
     * @param CategoriaFaqRepositoryEloquent $repository
     * @param CategoriaFaq $categoriaFaq
     * @param ApiController $apiController
     * @param CategoriaFaqTransformer $categoriaFaqTransformer
     */
    public function __construct(CategoriaFaqRepositoryEloquent $repository,CategoriaFaq $categoriaFaq ,ApiController $apiController,
                                CategoriaFaqTransformer $categoriaFaqTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->categoriaFaqTransformer = $categoriaFaqTransformer;
        $this->categoriaFaq = $categoriaFaq;
    }

    /**
     * @param Manager $fractal
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonApiSerializer());

        $faq = $this->repository->all();

        $collection = new Collection($faq, $this->categoriaFaqTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new FaqTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CategoriaTransformer $categoriaFaqTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CategoriaFaqTransformer $categoriaFaqTransformer)
    {
        $fractal->setSerializer(new JsonApiSerializer());

        $project = $this->categoriaFaq->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Categoria faq não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $categoriaFaqTransformer);

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
                'message' => 'Categoria faq CRIADO com sucesso',
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
                'message' => 'Categoria faq MODIFICADO com sucesso',
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
                'message' => 'Categoria faq DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
