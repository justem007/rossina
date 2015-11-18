(function() {

    'use strict';

    angular
        .module('appAdmin', ['ui.router','satellizer'])
        .config(function($stateProvider, $urlRouterProvider, $authProvider) {

            // Satellizer configuration that specifies which API
            // route the JWT should be retrieved from
            $authProvider.loginUrl = '/api/authenticate';

            $urlRouterProvider.otherwise('/auths');
            // Redirect to the auth state if any other states
            // are requested other than users

            $stateProvider
                .state('auths', {
                    url: '/auths',
                    templateUrl: 'views/admin/auths.html',
                    controller: 'AuthController as auth'
                })
                .state('/', {
                    url: '/',
                    templateUrl: 'views/admin/admin.blade.php'
                })
                .state('principal', {
                    url: '/principal',
                    templateUrl: 'views/admin/principal.html',
                    controller: 'horarioController as horario'
                })
                .state('estamparia', {
                    url: '/estamparia',
                    templateUrl: 'views/admin/estamparia.html',
                    controller: 'estampariaController as estamparia'
                })
                .state('camisetas', {
                    url: '/camisetas',
                    templateUrl: 'views/admin/camisetas.html',
                    controller: 'camisetaController as camiseta'
                })
                .state('tecidos', {
                    url: '/tecidos',
                    templateUrl: 'views/admin/tecidos.html',
                    controller: 'tecidoController'
                })
                .state('sobre', {
                    url: '/sobre',
                    templateUrl: 'views/admin/sobre.html'
                })
                .state('contatos', {
                    url: '/contatos',
                    templateUrl: 'views/admin/contatos.html',
                    controller: 'contatoController'
                })
                .state('faqs', {
                    url: '/faqs',
                    templateUrl: 'views/admin/faqs.html',
                    controller: 'faqController'
                })
                .state('imagens', {
                    url: '/imagens',
                    templateUrl: 'views/admin/imagens.html'
                })
                .state('blog', {
                    url: '/blog',
                    templateUrl: 'views/admin/blog.html'
                })
                .state('logout', {
                    url: '/logout',
                    templateUrl: 'views/admin/logout.html'
                });
        });
})();

