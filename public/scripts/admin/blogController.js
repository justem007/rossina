(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blogController', blogController);

    function blogController($http) {

        var vm = this;

        vm.posts;

        vm.error;

        vm.getPosts = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/posts').success(function(posts) {
                vm.posts = posts;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();