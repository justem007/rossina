<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fracta;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Serializer\JsonSerializer;
use Rossina\Camisetas;
use Rossina\Http\Requests;
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
//        $this->middleware('jwt.auth', ['except' => ['index', 'paginate', 'show']]);
        $this->camisetas = $camisetas;
    }

    /**
     * @param Camisetas $model
     * @return array
     */
    public function transform(Camisetas $model)
    {
        return [
            'id'          => (int) $model->id,
            'name'        => $model->name,
            'price'       => (double) $model->price,
            'price_sem'   => (double) $model->price_sem,
            'description' => $model->description,
            'info'        => $model->info,
            'user_id'     => (int) $model->user_id,
            'active'      => (boolean) $model->active,
            'quantidade'  => (int) $model->quantidade,
            'quant_p'     => (int) $model->quantidade_tamanho_p,
            'quant_m'     => (int) $model->quantidade_tamanho_m,
            'quant_g'     => (int) $model->quantidade_tamanho_g,
            'quant_gg'    => (int) $model->quantidade_tamanho_gg,
            'quant_2gg'   => (int) $model->quantidade_tamanho_2gg,
            'quant_3gg'   => (int) $model->quantidade_tamanho_3gg,
            'created_at'  => (string) $model->created_at,
            'updated_at'  => (string) $model->updated_at
        ];
    }

    /**
     * @param Manager $fractal
     * @param CamisetasTransformer $camisetasTransformer
     * @return mixed
     */
    public function index(Manager $fractal, CamisetasTransformer $camisetasTransformer)
    {
        $fractal->setSerializer(new JsonApiSerializer());

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
        $fractal->setSerializer(new JsonApiSerializer());

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
