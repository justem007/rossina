(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('camisetaController', camisetaController);

    function camisetaController($http) {

        var vm = this;

        vm.camisetas;

        vm.error;

        vm.getCamisetas = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/camisetas').success(function(camisetas) {
                vm.camisetas = camisetas;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();