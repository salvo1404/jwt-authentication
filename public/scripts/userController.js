/**
 * Created by salvo on 10/08/15.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('UserController', UserController);

    function UserController($http) {

        var vm = this;

        vm.users;
        vm.error;

        vm.getUsers = function() {

            // This request will hit the index method in the AuthenticateController
            // on the Laravel side and will return the list of users
            $http.get('api/users', {
                headers: {'Authorization': 'Bearer '.concat(localStorage.token)}
            }).success(function(data, status, headers, config) {
                localStorage.setItem('token', headers('Authorization'));
                vm.users = data;
            }).error(function(data, status, headers, config) {
                vm.error = data;
            });
        }
    }

})();