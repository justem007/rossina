<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\StatusProducaoRepositoryEloquent as StatusPRE;
use Rossina\Repositories\Transformers\StatusProducaoTransformer as StatusPT;
use Rossina\Repositories\Transformers\StatusProducaoTransformer;

class StatusProducaoController extends ApiController
{
    protected $repository;

    protected $apiController;

    protected $fractal;

    protected $status;

    public function __construct(StatusPRE $repository, ApiController $apiController,
                                Manager $fractal, StatusPT $status)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->status = $status;
    }

    public function index()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new StatusProducaoTransformer);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id)
    {
        //
    }
}
