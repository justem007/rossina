<?php

use Illuminate\Support\Facades\Redirect;

//Route::get('guzzle', function(){
//
//    $client = new \GuzzleHttp\Client();
//
//    $response = $client->get('http://globo.com');
//
//    dd($response->getBody());
//
//});
//
//Route::get('token', 'HorarioController@token');
//
//Route::get('blog/', function (){
//    return  Redirect::to('views/blog/index.html');
//});
//

Route::get('/', function (){
    return  Redirect::to('index.html');
});

Route::get('admin', function (){
    return  Redirect::to('admin/index.html');
});

Route::get('routes', function() {
    \Artisan::call('route:list');
    return "<pre>".\Artisan::output();
});

Route::get('/api', function () {
    return view('index');
});

Route::get('/admin-rossina', function () {
    return view('admin');
});

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});

Route::group(['prefix' => 'api'], function (){

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', ['as' => 'posts', 'uses' => 'PostsController@all']);
        Route::get('index', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
        Route::get('{id}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
        Route::post('/', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
        Route::put('{id}',['as' => 'posts.update', 'uses' => 'PostsController@update']);
        Route::delete('{id}', ['as' => 'posts.delete', 'uses' => 'PostsController@delete']);
    });

    Route::group(['prefix' => 'categoria-blogs'], function () {
        Route::get('/', ['as' => 'categoria-blogs.index', 'uses' => 'CategoriaBlogController@all']);
        Route::get('index', ['as' => 'categoria-blogs', 'uses' => 'CategoriaBlogController@index']);
        Route::get('{id}', ['as' => 'categoria-blogs.show', 'uses' => 'CategoriaBlogController@show']);
        Route::post('/', ['as' => 'categoria-blogs.create', 'uses' => 'CategoriaBlogController@create']);
        Route::put('{id}', ['as' => 'categoria-blogs.update', 'uses' => 'CategoriaBlogController@update']);
        Route::delete('{id}', ['as' => 'categoria-blogs.delete', 'uses' => 'CategoriaBlogController@delete']);
        Route::get('/paginate', ['as' => 'categoria-blogs.paginate', 'uses' => 'CategoriaBlogController@paginate']);
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', ['as' => 'comments', 'uses' => 'CommentController@all']);
        Route::get('index', ['as' => 'comments.index', 'uses' => 'CommentController@index']);
        Route::get('{id}', ['as' => 'comments.show', 'uses' => 'CommentController@show']);
        Route::post('/', ['as' => 'comments.create', 'uses' => 'CommentController@create']);
        Route::put('{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
        Route::delete('{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', ['as' => 'tags', 'uses' => 'TagController@all']);
        Route::get('{id}', ['as' => 'tags.show', 'uses' => 'TagController@show']);
        Route::post('/', ['as' => 'tags.create', 'uses' => 'TagController@create']);
        Route::put('{id}', ['as' => 'tags.update', 'uses' => 'TagController@update']);
        Route::delete('{id}', ['as' => 'tags.delete', 'uses' => 'TagController@delete']);
    });

    Route::group(['prefix' => 'images'], function () {
        Route::get('/', ['as' => 'images', 'uses' => 'ImageController@index']);
        Route::get('{id}', ['as' => 'images.show', 'uses' => 'ImageController@show']);
        Route::post('/', ['as' => 'images.create', 'uses' => 'ImageController@create']);
        Route::put('{id}', ['as' => 'images.update', 'uses' => 'ImageController@update']);
        Route::delete('{id}', ['as' => 'images.delete', 'uses' => 'ImageController@delete']);
    });

    Route::group(['prefix' => 'bloco-um'], function () {
        Route::get('/', ['as' => 'bloco-um', 'uses' => 'BlocoUmController@all']);
        Route::get('index', ['as' => 'bloco-um.index', 'uses' => 'BlocoUmController@index']);
        Route::get('{id}', ['as' => 'bloco-um.show', 'uses' => 'BlocoUmController@show']);
        Route::post('/', ['as' => 'bloco-um.create', 'uses' => 'BlocoUmController@create']);
        Route::put('{id}', ['as' => 'bloco-um.update', 'uses' => 'BlocoUmController@update']);
        Route::delete('{id}', ['as' => 'bloco-um.delete', 'uses' => 'BlocoUmController@delete']);
        Route::get('paginate', ['as' => 'bloco-um.paginate', 'uses' => 'BlocoUmController@paginate']);
    });

    Route::group(['prefix' => 'bloco-um-destaques'], function () {
        Route::get('/', ['as' => 'bloco-um-destaques', 'uses' => 'BlocoUmDestaqueController@all']);
        Route::get('index', ['as' => 'bloco-um-destaques.index', 'uses' => 'BlocoUmDestaqueController@index']);
        Route::get('{id}', ['as' => 'bloco-um-destaques.show', 'uses' => 'BlocoUmDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-um-destaques.create', 'uses' => 'BlocoUmDestaqueController@create']);
        Route::put('{id}', ['as' => 'bloco-um-destaques.update', 'uses' => 'BlocoUmDestaqueController@update']);
        Route::delete('{id}', ['as' => 'bloco-um-destaques.delete', 'uses' => 'BlocoUmDestaqueController@delete']);
    });

    Route::group(['prefix' => 'ferramentas'], function () {
        Route::get('/', ['as' => 'ferramentas', 'uses' => 'FerramentaController@all']);
        Route::get('index', ['as' => 'ferramentas.index', 'uses' => 'FerramentaController@index']);
        Route::get('{id}', ['as' => 'ferramentas.show', 'uses' => 'FerramentaController@show']);
        Route::post('/', ['as' => 'ferramentas.create', 'uses' => 'FerramentaController@create']);
        Route::put('{id}', ['as' => 'ferramentas.update', 'uses' => 'FerramentaController@update']);
        Route::delete('{id}', ['as' => 'ferramentas.delete', 'uses' => 'FerramentaController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois'], function () {
        Route::get('/', ['as' => 'bloco-dois', 'uses' => 'BlocoDoisController@all']);
        Route::get('index', ['as' => 'bloco-dois.index', 'uses' => 'BlocoDoisController@index']);
        Route::get('{id}', ['as' => 'bloco-dois.show', 'uses' => 'BlocoDoisController@show']);
        Route::post('/', ['as' => 'bloco-dois.create', 'uses' => 'BlocoDoisController@create']);
        Route::put('{id}', ['as' => 'bloco-dois.update', 'uses' => 'BlocoDoisController@update']);
        Route::delete('{id}', ['as' => 'bloco-dois.delete', 'uses' => 'BlocoDoisController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois-destaques'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaques', 'uses' => 'BlocoDoisDestaqueController@all']);
        Route::get('index', ['as' => 'bloco-dois-destaques.index', 'uses' => 'BlocoDoisDestaqueController@index']);
        Route::get('{id}', ['as' => 'bloco-dois-destaques.show', 'uses' => 'BlocoDoisDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaques.create', 'uses' => 'BlocoDoisDestaqueController@create']);
        Route::put('{id}', ['as' => 'bloco-dois-destaques.update', 'uses' => 'BlocoDoisDestaqueController@update']);
        Route::delete('{id}', ['as' => 'bloco-dois-destaques.delete', 'uses' => 'BlocoDoisDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaques.status', 'uses' => 'BlocoDoisDestaqueController@status']);
    });

    Route::group(['prefix' => 'bloco-dois-destaque-um'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaque-um', 'uses' => 'BlocoDoisDestaqueUmController@all']);
        Route::get('index', ['as' => 'bloco-dois-destaque-um.index', 'uses' => 'BlocoDoisDestaqueUmController@index']);
        Route::get('{id}', ['as' => 'bloco-dois-destaque-um.show', 'uses' => 'BlocoDoisDestaqueUmController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaque-um.create', 'uses' => 'BlocoDoisDestaqueUmController@create']);
        Route::put('{id}', ['as' => 'bloco-dois-destaque-um.update', 'uses' => 'BlocoDoisDestaqueUmController@update']);
        Route::delete('{id}', ['as' => 'bloco-dois-destaque-um.delete', 'uses' => 'BlocoDoisDestaqueUmController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaque-um.status', 'uses' => 'BlocoDoisDestaqueUmController@status']);
    });

    Route::group(['prefix' => 'bloco-dois-destaque-dois'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaque-dois', 'uses' => 'BlocoDoisDestaqueDoisController@all']);
        Route::get('index', ['as' => 'bloco-dois-destaque-dois.index', 'uses' => 'BlocoDoisDestaqueDoisController@index']);
        Route::get('{id}', ['as' => 'bloco-dois-destaque-dois.show', 'uses' => 'BlocoDoisDestaqueDoisController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaque-dois.create', 'uses' => 'BlocoDoisDestaqueDoisController@create']);
        Route::put('{id}', ['as' => 'bloco-dois-destaque-dois.update', 'uses' => 'BlocoDoisDestaqueDoisController@update']);
        Route::delete('{id}', ['as' => 'bloco-dois-destaque-dois.delete', 'uses' => 'BlocoDoisDestaqueDoisController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaque-dois.status', 'uses' => 'BlocoDoisDestaqueDoisController@status']);
    });

    Route::group(['prefix' => 'bloco-camisetas'], function () {
        Route::get('/', ['as' => 'bloco-camisetas', 'uses' => 'BlocoCamisetaController@all']);
        Route::get('index', ['as' => 'bloco-camisetas.index', 'uses' => 'BlocoCamisetaController@index']);
        Route::get('{id}', ['as' => 'bloco-camisetas.show', 'uses' => 'BlocoCamisetaController@show']);
        Route::post('/', ['as' => 'bloco-camisetas.create', 'uses' => 'BlocoCamisetaController@create']);
        Route::put('{id}', ['as' => 'bloco-camisetas.update', 'uses' => 'BlocoCamisetaController@update']);
        Route::delete('{id}', ['as' => 'bloco-camisetas.delete', 'uses' => 'BlocoCamisetaController@delete']);
        Route::get('status', ['as' => 'bloco-camisetas.status', 'uses' => 'BlocoCamisetaController@status']);
    });

    Route::group(['prefix' => 'bloco-camiseta-destaques'], function () {
        Route::get('/', ['as' => 'bloco-camiseta-destaques', 'uses' => 'BlocoCamisetaDestaqueController@all']);
        Route::get('index', ['as' => 'bloco-camiseta-destaques.index', 'uses' => 'BlocoCamisetaDestaqueController@index']);
        Route::get('{id}', ['as' => 'bloco-camiseta-destaques.show', 'uses' => 'BlocoCamisetaDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-camiseta-destaques.create', 'uses' => 'BlocoCamisetaDestaqueController@create']);
        Route::put('{id}', ['as' => 'bloco-camiseta-destaques.update', 'uses' => 'BlocoCamisetaDestaqueController@update']);
        Route::delete('{id}', ['as' => 'bloco-camiseta-destaques.delete', 'uses' => 'BlocoCamisetaDestaqueController@delete']);
    });

    Route::group(['prefix' => 'bloco-tecidos'], function () {
        Route::get('/', ['as' => 'bloco-tecidos', 'uses' => 'BlocoTecidoController@index']);
        Route::get('{id}', ['as' => 'bloco-tecidos.show', 'uses' => 'BlocoTecidoController@show']);
        Route::post('/', ['as' => 'bloco-tecidos.create', 'uses' => 'BlocoTecidoController@create']);
        Route::put('{id}', ['as' => 'bloco-tecidos.update', 'uses' => 'BlocoTecidoController@update']);
        Route::delete('{id}', ['as' => 'bloco-tecidos.delete', 'uses' => 'BlocoTecidoController@delete']);
        Route::get('status', ['as' => 'bloco-tecidos.status', 'uses' => 'BlocoTecidoController@status']);
    });

    Route::group(['prefix' => 'bloco-tecido-destaques'], function () {
        Route::get('/', ['as' => 'bloco-tecido-destaques', 'uses' => 'BlocoTecidoDestaqueController@index']);
        Route::get('{id}', ['as' => 'bloco-tecido-destaques.show', 'uses' => 'BlocoTecidoDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-tecido-destaques.create', 'uses' => 'BlocoTecidoDestaqueController@create']);
        Route::put('{id}', ['as' => 'bloco-tecido-destaques.update', 'uses' => 'BlocoTecidoDestaqueController@update']);
        Route::delete('{id}', ['as' => 'bloco-tecido-destaques.delete', 'uses' => 'BlocoTecidoDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-tecido-destaques.status', 'uses' => 'BlocoTecidoDestaqueController@status']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'UserController@index']);
        Route::get('paginate', ['as' => 'users', 'uses' => 'UserController@paginate']);
        Route::get('{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
        Route::post('/', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::put('{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
        Route::delete('{id}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);
    });

    Route::group(['prefix' => 'categorias'], function () {
        Route::get('/', ['as' => 'categorias', 'uses' => 'CategoriaController@all']);
        Route::get('index', ['as' => 'categorias', 'uses' => 'CategoriaController@index']);
        Route::get('{id}', ['as' => 'categorias.show', 'uses' => 'CategoriaController@show']);
        Route::post('/', ['as' => 'categorias.create', 'uses' => 'CategoriaController@create']);
        Route::put('{id}', ['as' => 'categorias.update', 'uses' => 'CategoriaController@update']);
        Route::delete('{id}', ['as' => 'categorias.delete', 'uses' => 'CategoriaController@delete']);
    });

    Route::group(['prefix' => 'camisetas'], function () {
        Route::get('/', ['as' => 'camisetas', 'uses' => 'CamisetasController@index']);
        Route::get('paginate', ['as' => 'camisetas', 'uses' => 'CamisetasController@paginate']);
        Route::get('{id}', ['as' => 'camisetas.show', 'uses' => 'CamisetasController@show']);
        Route::post('/', ['as' => 'camisetas.create', 'uses' => 'CamisetasController@create']);
        Route::put('{id}', ['as' => 'camisetas.update', 'uses' => 'CamisetasController@update']);
        Route::delete('{id}', ['as' => 'camisetas.delete', 'uses' => 'CamisetasController@delete']);
    });

    Route::group(['prefix' => 'generos'], function () {
        Route::get('/', ['as' => 'generos', 'uses' => 'GeneroController@index']);
        Route::get('paginate', ['as' => 'generos', 'uses' => 'GeneroController@paginate']);
        Route::get('{id}', ['as' => 'generos.show', 'uses' => 'GeneroController@show']);
        Route::post('/', ['as' => 'generos.create', 'uses' => 'GeneroController@create']);
        Route::put('{id}', ['as' => 'generos.update', 'uses' => 'GeneroController@update']);
        Route::delete('{id}', ['as' => 'generos.delete', 'uses' => 'GeneroController@delete']);
    });

    Route::group(['prefix' => 'cors'], function () {
        Route::get('/', ['as' => 'cors', 'uses' => 'CorController@index']);
        Route::get('paginate', ['as' => 'cors', 'uses' => 'CorController@paginate']);
        Route::get('{id}', ['as' => 'cors.show', 'uses' => 'CorController@show']);
        Route::post('/', ['as' => 'cors.create', 'uses' => 'CorController@create']);
        Route::put('{id}', ['as' => 'cors.update', 'uses' => 'CorController@update']);
        Route::delete('{id}', ['as' => 'cors.delete', 'uses' => 'CorController@delete']);
    });

    Route::group(['prefix' => 'tamanhos'], function () {
        Route::get('/', ['as' => 'tamanhos', 'uses' => 'TamanhoController@index']);
        Route::get('paginate', ['as' => 'tamanhos', 'uses' => 'TamanhoController@paginate']);
        Route::get('{id}', ['as' => 'tamanhos.show', 'uses' => 'TamanhoController@show']);
        Route::post('/', ['as' => 'tamanhos.create', 'uses' => 'TamanhoController@create']);
        Route::put('{id}', ['as' => 'tamanhos.update', 'uses' => 'TamanhoController@update']);
        Route::delete('{id}', ['as' => 'tamanhos.delete', 'uses' => 'TamanhoController@delete']);
    });

    Route::group(['prefix' => 'silks'], function () {
        Route::get('/', ['as' => 'silks', 'uses' => 'SilkController@index']);
        Route::get('paginate', ['as' => 'silks', 'uses' => 'SilkController@paginate']);
        Route::get('{id}', ['as' => 'silks.show', 'uses' => 'SilkController@show']);
        Route::post('/', ['as' => 'silks.create', 'uses' => 'SilkController@create']);
        Route::put('{id}', ['as' => 'silks.update', 'uses' => 'SilkController@update']);
        Route::delete('{id}', ['as' => 'silks.delete', 'uses' => 'SilkController@delete']);
    });

    Route::group(['prefix' => 'categoria-tecidos'], function () {
        Route::get('/', ['as' => 'categoria-tecidos', 'uses' => 'CategoriaTecidoController@index']);
        Route::get('paginate', ['as' => 'categoria-tecidos', 'uses' => 'CategoriaTecidoController@paginate']);
        Route::get('{id}', ['as' => 'categoria-tecidos.show', 'uses' => 'CategoriaTecidoController@show']);
        Route::post('/', ['as' => 'categoria-tecidos.create', 'uses' => 'CategoriaTecidoController@create']);
        Route::put('{id}', ['as' => 'categoria-tecidos.update', 'uses' => 'CategoriaTecidoController@update']);
        Route::delete('{id}', ['as' => 'categoria-tecidos.delete', 'uses' => 'CategoriaTecidoController@delete']);
    });

    Route::group(['prefix' => 'tecidos'], function () {
        Route::get('/', ['as' => 'tecidos', 'uses' => 'TecidoController@index']);
        Route::get('paginate', ['as' => 'tecidos', 'uses' => 'TecidoController@paginate']);
        Route::get('{id}', ['as' => 'tecidos.show', 'uses' => 'TecidoController@show']);
        Route::post('/', ['as' => 'tecidos.create', 'uses' => 'TecidoController@create']);
        Route::put('{id}', ['as' => 'tecidos.update', 'uses' => 'TecidoController@update']);
        Route::delete('{id}', ['as' => 'tecidos.delete', 'uses' => 'TecidoController@delete']);
    });

    Route::group(['prefix' => 'tecido-images'], function () {
        Route::get('/', ['as' => 'tecido-images', 'uses' => 'TecimageController@index']);
        Route::get('paginate', ['as' => 'tecido-images', 'uses' => 'TecimageController@paginate']);
        Route::get('{id}', ['as' => 'tecido-images.show', 'uses' => 'TecimageController@show']);
        Route::post('/', ['as' => 'tecido-images.create', 'uses' => 'TecimageController@create']);
        Route::put('{id}', ['as' => 'tecido-images.update', 'uses' => 'TecimageController@update']);
        Route::delete('{id}', ['as' => 'tecido-images.delete', 'uses' => 'TecimageController@delete']);
    });

    Route::group(['prefix' => 'tecido-amostras'], function () {
        Route::get('/', ['as' => 'tecido-amostras', 'uses' => 'TecidoAmostraController@index']);
        Route::get('paginate', ['as' => 'tecido-amostras', 'uses' => 'TecidoAmostraController@paginate']);
        Route::get('{id}', ['as' => 'tecido-amostras.show', 'uses' => 'TecidoAmostraController@show']);
        Route::post('/', ['as' => 'tecido-amostras.create', 'uses' => 'TecidoAmostraController@create']);
        Route::put('{id}', ['as' => 'tecido-amostras.update', 'uses' => 'TecidoAmostraController@update']);
        Route::delete('{id}', ['as' => 'tecido-amostras.delete', 'uses' => 'TecidoAmostraController@delete']);
    });

    Route::group(['prefix' => 'horarios'], function () {
        Route::get('/', ['as' => 'horarios', 'uses' => 'HorarioController@index']);
        Route::get('paginate', ['as' => 'horarios', 'uses' => 'HorarioController@paginate']);
        Route::get('{id}', ['as' => 'horarios.show', 'uses' => 'HorarioController@show']);
        Route::post('/', ['as' => 'horarios.create', 'uses' => 'HorarioController@create']);
        Route::put('{id}', ['as' => 'horarios.update', 'uses' => 'HorarioController@update']);
        Route::delete('{id}', ['as' => 'horarios.delete', 'uses' => 'HorarioController@delete']);
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', ['as' => 'menus', 'uses' => 'MenuController@index']);
        Route::get('paginate', ['as' => 'menus', 'uses' => 'MenuController@paginate']);
        Route::get('{id}', ['as' => 'menus.show', 'uses' => 'MenuController@show']);
        Route::post('/', ['as' => 'menus.create', 'uses' => 'MenuController@create']);
        Route::put('{id}', ['as' => 'menus.update', 'uses' => 'MenuController@update']);
        Route::delete('{id}', ['as' => 'menus.delete', 'uses' => 'MenuController@delete']);
    });

    Route::group(['prefix' => 'faqs'], function () {
        Route::get('/', ['as' => 'faqs', 'uses' => 'FaqController@index']);
        Route::get('paginate', ['as' => 'faqs', 'uses' => 'FaqController@paginate']);
        Route::get('{id}', ['as' => 'faqs.show', 'uses' => 'FaqController@show']);
        Route::post('/', ['as' => 'faqs.create', 'uses' => 'FaqController@create']);
        Route::put('{id}', ['as' => 'faqs.update', 'uses' => 'FaqController@update']);
        Route::delete('{id}', ['as' => 'faqs.delete', 'uses' => 'FaqController@delete']);
    });

    Route::group(['prefix' => 'categoria-faqs'], function () {
        Route::get('/', ['as' => 'categoria-faqs', 'uses' => 'CategoriaFaqController@index']);
        Route::get('paginate', ['as' => 'categoria-faqs', 'uses' => 'CategoriaFaqController@paginate']);
        Route::get('{id}', ['as' => 'categoria-faqs.show', 'uses' => 'CategoriaFaqController@show']);
        Route::post('/', ['as' => 'categoria-faqs.create', 'uses' => 'CategoriaFaqController@create']);
        Route::put('{id}', ['as' => 'categoria-faqs.update', 'uses' => 'CategoriaFaqController@update']);
        Route::delete('{id}', ['as' => 'categoria-faqs.delete', 'uses' => 'CategoriaFaqController@delete']);
    });

    Route::group(['prefix' => 'sobre-nos'], function () {
        Route::get('/', ['as' => 'sobre-nos', 'uses' => 'SobreNosController@index']);
        Route::get('paginate', ['as' => 'sobre-nos', 'uses' => 'SobreNosController@paginate']);
        Route::get('{id}', ['as' => 'sobre-nos.show', 'uses' => 'SobreNosController@show']);
        Route::post('/', ['as' => 'sobre-nos.create', 'uses' => 'SobreNosController@create']);
        Route::put('{id}', ['as' => 'sobre-nos.update', 'uses' => 'SobreNosController@update']);
        Route::delete('{id}', ['as' => 'sobre-nos.delete', 'uses' => 'SobreNosController@delete']);
    });
});

//DB::listen(function($sql, $bindings, $time) {
//
//    if (App::environment()=="local"){
//        $xsql = explode("?", $sql);
//        $nsql = "";
//        for ($i=0; $i < count($xsql)-1; $i++) {
//            $nsql .= $xsql[$i] . $bindings[$i];
//        }
//        $view_log = new Logger("SQL");
//        $view_log->pushHandler(
//            new StreamHandler(storage_path().'/logs/sql.log')
//        );
//        $view_log->addInfo($nsql?:$sql);
//    }
//});

