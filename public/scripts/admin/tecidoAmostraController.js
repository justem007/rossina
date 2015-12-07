(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('tecidoAmostraController', tecidoAmostraController);

    function tecidoAmostraController($http) {

        var vm = this;

        vm.tecido_amostras;

        vm.error;

        vm.getTecidoAmostras = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/tecido-amostras').success(function(tecido_amostras) {
                vm.tecido_amostras = tecido_amostras;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();