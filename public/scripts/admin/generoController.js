(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('generoController', generoController);

    function generoController($http) {

        var vm = this;

        vm.generos;

        vm.error;

        vm.getGeneros = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/generos').success(function(generos) {
                vm.generos = generos;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();