<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Post;
use Rossina\Repositories\Repository\PostRepositoryEloquent as PostRE;
use Rossina\Repositories\Transformers\PostTransformer;

class PostsController extends ApiController
{
    protected $repository;

    protected $apiController;
    /**
     * @var Post
     */
    protected $post;

    /**
     * @param PostRE $repository
     * @param Post $post
     * @param ApiController $apiController
     */
    public function __construct(PostRE $repository, Post $post, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->post = $post;
    }

    /**
     * @param Manager $fractal
     * @param PostTransformer $postTransformer
     * @return mixed
     */
    public function index(Manager $fractal, PostTransformer $postTransformer)
    {
        $projects = $this->repository->with(['comments.posts.tags'])->all();

        $collection = new Collection($projects, $postTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);
    }

    /**
     * @return mixed
     */
    public  function all()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new PostTransformer());
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param PostTransformer $postTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, PostTransformer $postTransformer)
    {
        $project = $this->post->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O post não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $postTransformer);

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
            'message' => 'Post CRIADO com sucesso',
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
                'message' => 'Post MODIFICADO com sucesso',
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
                'message' => 'Post DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }

}
