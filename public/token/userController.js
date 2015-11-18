(function() {

    'use strict';

    angular
        .module('app')
        .controller('UserController', UserController);

    function UserController($http, $auth, $rootScope) {

        var vm = this;

        vm.users;
        vm.error;

        vm.getUsers = function() {

            //Grab the list of users from the API
            $http.get('api/authenticate').success(function(users) {
                vm.users = users;
            }).error(function(error) {
                vm.error = error;
            });
        }

        // We would normally put the logout method in the same
        // spot as the login method, ideally extracted out into
        // a service. For this simpler example we'll leave it here
        vm.logout = function() {

            $auth.logout().then(function() {

                // Remove the authenticated user from local storage
                localStorage.removeItem('user');

                // Flip authenticated to false so that we no longer
                // show UI elements dependant on the user being logged in
                $rootScope.authenticated = false;

                // Remove the current user info from rootscope
                $rootScope.currentUser = null;
            });
        }
    }

})();

//(function() {
//
//    'use strict';
//
//    angular
//        .module('app')
//        .controller('UserController', UserController);
//
//    function UserController($http) {
//
//        var vm = this;
//
//        vm.users;
//
//        vm.error;
//
//        vm.getUsers = function() {
//
//            // Este pedido vai bater o método do índice no AuthenticateController
//            // no lado do Laravel e irá retornar a lista de usuários
//            $http.get('api/authenticate').success(function(users) {
//                vm.users = users;
//            }).error(function(error) {
//                vm.error = error;
//            });
//        }
//    }
//
//})();