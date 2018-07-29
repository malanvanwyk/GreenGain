'use strict';

angular.module('todoListApp')
  .service('dataService', function($http) {

    this.getTodos = function(callback){
      $http.get('php/get_todos.php')
        .then(callback)
    };

    this.deleteTodo = function(todo) {

    };

    this.saveTodos = function(todos) {

    };
});