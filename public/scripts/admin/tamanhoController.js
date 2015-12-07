(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('tamanhoController', tamanhoController);

    function tamanhoController($http) {

        var vm = this;

        vm.tamanhos;

        vm.error;

        vm.getTamanhos = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/tamanhos').success(function(tamanhos) {
                vm.tamanhos = tamanhos;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();