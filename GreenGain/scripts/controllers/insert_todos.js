'use strict';

angular.module('todoListApp')
    .controller('database_actions', function($scope, $http)
    {
        $scope.insertdata = function(){
            $http.post("../../php/insert_todos_db.php")
        }
    });
