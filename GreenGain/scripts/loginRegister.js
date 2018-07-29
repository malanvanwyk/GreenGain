var app = angular.module('login_register_app', []);
app.controller('login_register_controller', function($scope, $http){
    $scope.closeMsg = function(){
        $scope.alertMsg = false;
    };

    $scope.login_form = true;

    $scope.showRegister = function(){
        $scope.login_form = false;
        $scope.register_form = true;
        $scope.alertMsg = false;
    };

    $scope.showLogin = function(){
        $scope.register_form = false;
        $scope.login_form = true;
        $scope.alertMsg = false;
    };

    $scope.submitRegister = function(){
        $http({
            method:"POST",
            url:"register.php",
            data:$scope.registerData
        }).success(function(data){
            $scope.alertMsg = true;
            if(data.error != '')
            {
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = data.error;
            }
            else
            {
                $scope.alertClass = 'alert-success';
                $scope.alertMessage = data.message;
                $scope.lastInsertId = data.lastId;
                $scope.registerData = {};
            }
        });
    };

    $scope.submitLogin = function(){
        $http({
            method:"POST",
            url:"login.php",
            data:$scope.loginData
        }).success(function(data){
            console.log(data);
            if(data.error != '')
            {
                $scope.alertMsg = true;
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = 'Login Failed';
            }
            else
            {
                window.location = "todolist.php";
            }
        });
    };

    //controller for avatar upload
    $scope.form = [];
    $scope.files = [];

    $scope.submit = function()
    {
        $scope.form.image = $scope.files[0];

        $http({
            method  : 'POST',
            url     : 'php/upload.php',
            processData: false,
            transformRequest: function (data) {
                var formData = new FormData();
                formData.append("lastId",$scope.lastInsertId);
                formData.append("image", $scope.form.image);
                return formData;
            },

            data : $scope.form,
            headers: {
                'Content-Type': undefined
            }
        }).then(function(data){
            alert("Successfully Upload An Image!");
            window.location = "index.php";
        });

    };

    $scope.uploadedFile = function(element)
    {
        $scope.currentFile = element.files[0];
        var reader = new FileReader();
        reader.onload = function(event)
        {
            $scope.image_source = event.target.result
            $scope.$apply(function($scope)
            {
                $scope.files = element.files;
            });
        }
        reader.readAsDataURL(element.files[0]);
    }

});