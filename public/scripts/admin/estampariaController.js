(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('estampariaController', estampariaController);

    function estampariaController($http) {

        var vm = this;

        vm.users;

        vm.error;

        vm.getEstampariaUm = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/').success(function(users) {
                vm.users = users;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();