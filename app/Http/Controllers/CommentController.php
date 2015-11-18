<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Comment;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\CommentRepositoryEloquent as CommentRE;
use Rossina\Repositories\Transformers\CommentTransformer;

class CommentController extends ApiController
{

    /**
     * @var repository
     */
    protected $repository;
    /**
     * @var apiController
     */
    protected $apiController;
    /**
     * @var Comment
     */
    protected $comment;

    /**
     * @param CommentRE $repository
     * @param Comment $comment
     * @param ApiController $apiController
     */
    public function __construct(CommentRE $repository,Comment $comment ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new CommentTransformer());
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CommentTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CommentTransformer $commentTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CommentTransformer $commentTransformer)
    {
        $project = $this->comment->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Comentário não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $commentTransformer);

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
                'message' => 'Coméntario CRIADO com sucesso',
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
                'message' => 'Comentário MODIFICADO com sucesso',
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
                'message' => 'Comentário DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
