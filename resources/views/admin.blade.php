<!doctype html>
<html ng-app="appAdmin">
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bower_components/bootswatch/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap-notify/css/bootstrap-notify.css">
    <link rel="stylesheet" href="styles/admin/admin.css">
    <title> Admin - Meu Blog </title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/">Admin - Rossina Estamparia</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#/">Home</a></li>
                <li><a href="#/principal">principal</a></li>
                <li><a href="#/estamparia">estamparia</a></li>
                <li><a href="#/camisetas">camisetas</a></li>
                <li><a href="#/tecidos">tecidos</a></li>
                <li><a href="#/sobre">sobre</a></li>
                <li><a href="#/contatos">contatos</a></li>
                <li><a href="#/faqs">faqs</a></li>
                <li><a href="#/imagens">imagens</a></li>
                <li><a href="#/blog">blog</a></li>
                <li><a href="#/logout">logout</a></li>
            </ul>
        </div>
    </div>
</nav>

 <div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-1 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="#/">Home</a></li>
                <li><a href="#/principal">principal</a></li>
                <li><a href="#/estamparia">estamparia</a></li>
                <li><a href="#/camisetas">camisetas</a></li>
                <li><a href="#/tecidos">tecidos</a></li>
                <li><a href="#/sobre">sobre</a></li>
                <li><a href="#/contatos">contatos</a></li>
                <li><a href="#/faqs">faqs</a></li>
                <li><a href="#/imagens">imagens</a></li>
                <li><a href="#/blog">blog</a></li>
                <li><a href="#/logout">logout</a></li>
            </ul>
        </div>
        <div class="col-sm-9  main" ui-view>
        </div>
    </div>

 </div>

<div class='notifications bottom-right'></div>

<script src="bower_components/jquery-2/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/bootstrap-notify/js/bootstrap-notify.js"></script>
<script src="bower_components/angular/angular.min.js"></script>
<script src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script src="bower_components/angular-resource/angular-resource.min.js"></script>
<script src="bower_components/satellizer/satellizer.min.js"></script>
{{--<script src="js/base.js"></script>--}}
<script src="scripts/admin/admin.js"></script>
<script src="scripts/admin/adminController.js"></script>
<script src="scripts/admin/camisetaController.js"></script>
<script src="scripts/admin/horarioController.js"></script>
<script src="scripts/admin/menuController.js"></script>
<script src="scripts/admin/blocoUmController.js"></script>
<script src="scripts/admin/blocoUmDestaqueController.js"></script>
<script src="scripts/admin/ferramentaController.js"></script>
<script src="scripts/admin/blocoDoisController.js"></script>
<script src="scripts/admin/blocoDoisDestaqueController.js"></script>
<script src="scripts/admin/blocoDoisDestaqueDoisController.js"></script>
<script src="scripts/admin/blocoDoisDestaqueTresController.js"></script>
<script src="scripts/admin/blocoTresController.js"></script>
<script src="scripts/admin/blocoTresDestaqueController.js"></script>
<script src="scripts/admin/blocoQuatroController.js"></script>
<script src="scripts/admin/blocoQuatroDestaqueController.js"></script>
<script src="scripts/admin/estampariaController.js"></script>
<script src="scripts/admin/generoController.js"></script>
<script src="scripts/admin/corController.js"></script>
<script src="scripts/admin/tamanhoController.js"></script>
<script src="scripts/admin/silkController.js"></script>
<script src="scripts/admin/tecidoController.js"></script>
<script src="scripts/admin/tecidoController.js"></script>
<script src="scripts/admin/tecidoAmostraController.js"></script>
<script src="scripts/admin/faqController.js"></script>
<script src="scripts/admin/principalController.js"></script>
<script src="scripts/admin/authController.js"></script>
<script src="scripts/admin/sobreController.js"></script>
<script src="scripts/admin/contatoController.js"></script>
<script src="scripts/admin/blogController.js"></script>
<script src="scripts/admin/commentController.js"></script>

</body>
</html>