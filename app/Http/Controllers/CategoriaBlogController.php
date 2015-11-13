<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CategoriaBlogRepositoryEloquent;
use Rossina\Repositories\Transformers\CategoriaBlogTransformer;

class CategoriaBlogController extends ApiController
{
    /**
     * @var CategoriaBlogRepositoryEloquent
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

    public function __construct(CategoriaBlogRepositoryEloquent $repository, ApiController $apiController,
                                CategoriaBlogTransformer $categoriaBlogTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->categoriaBlogTransformer = $categoriaBlogTransformer;
    }

    public function index(Manager $fractal)
    {
        $faq = $this->repository->with(['posts'])->all();

        $collection = new Collection($faq, $this->categoriaBlogTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CategoriaBlogTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, CategoriaBlogTransformer $faq)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $faq);

        $data = $fractal->createData($item)->toArray();

        if (!$data) {
            return $this->errorNotFound('Você inventou um ID e tentou carregar um local? Idiota.');
        }

        return $this->respond($data);
    }

    public function find($id, $columns = array('*'))
    {
        $repository = $this->repository->find($id, $columns = array('id', 'title', 'text'));

        return $repository;
    }

    public function create()
    {
        $repository = $this->repository->create( Input::all() );

        return $repository;
    }

    public function update($id)
    {
        $repository = $this->repository->update( Input::all(), $id );

        return $repository;
    }

    public function delete($id)
    {
        $repository = $this->repository->find($id)->delete();

        return redirect()->route('posts');
    }
}
