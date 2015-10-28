<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

Route::get('guzzle', function(){

    $client = new \GuzzleHttp\Client();

    $response = $client->get('http://globo.com');

    dd($response->getBody());

});

Route::get('/', function (){
    return  Redirect::to('index.html');
});

//Route::get('/', 'HomeController@principal');

Route::get('routes', function() {
    \Artisan::call('route:list');
    return "<pre>".\Artisan::output();
});

Route::group(['prefix' => 'api'], function (){

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', ['as' => 'posts', 'uses' => 'PostsController@index']);
        Route::get('index', ['as' => 'posts', 'uses' => 'PostsController@index']);
        Route::get('show/{id}', ['as' => 'posts.find', 'uses' => 'PostsController@show']);
        Route::post('/', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
        Route::put('update/{id}',['as' => 'posts.update', 'uses' => 'PostsController@update']);
        Route::delete('delete/{id}', ['as' => 'posts.delete', 'uses' => 'PostsController@delete']);
        Route::get('last/{n?}', 'PostsController@last');
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', ['as' => 'comments', 'uses' => 'CommentController@index']);
        Route::get('find/{id}', ['as' => 'comments.find', 'uses' => 'CommentController@find']);
        Route::post('/', ['as' => 'comments.create', 'uses' => 'CommentController@create']);
        Route::put('update/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
        Route::delete('delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', ['as' => 'tags', 'uses' => 'TagController@index']);
        Route::get('find/{id}', ['as' => 'tags.find', 'uses' => 'TagController@find']);
        Route::post('/', ['as' => 'tags.create', 'uses' => 'TagController@create']);
        Route::put('update/{id}', ['as' => 'tags.update', 'uses' => 'TagController@update']);
        Route::delete('delete/{id}', ['as' => 'tags.delete', 'uses' => 'TagController@delete']);
    });

    Route::group(['prefix' => 'images'], function () {
        Route::get('/', ['as' => 'images', 'uses' => 'ImageController@index']);
        Route::get('find/{id}', ['as' => 'images.find', 'uses' => 'ImageController@find']);
        Route::post('/', ['as' => 'images.create', 'uses' => 'ImageController@create']);
        Route::put('update/{id}', ['as' => 'images.update', 'uses' => 'ImageController@update']);
        Route::delete('delete/{id}', ['as' => 'images.delete', 'uses' => 'ImageController@delete']);
    });

    Route::group(['prefix' => 'bloco-um'], function () {
        Route::get('/', ['as' => 'bloco-um', 'uses' => 'BlocoUmController@index']);
        Route::get('find', ['as' => 'bloco-um.find', 'uses' => 'BlocoUmController@find']);
        Route::post('/', ['as' => 'bloco-um.create', 'uses' => 'BlocoUmController@create']);
        Route::put('update/{id}', ['as' => 'bloco-um.update', 'uses' => 'BlocoUmController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-um.delete', 'uses' => 'BlocoUmController@delete']);
    });

    Route::group(['prefix' => 'bloco-um-destaques'], function () {
        Route::get('/', ['as' => 'bloco-um-destaques', 'uses' => 'BlocoUmDestaqueController@index']);
        Route::get('find/{id}', ['as' => 'bloco-um-destaques.find', 'uses' => 'BlocoUmDestaqueController@find']);
        Route::post('/', ['as' => 'bloco-um-destaques.create', 'uses' => 'BlocoUmDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-um-destaques.update', 'uses' => 'BlocoUmDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-um-destaques.delete', 'uses' => 'BlocoUmDestaqueController@delete']);
    });

    Route::group(['prefix' => 'ferramentas'], function () {
        Route::get('/', ['as' => 'ferramentas', 'uses' => 'FerramentaController@index']);
        Route::get('find/{id}', ['as' => 'ferramentas.find', 'uses' => 'FerramentaController@find']);
        Route::post('/', ['as' => 'ferramentas.create', 'uses' => 'FerramentaController@create']);
        Route::put('update/{id}', ['as' => 'ferramentas.update', 'uses' => 'FerramentaController@update']);
        Route::delete('delete/{id}', ['as' => 'ferramentas.delete', 'uses' => 'FerramentaController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois'], function () {
        Route::get('/', ['as' => 'bloco-dois', 'uses' => 'BlocoDoisController@index']);
        Route::get('find/{id}', ['as' => 'bloco-dois.find', 'uses' => 'BlocoDoisController@find']);
        Route::post('/', ['as' => 'bloco-dois.create', 'uses' => 'BlocoDoisController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois.update', 'uses' => 'BlocoDoisController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois.delete', 'uses' => 'BlocoDoisController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois-destaques'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaques', 'uses' => 'BlocoDoisDestaqueController@index']);
        Route::get('show/{id}', ['as' => 'bloco-dois-destaques.find', 'uses' => 'BlocoDoisDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaques.create', 'uses' => 'BlocoDoisDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois-destaques.update', 'uses' => 'BlocoDoisDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois-destaques.delete', 'uses' => 'BlocoDoisDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaques.status', 'uses' => 'BlocoDoisDestaqueController@status']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'UserController@all']);
        Route::get('paginate', ['as' => 'users', 'uses' => 'UserController@paginate']);
        Route::get('show/{id}', ['as' => 'users.find', 'uses' => 'UserController@show']);
        Route::post('/', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::put('update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
        Route::delete('delete/{id}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);
    });

    Route::group(['prefix' => 'camisetas'], function () {
        Route::get('/', ['as' => 'camisetas', 'uses' => 'CamisetasController@index']);
        Route::get('paginate', ['as' => 'camisetas', 'uses' => 'CamisetasController@paginate']);
        Route::get('show/{id}', ['as' => 'camisetas.find', 'uses' => 'CamisetasController@show']);
        Route::post('/', ['as' => 'camisetas.create', 'uses' => 'CamisetasController@create']);
        Route::put('update/{id}', ['as' => 'camisetas.update', 'uses' => 'CamisetasController@update']);
        Route::delete('delete/{id}', ['as' => 'camisetas.delete', 'uses' => 'CamisetasController@delete']);

        Route::get('genero', ['as' => 'genero', 'uses' => 'GeneroController@index']);
        Route::get('cor', ['as' => 'cor', 'uses' => 'CorController@index']);
        Route::get('tamanhos', ['as' => 'tamanhos', 'uses' => 'TamanhoController@index']);
        Route::get('silk', ['as' => 'silk', 'uses' => 'SilkController@index']);
    });

    Route::group(['prefix' => 'tecidos'], function () {
        Route::get('/', ['as' => 'tecidos', 'uses' => 'TecidoController@index']);
        Route::get('paginate', ['as' => 'tecidos', 'uses' => 'TecidoController@paginate']);
        Route::get('show/{id}', ['as' => 'tecidos.find', 'uses' => 'TecidoController@show']);
        Route::post('/', ['as' => 'tecidos.create', 'uses' => 'TecidoController@create']);
        Route::put('update/{id}', ['as' => 'tecidos.update', 'uses' => 'TecidoController@update']);
        Route::delete('delete/{id}', ['as' => 'tecidos.delete', 'uses' => 'TecidoController@delete']);
        Route::get('status', 'StatusProducaoController@index');
    });
});

Route::get('collection', function(){

    $posts = DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->where('user_id', '=', 1)
        ->get();

    return $collection = (['data'=>[
        $posts
    ]
    ]);
});

Route::get('botao', function () {
    return view('botao');
});

//Route::get('/', function () {
//    return view('index.html');
//});

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Route::resource('user', 'UserController');
//
//Route::get('routes', function() {
//    \Artisan::call('route:list');
//    return "<pre>".\Artisan::output();
//});

//Route::get('/', function (){
//
//    $users = DB::table('users')->get();
//    foreach ($users as $user){
//        echo $user->name;
//        echo "<br />";
//    }
//   return $users;
//});

//Route::get('join', function() {
//
//    $posts = DB::table('posts')
//        ->join("users","users.id","=","posts.user_id")
//        ->select("users.name","posts.title")
//        ->get();
//    return $posts;
//});

//Route::get('join3', function() {
//
//    $posts = DB::table('comments')
//        ->join("posts","posts.id","=","posts.user_id")
//        ->select("comments.text","comments.id","posts.title","posts.text")
//        ->get();
//    return $posts;
//});

//Route::get('join2', function(){
//
//    $users = DB::table('users')
//        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
//        ->get();
//
//    return $users;

//});

//Route::get('bootstrap', function(){
//    return view('bootstrap');
//});

//Route::get('/hello/{name}', function ($name) {
//    return "Hello World, $name";
//});

//Route::get('user/{id}/profile', function ($id){
//    return "exibindo o profile de $id";
//});

//Route::get('user/new', ['as' => 'newUser', function (){
//    return "usuario criado com sucesso . <a href='localhost:8000/user/1/profile'>Ver perfil</a> ";
//}]);
//
//Route::get('user/{id}/profile', ['as' => 'profileuser', function ($id){
//    return "exibindo o profile de tal $id";
//}]);

//Route::get('user/new', ['as' => 'newUser', function () {
//    $userProfileLink = route('profileUser',['id'=>1]);
//    return "Usuário criado com sucesso.
//    <a href='$userProfileLink'>Ver Perfil</a>";
//}]);

//Route::get('/testlogin', ['middleware' => 'auth', function () {
//    return "logged!";
//}]);


DB::listen(function($sql, $bindings, $time) {

    if (App::environment()=="local"){
        $xsql = explode("?", $sql);
        $nsql = "";
        for ($i=0; $i < count($xsql)-1; $i++) {
            $nsql .= $xsql[$i] . $bindings[$i];
        }
        $view_log = new Logger("SQL");
        $view_log->pushHandler(
            new StreamHandler(storage_path().'/logs/sql.log')
        );
        $view_log->addInfo($nsql?:$sql);
    }
});

