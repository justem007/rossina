app.config(['$routeProvider', '$authProvider',function($routeProvider,$authProvider){

    // Satellizer configuration that specifies which API
    // route the JWT should be retrieved from
    $authProvider.loginUrl = '/api/authenticate';

    $routeProvider.
        when('/', { controller:'mainController',
            templateUrl:'views/site/pages/home/main.html'
        }).
        when('/estamparia_digital',{ controller:'estampariaController',
            templateUrl:'views/site/pages/estamparia/estamparia.html'
        }).
        when('/estamparia_detalhes',{ controller:'detalhesEstampariaController',
            templateUrl:'views/site/pages/estamparia/detalhes.html'
        }).
        when('/sobre_nos',{
            templateUrl:'views/site/pages/sobre/sobre.html'
        }).
        when('/contatos',{ controller:'contatoController',
            templateUrl:'views/site/pages/contatos/contatos.html'
        }).
        when('/faqs',{ controller:'faqController',
            templateUrl:'views/site/pages/faqs/faqs.html'
        }).
        when('/registrar',{ controller:'registrarController',
            templateUrl:'views/site/pages/registrar/registrar.html'
        }).
        when('/login_site',{ controller:'loginSiteController as auth',
            templateUrl:'views/site/pages/login/login.html'
        }).
        when('/compras',{ controller:'comprasController',
            templateUrl:'views/site/pages/compras/compras.html'
        }).
        when('/check',{ controller:'checkController',
            templateUrl:'views/site/pages/check/check.html'
        }).
        when('/users',{ controller:'userController',
            templateUrl:'views/userView.html'
        }).
        when('/login',{ controller:'loginController',
            templateUrl:'pages/login.html'
        }).
        otherwise({redirectTo:'/'
        });
}])