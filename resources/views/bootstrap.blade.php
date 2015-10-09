<!DOCTYPE html>
<html ng-app="app">

<head lang="pt-br">
    <meta charset="UTF-8">

    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('bower_components/bootswatch/cosmo/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
</head>

<body>

    <div class="row">
        <div class="col-lg-4">Coluna 1</div>
        <div class="col-lg-8">Coluna 2</div>
    </div>

    <div class="row">
        <div class="col-md-12" style="background-color: #AAAAAA">Sem offset</div>
        <div class="col-md-8 col-md-offset-2" style="background-color: #DDDDDD">Com offset</div>
    </div>

    <div class="jumbotron">


        <p class="lead text-left">
            Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá ,
            depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum
            girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma
            pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim.
            Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.
        </p>
        <p class="text-muted">Texto "mudo" ou sem foco</p>
        <p class="text-primary">Texto com um pouco de destaque</p>
        <p class="text-success">Texto com alguma mensagem boa</p>
        <p class="text-info">Texto de informação</p>
        <p class="text-warning">Texto de aviso</p>
        <p class="text-danger">Texto de perigo, erro </p>

        <p>
            <abbr title="HyperText Markup Language">HTML</abbr>
            é a melhor linguagem de marcação de texto existente.
        </p>

        <blockquote >
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                elit. Integer posuere erat a ante.</p>
            <small>Someone famous in
                <cite title="Source Title">Source Title</cite></small>
        </blockquote>

        <ul class="list-inline">
            <li>Lorem</li>
            <li>Ipsum</li>
            <li>dolor</li>
        </ul>

        <form>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
            </div>
        </form>

        <form class="form-inline">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
            </div>
        </form>

        <form class="form-inline">
            <div class="form-group">
                <label for="nome" class="sr-only">Nome</label>
                <input type="text" class="form-control" id="nome"
                       placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" class="form-control" id="email"
                       placeholder="Email">
            </div>
        </form>

         <form class="form-horizontal">
             <div class="form-group">
                 <label for="nome" class="col-sm-2 control-label">Nome</label>
                 <div class="col-sm-5">
                     <input type="text" class="form-control" id="nome"
                              placeholder="Digite o seu nome"/>
                     </div>
                 </div>
             <div class="form-group">
                 <label for="email" class="col-sm-2 control-label">Email</label>
                 <div class="col-sm-5">
                     <input type="text" class="form-control" id="email"
                               placeholder="Digite o seu email"/>
                     </div>
                 </div>
             <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-4">
                     <button type="submit" class="btn btn-default">Enviar</button>
                     </div>
             </div>
         </form>

        <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
        </label>

        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
                <p class="form-control-static">email@example.com</p>
            </div>
        </div>

        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess">
                Input com success</label>
            <input type="text" class="form-control" id="inputSuccess">
        </div>
        <div class="form-group has-warning">
            <label class="control-label" for="inputWarning">
                Input com warning</label>
            <input type="text" class="form-control" id="inputWarning">
        </div>
        <div class="form-group has-error">
            <label class="control-label" for="inputError">
                Input com error</label>
            <input type="text" class="form-control" id="inputError">
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="email"
                       placeholder="Digite o seu email"/>
<span class="help-block">Informe um email válido,
pois será verificado após a conclusão do cadastro</span>
            </div>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-default">Left</button>
            <button type="button" class="btn btn-default">Middle</button>
            <button type="button" class="btn btn-default">Right</button>
        </div>

        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-star"></span> Star
        </button>

        <div class="btn-group">
            <button type="button"
                    class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown">
                Arquivo <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Abrir</a></li>
                <li><a href="#">Salvar</a></li>
                <li><a href="#">Salvar como</a></li>
                <li class="divider"></li>
                <li><a href="#">Fechar</a></li>
            </ul>
        </div>
        <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="text" class="form-control"
                   placeholder="Username">
        </div>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-addon">.00</span>
        </div>
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" class="form-control">
            <span class="input-group-addon">.00</span>
        </div>

        <div class="input-group">
            <input type="text" class="form-control">
<span class="input-group-btn">
<button class="btn btn-default" type="button">Ir!</button>
</span>
        </div>

        <h2>Form 1</h2>
        <form name="form1">
            <div class="form-group"
                 ng-class="{ 'has-error': form1.email.$invalid }" >
                <input type="email" class="form-control" name="email"
                       ng-model="user.email" required />
            </div>
        </form>

        <h2>Form 2</h2>
        <form name="form1">
            <div class="form-group"
                 ng-class="{ 'has-error': form2.email.$invalid }" >
                <input type="email" class="form-control"
                       name="email" ng-model="user.email" required />

            </div>
        </form>

        <h2>Form 4</h2>
        <form name="form4" novalidate>
            <div class="form-group"
                 ng-class="{ 'has-error': (form4.$submitted ||
form4.email.$dirty) && form4.email.$invalid}" >
                <input type="email" class="form-control"
                       name="email" ng-model="user.email" required />
<span class="label label-danger"
      ng-show="(form4.$submitted ||
form4.email.$dirty) && form4.email.$invalid\
">
<span ng-show="form4.email.$error.required">
Campo obrigatório</span>
<span ng-show="form4.email.$error.email">
Email inválido</span>
</span>
            </div>
            <button type="submit" class="btn btn-primary"
                    ng-click="go()">Go</button>
        </form>

    </div>

    <script href="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script href="{{ asset('bower_components/bootstrap/dist/js/boostrap.min.js') }}"></script>
    <script href="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    <script href="{{ asset('bower_components/app.js') }}"></script>

</body>
</html>