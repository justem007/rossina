<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonSerializer;
use Psy\Util\Json;
use Rossina\Horario;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\HorarioRepositoryEloquent;
use Rossina\Repositories\Transformers\HorarioTransformer;

class HorarioController extends ApiController
{
    /**
     * @var HorarioRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var HorarioTransformer
     */
    protected $horarioTransformer;
    /**
     * @var Horario
     */
    protected $horario;

    public function __construct(HorarioRepositoryEloquent $repository,Horario $horario ,ApiController $apiController,
                                Manager $fractal, HorarioTransformer $horarioTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->horarioTransformer = $horarioTransformer;
        $this->horario = $horario;
    }

    public function index(Manager $fractal)
    {
        $fractal->setSerializer(new JsonSerializer());

        $projects = $this->repository->with([])->all();

        $collection = new Collection($projects, new HorarioTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new horarioTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param HorarioTransformer $horarioTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, HorarioTransformer $horarioTransformer)
    {
        $fractal->setSerializer(new JsonSerializer());

        $project = $this->horario->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Horario não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $horarioTransformer);

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
                'message' => 'Horario CRIADO com sucesso',
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
                'message' => 'Horario MODIFICADO com sucesso',
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
                'message' => 'Horario DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
