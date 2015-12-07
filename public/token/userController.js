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
                console.log(users);
                vm.users = users;
            }).error(function(error) {
                vm.error = error;
            });
        }

        vm.addUser = function() {

            $http.post('api/users', {
                body: vm.user,
                user_id: $rootScope.currentUser.id
            }).success(function(response) {
                // console.log(vm.jokes);
                // vm.jokes.push(response.data);
                vm.users.unshift(response.data);
                console.log(vm.jokes);
                vm.user = '';
                // alert(data.message);
                // alert("Joke Created Successfully");
            }).error(function(){
                console.log("error");
            });
        };

        vm.updateUser = function(user){
            console.log(user);
            $http.put('api/users' + user.user_id, {
                body: user.user,
                user_id: $rootScope.currentUser.id
            }).success(function(response) {
                // alert("Joke Updated Successfully");
            }).error(function(){
                console.log("error");
            });
        }

        vm.deleteUser = function(index, userId){
            console.log(index, userId);

            $http.delete('api/authenticate/delete' + Id)
                .success(function() {
                    vm.users.splice(index, 1);
                });;
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