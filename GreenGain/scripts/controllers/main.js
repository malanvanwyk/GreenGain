'use strict';

angular.module('todoListApp')
.controller('mainCtrl', function($scope, dataService,$http) {

  $scope.addTodo = function()
  {
    var todo = {name: "This is a new todo."};
    $scope.todos.unshift(todo);
  };

  dataService.getTodos(function(response)
  {
      $scope.todos = response.data;
  });
  
  $scope.deleteTodo = function(todo, $index)
  {
    var delItem = $scope['todos'][$index]['name'];
    $http.post("php/delete_todos.php",{'element':delItem})
        .success(function(){
            $scope.msg="Todo has been removed";
    })

    dataService.deleteTodo(todo);
    $scope.todos.splice($index, 1);


  };
  
  $scope.saveTodos = function()
  {
  	var filteredTodos = $scope.todos.filter(function(todo)
    {
  		if(todo.edited)
  		{
  			return todo;
  		}
  	});
    $http.post("php/insert_todos_db.php",{'todos':$scope.todos})
      .success(function(){
          $scope.msg="Data Inserted";
      });
  };


});

