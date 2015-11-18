(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('AuthController', AuthController);

    function AuthController($auth, $state) {

        var vm = this;

        vm.login = function() {

            var credentials = {
                email: vm.email,
                password: vm.password
            }

            // Use $ auth serviço de Satellizer para acessar
            $auth.login(credentials).then(function(data) {

                // Se o login for bem-sucedido, redirecionar usuários para o estado
                $state.go('/', {});
            });
        }

    }

})();