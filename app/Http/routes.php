<?php

//use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Redirect;
//use Monolog\Handler\StreamHandler;
//use Monolog\Logger;

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
//Route::get('/', function (){
//    return  Redirect::to('index.html');
//});
//
////Route::get('/', 'HomeController@principal');
//
//Route::get('routes', function() {
//    \Artisan::call('route:list');
//    return "<pre>".\Artisan::output();
//});

Route::group(['prefix' => 'api'], function (){

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', ['as' => 'posts', 'uses' => 'PostsController@index']);
        Route::get('index', ['as' => 'posts', 'uses' => 'PostsController@index']);
        Route::get('show/{id}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
        Route::post('/', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
        Route::put('update/{id}',['as' => 'posts.update', 'uses' => 'PostsController@update']);
        Route::delete('delete/{id}', ['as' => 'posts.delete', 'uses' => 'PostsController@delete']);
    });

    Route::group(['prefix' => 'categorias'], function () {
        Route::get('/', ['as' => 'categorias', 'uses' => 'CategoriaController@index']);
        Route::get('show/{id}', ['as' => 'categorias.show', 'uses' => 'CategoriaController@show']);
        Route::post('/', ['as' => 'categorias.create', 'uses' => 'CategoriaController@create']);
        Route::put('update/{id}', ['as' => 'categorias.update', 'uses' => 'CategoriaController@update']);
        Route::delete('delete/{id}', ['as' => 'categorias.delete', 'uses' => 'CategoriaController@delete']);
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', ['as' => 'comments', 'uses' => 'CommentController@index']);
        Route::get('show/{id}', ['as' => 'comments.show', 'uses' => 'CommentController@show']);
        Route::post('/', ['as' => 'comments.create', 'uses' => 'CommentController@create']);
        Route::put('update/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
        Route::delete('delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', ['as' => 'tags', 'uses' => 'TagController@index']);
        Route::get('show/{id}', ['as' => 'tags.show', 'uses' => 'TagController@show']);
        Route::post('/', ['as' => 'tags.create', 'uses' => 'TagController@create']);
        Route::put('update/{id}', ['as' => 'tags.update', 'uses' => 'TagController@update']);
        Route::delete('delete/{id}', ['as' => 'tags.delete', 'uses' => 'TagController@delete']);
    });

    Route::group(['prefix' => 'images'], function () {
        Route::get('/', ['as' => 'images', 'uses' => 'ImageController@index']);
        Route::get('show/{id}', ['as' => 'images.show', 'uses' => 'ImageController@show']);
        Route::post('/', ['as' => 'images.create', 'uses' => 'ImageController@create']);
        Route::put('update/{id}', ['as' => 'images.update', 'uses' => 'ImageController@update']);
        Route::delete('delete/{id}', ['as' => 'images.delete', 'uses' => 'ImageController@delete']);
    });

    Route::group(['prefix' => 'bloco-um'], function () {
        Route::get('/', ['as' => 'bloco-um', 'uses' => 'BlocoUmController@index']);
        Route::get('show/{id}', ['as' => 'bloco-um.show', 'uses' => 'BlocoUmController@show']);
        Route::post('/', ['as' => 'bloco-um.create', 'uses' => 'BlocoUmController@create']);
        Route::put('update/{id}', ['as' => 'bloco-um.update', 'uses' => 'BlocoUmController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-um.delete', 'uses' => 'BlocoUmController@delete']);
        Route::get('paginate', ['as' => 'bloco-um.paginate', 'uses' => 'BlocoUmController@paginate']);
    });

    Route::group(['prefix' => 'bloco-um-destaques'], function () {
        Route::get('/', ['as' => 'bloco-um-destaques', 'uses' => 'BlocoUmDestaqueController@index']);
        Route::get('show/{id}', ['as' => 'bloco-um-destaques.show', 'uses' => 'BlocoUmDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-um-destaques.create', 'uses' => 'BlocoUmDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-um-destaques.update', 'uses' => 'BlocoUmDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-um-destaques.delete', 'uses' => 'BlocoUmDestaqueController@delete']);
    });

    Route::group(['prefix' => 'ferramentas'], function () {
        Route::get('/', ['as' => 'ferramentas', 'uses' => 'FerramentaController@index']);
        Route::get('show/{id}', ['as' => 'ferramentas.show', 'uses' => 'FerramentaController@show']);
        Route::post('/', ['as' => 'ferramentas.create', 'uses' => 'FerramentaController@create']);
        Route::put('update/{id}', ['as' => 'ferramentas.update', 'uses' => 'FerramentaController@update']);
        Route::delete('delete/{id}', ['as' => 'ferramentas.delete', 'uses' => 'FerramentaController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois'], function () {
        Route::get('/', ['as' => 'bloco-dois', 'uses' => 'BlocoDoisController@index']);
        Route::get('show/{id}', ['as' => 'bloco-dois.show', 'uses' => 'BlocoDoisController@show']);
        Route::post('/', ['as' => 'bloco-dois.create', 'uses' => 'BlocoDoisController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois.update', 'uses' => 'BlocoDoisController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois.delete', 'uses' => 'BlocoDoisController@delete']);
    });

    Route::group(['prefix' => 'bloco-dois-destaques'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaques', 'uses' => 'BlocoDoisDestaqueController@index']);
        Route::get('show/{id}', ['as' => 'bloco-dois-destaques.show', 'uses' => 'BlocoDoisDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaques.create', 'uses' => 'BlocoDoisDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois-destaques.update', 'uses' => 'BlocoDoisDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois-destaques.delete', 'uses' => 'BlocoDoisDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaques.status', 'uses' => 'BlocoDoisDestaqueController@status']);
    });

    Route::group(['prefix' => 'bloco-dois-destaque-um'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaque-um', 'uses' => 'BlocoDoisDestaqueUmController@index']);
        Route::get('show/{id}', ['as' => 'bloco-dois-destaque-um.show', 'uses' => 'BlocoDoisDestaqueUmController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaque-um.create', 'uses' => 'BlocoDoisDestaqueUmController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois-destaque-um.update', 'uses' => 'BlocoDoisDestaqueUmController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois-destaque-um.delete', 'uses' => 'BlocoDoisDestaqueUmController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaque-um.status', 'uses' => 'BlocoDoisDestaqueUmController@status']);
    });

    Route::group(['prefix' => 'bloco-dois-destaque-dois'], function () {
        Route::get('/', ['as' => 'bloco-dois-destaque-dois', 'uses' => 'BlocoDoisDestaqueDoisController@index']);
        Route::get('show/{id}', ['as' => 'bloco-dois-destaque-dois.show', 'uses' => 'BlocoDoisDestaqueDoisController@show']);
        Route::post('/', ['as' => 'bloco-dois-destaque-dois.create', 'uses' => 'BlocoDoisDestaqueDoisController@create']);
        Route::put('update/{id}', ['as' => 'bloco-dois-destaque-dois.update', 'uses' => 'BlocoDoisDestaqueDoisController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-dois-destaque-dois.delete', 'uses' => 'BlocoDoisDestaqueDoisController@delete']);
        Route::get('status', ['as' => 'bloco-dois-destaque-dois.status', 'uses' => 'BlocoDoisDestaqueDoisController@status']);
    });

    Route::group(['prefix' => 'bloco-camisetas'], function () {
        Route::get('/', ['as' => 'bloco-camisetas', 'uses' => 'BlocoCamisetaController@index']);
        Route::get('show/{id}', ['as' => 'bloco-camisetas.show', 'uses' => 'BlocoCamisetaController@show']);
        Route::post('/', ['as' => 'bloco-camisetas.create', 'uses' => 'BlocoCamisetaController@create']);
        Route::put('update/{id}', ['as' => 'bloco-camisetas.update', 'uses' => 'BlocoCamisetaController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-camisetas.delete', 'uses' => 'BlocoCamisetaController@delete']);
        Route::get('status', ['as' => 'bloco-camisetas.status', 'uses' => 'BlocoCamisetaController@status']);
    });

    Route::group(['prefix' => 'bloco-camiseta-destaques'], function () {
        Route::get('/', ['as' => 'bloco-camiseta-destaques', 'uses' => 'BlocoCamisetaDestaqueController@index']);
        Route::get('show/{id}', ['as' => 'bloco-camiseta-destaques.show', 'uses' => 'BlocoCamisetaDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-camiseta-destaques.create', 'uses' => 'BlocoCamisetaDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-camiseta-destaques.update', 'uses' => 'BlocoCamisetaDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-camiseta-destaques.delete', 'uses' => 'BlocoCamisetaDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-camiseta-destaques.status', 'uses' => 'BlocoCamisetaDestaqueController@status']);
    });

    Route::group(['prefix' => 'bloco-tecidos'], function () {
        Route::get('/', ['as' => 'bloco-tecidos', 'uses' => 'BlocoTecidoController@index']);
        Route::get('show/{id}', ['as' => 'bloco-tecidos.show', 'uses' => 'BlocoTecidoController@show']);
        Route::post('/', ['as' => 'bloco-tecidos.create', 'uses' => 'BlocoTecidoController@create']);
        Route::put('update/{id}', ['as' => 'bloco-tecidos.update', 'uses' => 'BlocoTecidoController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-tecidos.delete', 'uses' => 'BlocoTecidoController@delete']);
        Route::get('status', ['as' => 'bloco-tecidos.status', 'uses' => 'BlocoTecidoController@status']);
    });

    Route::group(['prefix' => 'bloco-tecido-destaques'], function () {
        Route::get('/', ['as' => 'bloco-tecido-destaques', 'uses' => 'BlocoTecidoDestaqueController@index']);
        Route::get('show/{id}', ['as' => 'bloco-tecido-destaques.show', 'uses' => 'BlocoTecidoDestaqueController@show']);
        Route::post('/', ['as' => 'bloco-tecido-destaques.create', 'uses' => 'BlocoTecidoDestaqueController@create']);
        Route::put('update/{id}', ['as' => 'bloco-tecido-destaques.update', 'uses' => 'BlocoTecidoDestaqueController@update']);
        Route::delete('delete/{id}', ['as' => 'bloco-tecido-destaques.delete', 'uses' => 'BlocoTecidoDestaqueController@delete']);
        Route::get('status', ['as' => 'bloco-tecido-destaques.status', 'uses' => 'BlocoTecidoDestaqueController@status']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'UserController@all']);
        Route::get('paginate', ['as' => 'users', 'uses' => 'UserController@paginate']);
        Route::get('show/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
        Route::post('/', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::put('update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
        Route::delete('delete/{id}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);
    });

    Route::group(['prefix' => 'camisetas'], function () {
        Route::get('/', ['as' => 'camisetas', 'uses' => 'CamisetasController@index']);
        Route::get('paginate', ['as' => 'camisetas', 'uses' => 'CamisetasController@paginate']);
        Route::get('show/{id}', ['as' => 'camisetas.show', 'uses' => 'CamisetasController@show']);
        Route::post('/', ['as' => 'camisetas.create', 'uses' => 'CamisetasController@create']);
        Route::put('update/{id}', ['as' => 'camisetas.update', 'uses' => 'CamisetasController@update']);
        Route::delete('delete/{id}', ['as' => 'camisetas.delete', 'uses' => 'CamisetasController@delete']);
    });

    Route::group(['prefix' => 'generos'], function () {
        Route::get('/', ['as' => 'generos', 'uses' => 'GeneroController@index']);
        Route::get('paginate', ['as' => 'generos', 'uses' => 'GeneroController@paginate']);
        Route::get('show/{id}', ['as' => 'generos.show', 'uses' => 'GeneroController@show']);
        Route::post('/', ['as' => 'generos.create', 'uses' => 'GeneroController@create']);
        Route::put('update/{id}', ['as' => 'generos.update', 'uses' => 'GeneroController@update']);
        Route::delete('delete/{id}', ['as' => 'generos.delete', 'uses' => 'GeneroController@delete']);
    });

    Route::group(['prefix' => 'cors'], function () {
        Route::get('/', ['as' => 'cors', 'uses' => 'CorController@index']);
        Route::get('paginate', ['as' => 'cors', 'uses' => 'CorController@paginate']);
        Route::get('show/{id}', ['as' => 'cors.show', 'uses' => 'CorController@show']);
        Route::post('/', ['as' => 'cors.create', 'uses' => 'CorController@create']);
        Route::put('update/{id}', ['as' => 'cors.update', 'uses' => 'CorController@update']);
        Route::delete('delete/{id}', ['as' => 'cors.delete', 'uses' => 'CorController@delete']);
    });

    Route::group(['prefix' => 'tamanhos'], function () {
        Route::get('/', ['as' => 'tamanhos', 'uses' => 'TamanhoController@index']);
        Route::get('paginate', ['as' => 'tamanhos', 'uses' => 'TamanhoController@paginate']);
        Route::get('show/{id}', ['as' => 'tamanhos.show', 'uses' => 'TamanhoController@show']);
        Route::post('/', ['as' => 'tamanhos.create', 'uses' => 'TamanhoController@create']);
        Route::put('update/{id}', ['as' => 'tamanhos.update', 'uses' => 'TamanhoController@update']);
        Route::delete('delete/{id}', ['as' => 'tamanhos.delete', 'uses' => 'TamanhoController@delete']);
    });

    Route::group(['prefix' => 'silks'], function () {
        Route::get('/', ['as' => 'silks', 'uses' => 'SilkController@index']);
        Route::get('paginate', ['as' => 'silks', 'uses' => 'SilkController@paginate']);
        Route::get('show/{id}', ['as' => 'silks.show', 'uses' => 'SilkController@show']);
        Route::post('/', ['as' => 'silks.create', 'uses' => 'SilkController@create']);
        Route::put('update/{id}', ['as' => 'silks.update', 'uses' => 'SilkController@update']);
        Route::delete('delete/{id}', ['as' => 'silks.delete', 'uses' => 'SilkController@delete']);
    });

    Route::group(['prefix' => 'tecidos'], function () {
        Route::get('/', ['as' => 'tecidos', 'uses' => 'TecidoController@index']);
        Route::get('paginate', ['as' => 'tecidos', 'uses' => 'TecidoController@paginate']);
        Route::get('show/{id}', ['as' => 'tecidos.show', 'uses' => 'TecidoController@show']);
        Route::post('/', ['as' => 'tecidos.create', 'uses' => 'TecidoController@create']);
        Route::put('update/{id}', ['as' => 'tecidos.update', 'uses' => 'TecidoController@update']);
        Route::delete('delete/{id}', ['as' => 'tecidos.delete', 'uses' => 'TecidoController@delete']);
    });

    Route::group(['prefix' => 'tecido-images'], function () {
        Route::get('/', ['as' => 'tecido-images', 'uses' => 'TecimageController@index']);
        Route::get('paginate', ['as' => 'tecido-images', 'uses' => 'TecimageController@paginate']);
        Route::get('show/{id}', ['as' => 'tecido-images.show', 'uses' => 'TecimageController@show']);
        Route::post('/', ['as' => 'tecido-images.create', 'uses' => 'TecimageController@create']);
        Route::put('update/{id}', ['as' => 'tecido-images.update', 'uses' => 'TecimageController@update']);
        Route::delete('delete/{id}', ['as' => 'tecido-images.delete', 'uses' => 'TecimageController@delete']);
    });

    Route::group(['prefix' => 'tecido-amostras'], function () {
        Route::get('/', ['as' => 'tecido-amostras', 'uses' => 'TecidoAmostraController@index']);
        Route::get('paginate', ['as' => 'tecido-amostras', 'uses' => 'TecidoAmostraController@paginate']);
        Route::get('show/{id}', ['as' => 'tecido-amostras.show', 'uses' => 'TecidoAmostraController@show']);
        Route::post('/', ['as' => 'tecido-amostras.create', 'uses' => 'TecidoAmostraController@create']);
        Route::put('update/{id}', ['as' => 'tecido-amostras.update', 'uses' => 'TecidoAmostraController@update']);
        Route::delete('delete/{id}', ['as' => 'tecido-amostras.delete', 'uses' => 'TecidoAmostraController@delete']);
    });

    Route::group(['prefix' => 'horarios'], function () {
        Route::get('/', ['as' => 'horarios', 'uses' => 'HorarioController@index']);
        Route::get('paginate', ['as' => 'horarios', 'uses' => 'HorarioController@paginate']);
        Route::get('show/{id}', ['as' => 'horarios.show', 'uses' => 'HorarioController@show']);
        Route::post('/', ['as' => 'horarios.create', 'uses' => 'HorarioController@create']);
        Route::put('update/{id}', ['as' => 'horarios.update', 'uses' => 'HorarioController@update']);
        Route::delete('delete/{id}', ['as' => 'horarios.delete', 'uses' => 'HorarioController@delete']);
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', ['as' => 'menus', 'uses' => 'MenuController@index']);
        Route::get('paginate', ['as' => 'menus', 'uses' => 'MenuController@paginate']);
        Route::get('show/{id}', ['as' => 'menus.show', 'uses' => 'MenuController@show']);
        Route::post('/', ['as' => 'menus.create', 'uses' => 'MenuController@create']);
        Route::put('update/{id}', ['as' => 'menus.update', 'uses' => 'MenuController@update']);
        Route::delete('delete/{id}', ['as' => 'menus.delete', 'uses' => 'MenuController@delete']);
    });
});

//Route::get('collection', function(){
//
//    $posts = DB::table('users')
//        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
//        ->where('user_id', '=', 1)
//        ->get();
//
//    return $collection = (['data'=>[
//        $posts
//    ]
//    ]);
//});
//
//Route::get('botao', function () {
//    return view('botao');
//});
//
//Route::get('/', function () {
//    return view('index.html');
//});
//
//Route::get('home', 'HomeController@index');
//
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
//
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
//   return $users;
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
//Route::get('join3', function() {
//
//    $posts = DB::table('comments')
//        ->join("posts","posts.id","=","posts.user_id")
//        ->select("comments.text","comments.id","posts.title","posts.text")
//        ->get();
//    return $posts;
//});
//
//Route::get('join2', function(){
//
//    $users = DB::table('users')
//        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
//        ->get();
//
//    return $users;
//
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
//Route::get('/testlogin', ['middleware' => 'auth', function () {
//    return "logged!";
//}]);
//
//
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

