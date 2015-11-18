<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\BlocoDoisDestaque;
use Rossina\Http\Requests\ImageRequest;
use Rossina\Image;
use Rossina\Repositories\Repository\BlocoDoisDestaqueRepositoryEloquent as BlocoDDRE;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueTransformer;

class BlocoDoisDestaqueController extends ApiController
{
    protected $apiController;
    protected $repository;
    /**
     * @var BlocoDoisDestaque
     */
    protected $blocoDoisDestaque;

    /**
     * @param ApiController $apiController
     * @param BlocoDDRE $repository
     * @param BlocoDoisDestaque $blocoDoisDestaque
     */
    public function __construct(ApiController $apiController, BlocoDDRE $repository, BlocoDoisDestaque $blocoDoisDestaque){
        $this->apiController = $apiController;
        $this->repository = $repository;
        $this->blocoDoisDestaque = $blocoDoisDestaque;
    }

    public function index()
    {
        $bloco = $this->repository->all();

        return $this->apiController->respondWithCollection($bloco, new BlocoDoisDestaqueTransformer());
    }

    public function show($id, Manager $fractal, BlocoDoisDestaqueTransformer $blocoDoisDestaqueTransformer)
    {
        $project = $this->blocoDoisDestaque->find($id);

        if(!$project){
            return Response::json([
                'error' => [
                    'message' => 'O Bloco dois destaques não foi encontrado, favor procurar outro nome'
                ]
            ], 404);
        }

        $item = new Item($project, $blocoDoisDestaqueTransformer);

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
                'message' => 'Bloco dois destaques CRIADO com sucesso',
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
                'message' => 'Bloco dois destaques MODIFICADO com sucesso',
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
                'message' => 'Bloco dois destaques DELETADO com sucesso',
                'data'    => $repository
            ]
        ], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images($id)
    {
        $camiseta = $this->repository->find($id);

        return view('products.images', compact('product'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createImage($id)
    {
        $camiseta = $this->repository->find($id);

        return view('products.create_image', compact('product'));
    }

    /**
     * @param ImageRequest $request
     * @param $id
     * @param Image $camisetaImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeImage(ImageRequest $request, $id, Image $camisetaImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $camisetaImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id'=>$id]);
    }

    /**
     * @param Image $camisetaImage
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage(Image $camisetaImage, $id)
    {
        $image = $camisetaImage->find($id);

        if(file_exists('/uploads/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $camiseta = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$camiseta->id]);
    }

}
