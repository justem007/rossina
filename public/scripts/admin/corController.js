(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('corController', corController);

    function corController($http) {

        var vm = this;

        vm.cors;

        vm.error;

        vm.getCors = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/cors').success(function(cors) {
                vm.cors = cors;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();