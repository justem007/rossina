(function() {

    'use strict';

    angular
        .module('app')
        .controller('principalController', principalController);

    function principalController($http) {

        var vm = this;

        vm.users;

        vm.error;

        vm.getUsers = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/authenticate').success(function(users) {
                vm.users = users;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();