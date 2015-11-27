<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use League\Fractal\Serializer\ArraySerializer;
use Rossina\BlocoCamiseta;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Camisetas;
use Rossina\Repositories\Repository\CamisetasRepositoryEloquent as CamisetasRE;
use Rossina\Repositories\Transformers\CamisetasTransformer;

class CamisetasController extends ApiController
{
    protected $repository;

    protected $apiController;
    /**
     * @var Camisetas
     */
    protected $camisetas;

    /**
     * @param CamisetasRE $repository
     * @param Camisetas $camisetas
     * @param ApiController $apiController
     */
    public function __construct(CamisetasRE $repository,Camisetas $camisetas ,ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;

        // Aplique o middleware jwt.auth a todos os métodos neste controlador
        // exceto para o método de autenticação. Nós não queremos para evitar
        // o usuário recupera o token se não tiver já
        $this->middleware('jwt.auth', ['except' => ['index', 'paginate', 'show']]);
        $this->camisetas = $camisetas;
    }

    /**
     * @param Manager $fractal
     * @param CamisetasTransformer $camisetasTransformer
     * @return mixed
     */
    public function index(Manager $fractal, CamisetasTransformer $camisetasTransformer)
    {
        $fractal->setSerializer(new ArraySerializer());

        $projects = $this->repository->with(['generos'])->all();

        $collection = new Collection($projects, $camisetasTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respondWithCORS($data);
    }

    /**
     * @return mixed
     */
    public function paginate(){

        $paginator = $this->repository->paginate();

        $bloco = $paginator->getCollection();

        $resource = new Collection($bloco, new CamisetasTransformer);

        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $paginator;
    }

    /**
     * @param $id
     * @param Manager $fractal
     * @param CamisetasTransformer $camisetasTransformer
     * @return mixed
     */
    public function show($id, Manager $fractal, CamisetasTransformer $camisetasTransformer)
    {
        $project = $this->camisetas->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'Camiseta não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

//        $item = new Item($project, $camisetasTransformer);

//        $data = $fractal->createData($item)->toArray();

        return $this->transform($project);
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
                'message' => 'Camiseta, CRIADO com sucesso',
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
                'message' => 'Camiseta, MODIFICADO com sucesso',
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
                'message' => 'Camiseta, DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }
}
