<?php
    include('scripts/database_connection.php');
    session_start();

    $userId = $_SESSION['id'];
?>
<!doctype html>
<html lang="en">
    <head>
        <title></title>
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <link href='styles/main.css' rel='stylesheet' type="text/css">
    </head>
    <body ng-app="todoListApp">
        <h1>My TODOs</h1>
        <a href="logout.php">Logout</a>
        <div class="profile-header-container">
            <div class="profile-header-img">
        <?php
        $getImage = "SELECT * FROM photo WHERE PHT_User_Id = $userId";
        $statementImage = $connect->prepare($getImage);
        $statementImage->execute();
        while ($row = $statementImage->fetch(PDO::FETCH_ASSOC)) {
            echo '<img class="img-circle" src="images/'.$row['PHT_Name'].'" />';
        }


        ?>
            </div>
        </div>
        <!--todos directive located in scripts/directivs/todos.js is run in below code-->
        <todos></todos>
        <script src="vendor/angular.min.js" type="text/javascript"></script>
        <script src="scripts/app.js" type="text/javascript"></script>
        <script src="scripts/controllers/main.js" type="text/javascript"></script>
        <script src="scripts/services/data.js" type="text/javascript"></script>
        <script src="scripts/directives/todos.js" type="text/javascript"></script>
    </body>
</html>