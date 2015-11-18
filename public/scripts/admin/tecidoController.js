(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('tecidoController', tecidoController);

    function tecidoController($http) {

        var vm = this;

        vm.tecidos;

        vm.error;

        vm.getTecidos = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/tecidos').success(function(tecidos) {
                vm.tecidos = tecidos;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();