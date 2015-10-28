<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Reponse;
use Rossina\Comment;
use Rossina\Http\Requests;
use Rossina\Repositories\Criteria\CommentCriteria;
use Rossina\Repositories\Interfaces\Larasponse;
use Rossina\Repositories\Repository\CommentRepositoryEloquent as CommentRE;
use Rossina\Repositories\Transformers\CommentTransformer;

class CommentController extends ApiController
{
    protected $model;

    protected $apiController;

    public function __construct(CommentRE $model, ApiController $apiController)
    {
        $this->model = $model;
        $this->apiController = $apiController;
    }

    public function index()
    {
        $model = $this->model->all();

        return $this->apiController->respondWithCollection($model, new CommentTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function find()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        //
    }

}
