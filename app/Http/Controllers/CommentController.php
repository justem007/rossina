<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Reponse;
use Rossina\Http\Requests;
use Rossina\Repositories\Criteria\CommentCriteria;
use Rossina\Repositories\Repository\CommentRepositoryEloquent as Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $repository;

    public function __construct(Comment $repository){
        $this->repository = $repository;
    }

    public function index(){

      return $comments = $this->repository->skipCriteria(CommentCriteria::class)->all();

    }

    public function all()
    {
        return $comment = $this->repository->all();
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
