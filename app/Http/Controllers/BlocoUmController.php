<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoUmRepositoryEloquent as BlocoUm;

class BlocoUmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $repository;

    public function __construct(BlocoUm $repository){

        $this->repository = $repository;
    }

    public function all()
    {
        $blocoum = $this->repository->all();

        return $blocoum;
    }

    public function find($id){

        return $blocoum = $this->repository->find($id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
