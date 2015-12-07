(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoDoisController', blocoDoisController);

    function blocoDoisController($http) {

        var vm = this;

        vm.bloco_dois;

        vm.error;

        vm.getBlocoDois = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-dois').success(function(bloco_dois) {
                vm.bloco_dois = bloco_dois;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();