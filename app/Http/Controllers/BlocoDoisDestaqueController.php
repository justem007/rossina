<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoDoisDestaqueRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueTransformer;

class BlocoDoisDestaqueController extends ApiController
{
    protected $apiController;
    protected $bloco;

    public function __construct(ApiController $apiController, BlocoDoisDestaqueRepositoryEloquent $bloco){
        $this->apiController = $apiController;
        $this->bloco = $bloco;
    }

    public function index()
    {
        $bloco = $this->bloco->all();

        return $this->apiController->respondWithCollection($bloco, new BlocoDoisDestaqueTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function status()
    {

        $paginator = $this->bloco->paginate(3);

//        $bloco = $paginator->getCollection();
//
//        $resource = new Collection($bloco, new BlocoDoisDestaqueTransformer);
//
//         $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;

//        $posts = $this->repository->paginate();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->bloco->find($id);

        if (!$model) {
            return $this->errorNotFound('Você inventou um ID e tentou carregar um local? Idiota.');
        }

        return $this->apiController->respondWithItem($model, new BlocoDoisDestaqueTransformer());
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
