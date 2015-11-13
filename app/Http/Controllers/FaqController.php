<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
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

    public function __construct(FaqRepositoryEloquent $repository, ApiController $apiController,
                                FaqTransformer $faqTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->faqTransformer = $faqTransformer;
    }

    public function index(Manager $fractal)
    {
        $faq = $this->repository->all();

        $collection = new Collection($faq, $this->faqTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new FaqTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    public function show($id, Manager $fractal, FaqTransformer $faq)
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
