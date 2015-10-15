<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Serializer\SerializerAbstract;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;



Route::group(['prefix' => 'api'], function (){
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', ['as' => 'posts', 'uses' => 'PostsController@all']);
        Route::get('find/{id}', ['as' => 'posts.find', 'uses' => 'PostsController@find']);
        Route::post('/', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
        Route::put('update/{id}',['as' => 'posts.update', 'uses' => 'PostsController@update']);
        Route::delete('delete/{id}', ['as' => 'posts.delete', 'uses' => 'PostsController@delete']);
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', ['as' => 'comments', 'uses' => 'CommentController@all']);
        Route::get('find/{id}', ['as' => 'comments.find', 'uses' => 'CommentController@find']);
        Route::post('/', ['as' => 'comments.create', 'uses' => 'CommentController@create']);
        Route::put('update/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
        Route::delete('delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);
    });

    Route::group(['prefix' => 'bloco-um'], function () {
        Route::get('/', ['as' => 'bloco-um', 'uses' => 'BlocoUmController@all']);
        Route::get('find/{id}', ['as' => 'bloco-um.find', 'uses' => 'BlocoUmController@find']);
        Route::post('/', ['as' => 'bloco-um.create', 'uses' => 'BlocoUmController@create']);
        Route::put('update/{id}', ['as' => 'bloco-um.update', 'uses' => 'BlocoUmController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-um.delete', 'uses' => 'BlocoUmController@delete']);
    });

    Route::group(['prefix' => 'bloco-um-destaques'], function () {
        Route::get('/', ['as' => 'bloco-um-destaques', 'uses' => 'BlocoUmDestaqueController@all']);
        Route::get('find/{id}', ['as' => 'bloco-um-destaques.find', 'uses' => 'BlocoUmDestaqueController@find']);
        Route::post('/', ['as' => 'bloco-um-destaques.create', 'uses' => 'BlocoUmDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-um-destaques.update', 'uses' => 'BlocoUmDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-um-destaques.delete', 'uses' => 'BlocoUmDestaqueController@delete']);
    });

    Route::group(['prefix' => 'images'], function () {
        Route::get('/', ['as' => 'images', 'uses' => 'ImageController@all']);
        Route::get('find/{id}', ['as' => 'images.find', 'uses' => 'ImageController@find']);
        Route::post('/', ['as' => 'images.create', 'uses' => 'ImageController@create']);
        Route::put('update/{id}', ['as' => 'images.update', 'uses' => 'ImageController@update']);
        Route::delete('delete/{id}', ['as' => 'images.delete', 'uses' => 'ImageController@delete']);
    });

    Route::group(['prefix' => 'ferramentas'], function () {
        Route::get('/', ['as' => 'ferramentas', 'uses' => 'FerramentaController@all']);
        Route::get('find/{id}', ['as' => 'ferramentas.find', 'uses' => 'FerramentaController@find']);
        Route::post('/', ['as' => 'ferramentas.create', 'uses' => 'FerramentaController@create']);
        Route::put('update/{id}', ['as' => 'ferramentas.update', 'uses' => 'FerramentaController@update']);
        Route::delete('delete/{id}', ['as' => 'ferramentas.delete', 'uses' => 'FerramentaController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois'], function () {
        Route::get('/', ['as' => 'bloco-dois', 'uses' => 'BlocoDoisController@all']);
        Route::get('find/{id}', ['as' => 'bloco-dois.find', 'uses' => 'BlocoDoisController@find']);
        Route::post('/', ['as' => 'bloco-dois.create', 'uses' => 'BlocoDoisController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois.update', 'uses' => 'BlocoDoisController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois.delete', 'uses' => 'BlocoDoisController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois-destaques'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaques', 'uses' => 'BlocoDoisDestaqueController@all']);
        Route::get('show/{id}', ['as' => 'bloco-dois-destaques.find', 'uses' => 'BlocoDoisDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaques.create', 'uses' => 'BlocoDoisDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois-destaques.update', 'uses' => 'BlocoDoisDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois-destaques.delete', 'uses' => 'BlocoDoisDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaques.status', 'uses' => 'BlocoDoisDestaqueController@status']);
    });
});


Route::controller('user', 'UserController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('botao', function () {
    return view('botao');
});

Route::get('upload', function () {
    return view('upload');
});

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
//
//Route::get('/', function (){
//
//    $users = DB::table('users')->get();
//    foreach ($users as $user){
//        echo $user->name;
//        echo "<br />";
//    }
////    return $users;
//});
//
Route::get('join', function() {

    $posts = DB::table('posts')
        ->join("users","users.id","=","posts.user_id")
        ->select("users.name","posts.title")
        ->get();
    return $posts;
});

Route::get('join3', function() {

    $posts = DB::table('comments')
        ->join("posts","posts.id","=","posts.user_id")
        ->select("comments.text","comments.id","posts.title","posts.text")
        ->get();
    return $posts;
});

Route::get('join2', function(){

    $users = DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->get();

    return $users;

});
//
//Route::get('bootstrap', function(){
//    return view('bootstrap');
//});

//
//Route::get('/hello/{name}', function ($name) {
//    return "Hello World, $name";
//});
//
//Route::get('user/{id}/profile', function ($id){
//    return "exibindo o profile de $id";
//});
//
//Route::get('user/new', ['as' => 'newUser', function (){
//    return "usuario criado com sucesso . <a href='localhost:8000/user/1/profile'>Ver perfil</a> ";
//}]);
//
//Route::get('user/{id}/profile', ['as' => 'profileuser', function ($id){
//    return "exibindo o profile de tal $id";
//}]);
//
//Route::get('user/new', ['as' => 'newUser', function () {
//    $userProfileLink = route('profileUser',['id'=>1]);
//    return "Usuário criado com sucesso.
//    <a href='$userProfileLink'>Ver Perfil</a>";
//}]);
//
//Route::group(['prefix' => 'post'], function () {
//    Route::get('/new', function () {return "/post/new"; });
//    Route::get('/edit/{id}', function ($id) {return "/post/edit/$id"; });
//    Route::get('/delete/{id}', function ($id) { return "/post/delete/$id"; });
//});
//
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
