<?php
/**
 * Created by PhpStorm.
 * User: Malan
 * Date: 29-Jul-18
 * Time: 2:09 PM
 */
    include('../scripts/database_connection.php');
    session_start();

    $userID = $_SESSION['id'];
    $data=json_decode(file_get_contents("php://input"));
    $deleteElement = json_decode(json_encode($data), True);

    $todo = $deleteElement['element'];

    $queryCheck = "DELETE FROM todolist WHERE TDL_User_Id = $userID AND TDL_Todo = '$todo'";
    $statementCheck = $connect->prepare($queryCheck);
    $statementCheck->execute();
?>