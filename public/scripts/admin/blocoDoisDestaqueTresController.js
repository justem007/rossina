(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoDoisDestaqueTresController', blocoDoisDestaqueTresController);

    function blocoDoisDestaqueTresController($http) {

        var vm = this;

        vm.bloco_dois_destaque_dois;

        vm.error;

        vm.getBlocoDoisDestaqueTres = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-dois-destaque-dois').success(function(bloco_dois_destaque_dois) {
                vm.bloco_dois_destaque_dois = bloco_dois_destaque_dois;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();