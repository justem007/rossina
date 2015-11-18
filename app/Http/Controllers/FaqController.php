<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Faq;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Repositories\Repository\CategoriaRepositoryEloquent;
use Rossina\Repositories\Repository\FaqRepositoryEloquent;
use Rossina\Repositories\Transformers\CategoriaTransformer;
use Rossina\Repositories\Transformers\FaqTransformer;

class FaqController extends ApiController
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
    protected $faqTransformer;
    /**
     * @var Faq
     */
    protected $faq;

    public function __construct(FaqRepositoryEloquent $repository,Faq $faq ,ApiController $apiController,
                                FaqTransformer $faqTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->faqTransformer = $faqTransformer;
        $this->faq = $faq;
    }

    /**
     * @param Manager $fractal
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $faq = $this->repository->all();

        $collection = new Collection($faq, $this->faqTransformer);

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
     * @param FaqTransformer $faqTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, FaqTransformer $faqTransformer)
    {
        $project = $this->faq->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Faq não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $faqTransformer);

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
                'message' => 'Faq CRIADO com sucesso',
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
                'message' => 'Faq MODIFICADO com sucesso',
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
                'message' => 'Faq DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
