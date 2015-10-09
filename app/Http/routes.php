<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api'], function (){
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', ['as' => 'posts', 'uses' => 'PostsController@all']);
        Route::get('find/{id}', ['as' => 'posts.find', 'uses' => 'PostsController@find']);
        Route::post('/', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
        Route::put('update/{id}', ['as' => 'posts.update', 'uses' => 'PostsController@update']);
        Route::delete('delete/{id}', ['as' => 'posts.delete', 'uses' => 'PostsController@delete']);
        Route::get('contar', ['as' => 'posts.contar', 'uses' => 'PostsController@contar']);
        Route::get('index', ['as' => 'posts.contar', 'uses' => 'PostsController@contar']);

    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', ['as' => 'comments', 'uses' => 'CommentController@all']);
        Route::get('find/{id}', ['as' => 'comments.find', 'uses' => 'CommentController@find']);
        Route::post('/', ['as' => 'comments.create', 'uses' => 'CommentController@create']);
        Route::put('update/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
        Route::delete('delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);
        Route::get('contar', ['as' => 'comments.contar', 'uses' => 'CommentController@contar']);
        Route::get('index', ['as' => 'comments.index', 'uses' => 'CommentController@index']);

    });
});

//Route::controller('user', 'UserController');

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
//Route::get('join', function() {
//
//    $posts = DB::table('posts')
//        ->join("users","users.id","=","posts.user_id")
//        ->select("users.name","posts.title")
//        ->get();
//    return $posts;
//});
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
