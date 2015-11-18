(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('menuController', menuController);

    function menuController($http) {

        var vm = this;

        vm.menus;

        vm.error;

        vm.getMenus = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/menus').success(function(menus) {
                vm.menus = menus;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();