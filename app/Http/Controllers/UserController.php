<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Transformers;
use Rossina\Repositories\Transformers\UserTransformer;
use Rossina\User;

class UserController extends ApiController
{
    protected $apiController;

    protected $user;

    /**
     * @param ApiController $apiController
     * @param User $user
     */
    public function __construct(ApiController $apiController, User $user)
    {
        $this->apiController = $apiController;
        $this->user = $user;
    }

    /**
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'             => (int) $model->id,
            'name'           => $model->name,
            'email'          => $model->email,
//            'password'       => $model->password,
//            'remenber_token' => $model->remenber_token,
            'phone'          => $model->phone,
            'created_at'     => $model->created_at,
            'updated_at'     => $model->updated_at
        ];
    }

    /**
     * @return array
     */
    public function all()
    {
        $user = array();

        $data = $this->user->with([])->get();

        foreach ($data as $users) {
            $user[] = $this->transform($users);
        }

        return $user;
    }


    /**
     * @param Manager $fractal
     * @param UserTransformer $projectTransformer
     * @return mixed
     */
    public function index(Manager $fractal, UserTransformer $projectTransformer)
    {
        $projects = $this->user->with(['posts'])->get();

        $collection = new Collection($projects, $projectTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate()
    {
        $paginator = $this->user->paginate();

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param UserTransformer $userTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, UserTransformer $userTransformer)
    {
        $project = $this->user->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Usuário não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $userTransformer);

//        $data = $fractal->createData($item)->toArray();

        return $this->respond($project);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $repository = $this->user->create($request->all());

        return Response::json([
            'sucesso' => [
                'message' => 'Usuário CRIADO com sucesso',
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
        $repository = $this->user->update( $request->all(), $id );

        return Response::json([
            'sucesso' => [
                'message' => 'Usuário MODIFICADO com sucesso',
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
        $repository = $this->user->find($id)->delete();

        return Response::json([
            'sucesso' => [
                'message' => 'Usuário DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}