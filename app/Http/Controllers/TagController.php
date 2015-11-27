<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Serializer\JsonApiSerializer;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\TagRepositoryEloquent;
use Rossina\Repositories\Transformers\TagTransformer;
use Rossina\Tag;

class TagController extends ApiController
{

    /**
     * @var TagRepositoryEloquent
     */
    protected $repository;
    /**
     * @var Tag
     */
    protected $tag;

    /**
     * @param TagRepositoryEloquent $repository
     * @param Tag $tag
     */
    public function __construct(TagRepositoryEloquent $repository, Tag $tag)
    {
        $this->repository = $repository;
        $this->tag = $tag;
    }

    /**
     * @param Manager $fractal
     * @param TagTransformer $projectTransformer
     * @return mixed
     */
    public function index(Manager $fractal, TagTransformer $projectTransformer)
    {
        $projects = $this->repository->with(['posts'])->all();

        return $this->respondWithCORS($projects);

    }

    /**
     * @return mixed
     */
    public  function all()
    {
        $tag = array();

        $data = $this->repository->with(['posts'])->all();

        foreach ($data as $posts) {
            $tag[] = $this->transform($posts);
        }

        return $tag;

    }

    /**
     * @param Tag $model
     * @return array
     */
    public function transform(Tag $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new TagTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param TagTransformer $tagTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, TagTransformer $tagTransformer)
    {
        $project = $this->tag->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Tag não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        return $this->respond($project);
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
                'message' => 'Tag CRIADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $repository = $this->repository->update( $request->all(), $id );

        return Response::json([
            'sucesso' => [
                'message' => 'Tag MODIFICADO com sucesso',
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
                'message' => 'Tag DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
