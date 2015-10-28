<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\FerramentaRepositoryEloquent;
use Rossina\Repositories\Transformers\FerramentaTransformer;

class FerramentaController extends ApiController
{
    protected $repository;

    protected $apiController;

    protected $fractal;

    protected $ferramentaTransformer;

    public function __construct(FerramentaRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, FerramentaTransformer $ferramentaTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->ferramentaTransformer = $ferramentaTransformer;
    }

    public function index()
    {
        $repository = $this->repository->with(['images'])->all();

        $collection = new Collection($repository, $this->ferramentaTransformer);

        $data = $this->fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
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
