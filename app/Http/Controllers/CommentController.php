<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Reponse;
use Rossina\Comment;
use Rossina\Http\Requests;
use Rossina\Repositories\Interfaces\Larasponse;
use Rossina\Repositories\Transformers\CommentTransformer;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var CommentTransformer
     */
    protected $larasponse;

    public function __construct(Comment $model, ApiController $apiController, Larasponse $larasponse){
        $this->model = $model;
        $this->apiController = $apiController;
        $this->larasponse = $larasponse;
    }


    public function all()
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
