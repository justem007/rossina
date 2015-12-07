(function() {

    'use strict';

    angular
        .module('app', [ 'ui.router', 'satellizer', 'ngMessages'])
        .config(function($stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {

            function redirectWhenLoggedOut($q, $injector) {

                return {

                    responseError: function(rejection) {

                        // Necessidade de utilizar $ injector.get para trazer $ estadual ou então chegarmos
                        // Um erro de dependência circular
                        var $state = $injector.get('$state');

                        // Em vez de verificação de um código de status de 400, que pode ser usado
                        // Por outras razões em Laravel, nós verificamos para a rejeição específica
                        // Razões para nos dizer se precisamos para redirecionar para o estado de login
                        var rejectionReasons = ['token_not_provided', 'token_expirado', 'token_ausente', 'token_inválido'];

                        // Percorre cada motivo de rejeição e redirecionar para o login
                        // Estado, se um for encontrado
                        angular.forEach(rejectionReasons, function(value, key) {

                            if(rejection.data.error === value) {

                                // Se conseguirmos uma rejeição que corresponde a uma das razões
                                // Em nossa matriz, sabemos que precisamos para autenticar o usuário assim
                                // Podemos remover o usuário atual do armazenamento local
                                localStorage.removeItem('user');

                                // Envia o usuário para o estado de autenticação para que eles possam acessar
                                $state.go('auth');
                            }
                        });

                        return $q.reject(rejection);
                    }
                }
            }

            // Instalação para o $ httpInterceptor
            $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

            // Empurre a nova fábrica para a matriz interceptor $ http
            $httpProvider.interceptors.push('redirectWhenLoggedOut');

            $authProvider.loginUrl = '/api/authenticate';

            $urlRouterProvider.otherwise('/auth');

            $stateProvider
                .state('auth', {
                    url: '/auth',
                    views: {
                        'painelContent': {
                            templateUrl: "../token/views/authView.html",
                            controller: 'AuthController as auth'
                        }
                    }
                })
                .state('users', {
                    url: '/users',
                    views: {
                        'painelContent': {
                            templateUrl: "../token/views/userView.html",
                            controller: 'UserController as user',
                            access: {
                                requiresLogin: true
                            }
                        }
                    }
                });
        })

        .run(function($rootScope, $state) {

            // $ stateChangeStart é acionado sempre que as alterações de estado. Podemos usar alguns parâmetros
            // tais como toState para ligar para detalhes sobre o estado em que está mudando
            $rootScope.$on('$stateChangeStart', function(event, toState) {

                // Agarre o usuário de armazenamento local e analisá-lo a um objeto
                var user = JSON.parse(localStorage.getItem('user'));

                // Se houver quaisquer dados do usuário no armazenamento local, em seguida, o usuário é bastante
                // provavelmente autenticado. Se o seu token é expirado, ou se eles são
                // caso contrário, não realmente autenticado, eles serão redirecionados para
                // o estado de autenticação por causa da solicitação de qualquer maneira rejeitado
                if(user) {

                    // Estado autenticada do usuário fica virado para
                    // verdade para que possamos agora mostrar partes da interface do usuário que confiar
                    // no usuário logado
                    $rootScope.authenticated = true;

                    // Colocar os dados do usuário em $ rootScope permite
                    // Nós para acessá-lo em qualquer lugar através do app. Aqui
                    // Estamos pegando o que está no armazenamento local
                    $rootScope.currentUser = user;

                    // Se o usuário está conectado e nós batemos a rota auth não precisamos
                    // Para ficar lá e pode enviar o usuário para o principal estado
                    if(toState.name === "auth") {

                        // Prevenir o comportamento padrão nos permite usar $ state.go
                        // Para alterar os estados
                        event.preventDefault();

                        // Ir para o estado "principal", que no nosso caso é usuários
                        $state.go('users');
                    }
                }
            });
        });
})();

