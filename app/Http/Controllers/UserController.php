<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use Rossina\Http\Requests;
use Rossina\Repositories\Transformers;
use Rossina\Repositories\Transformers\UserTransformer;
use Rossina\User;

class UserController extends ApiController
{
    protected $apiController;

    protected $user;

    public function __construct(ApiController $apiController, User $user)
    {
        $this->apiController = $apiController;
        $this->user = $user;
    }

    public function index()
    {
        $array = array('foo', 'bar');

        return $array;
    }

    public function all(Manager $fractal, UserTransformer $projectTransformer)
    {
        $projects = $this->user->with(['posts'])->get();

        $collection = new Collection($projects, $projectTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    public function paginate()
    {
        $paginator = $this->user->paginate();

        return $paginator;
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