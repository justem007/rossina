<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Image;
use Rossina\Repositories\Repository\ImageRepositoryEloquent as ImageRE;
use Rossina\Repositories\Transformers\ImageTransformer;

class ImageController extends ApiController
{
    protected $repository;

    protected $apiController;
    /**
     * @var Image
     */
    protected $image;

    public function __construct(ImageRE $repository,Image $image ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->image = $image;
    }

    /**
     * @param Manager $fractal
     * @param ImageTransformer $projectTransformer
     * @return mixed
     */
    public function index(Manager $fractal, ImageTransformer $projectTransformer)
    {
        $projects = $this->repository->with(['posts'])->all();

        $collection = new Collection($projects, $projectTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new ImageTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param ImageTransformer $imageTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, ImageTransformer $imageTransformer)
    {
        $project = $this->image->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Imagem não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $imageTransformer);

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
                'message' => 'Imagem CRIADO com sucesso',
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
                'message' => 'Imagem MODIFICADO com sucesso',
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
                'message' => 'Imagem DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
