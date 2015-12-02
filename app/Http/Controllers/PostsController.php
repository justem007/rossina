<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Http\Requests;
use Rossina\Post;
use Rossina\Repositories\Repository\PostRepositoryEloquent as PostRE;
use Rossina\Repositories\Transformers\PostTransformer;
use League\Fractal\TransformerAbstract;
use Rossina\Repositories\Transformers\TagTransformer;

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
     * @param Post $post
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id'         => (int) $post->id,
            'title'      => $post->title,
            'text'       => $post->text,
            'active'     => (boolean) $post->active,
            'user_id'    => (int) $post->user_id,
//            'tag'        => $post->tags,
//            'image'      => $post->images,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ];
    }

    /**
     * @param Manager $fractal
     * @param PostTransformer $postTransformer
     * @return mixed
     */
    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonSerializer());

        $post = $this->post->with(['comments'])->get();

        $collection = new Collection($post, new PostTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function comment()
    {
        $projects = $this->repository->with(['tags'])->all();

        return $this->respond($projects);
    }

    public function tag()
    {
        return Response::json(Post::all());
    }

    /**
     * @return mixed
     */
    public  function getPosts()
    {
//        $post = array();

        $data = $this->repository->with(['tags'])->all();

        foreach ($data as $posts) {
            $post[] = $this->respond($posts);
        }
        return $data;

    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param PostTransformer $postTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, PostTransformer $postTransformer)
    {
        $fractal->setSerializer(new ArraySerializer());

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

        return $this->respond($project);

//        return $this->apiController->respondWithItem($data, new PostTransformer);
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
