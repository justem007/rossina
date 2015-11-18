(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('ferramentaController', ferramentaController);

    function ferramentaController($http) {

        var vm = this;

        vm.ferramentas;

        vm.error;

        vm.getFerramentas = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/ferramentas').success(function(ferramentas) {
                vm.ferramentas = ferramentas;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();