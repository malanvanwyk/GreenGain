<?php
/**
 * Created by PhpStorm.
 * User: Malan
 * Date: 29-Jul-18
 * Time: 7:45 AM
 */

    include('../scripts/database_connection.php');
    session_start();

    $userID = $_SESSION['id'];
    $data=json_decode(file_get_contents("php://input"));

    $todoArray = json_decode(json_encode($data), True);

    foreach($todoArray as $todos)
    {
        foreach($todos as $key=>$value)
        {
            $todo = $value['name'];

            $queryCheck = "SELECT * FROM todolist WHERE TDL_Todo = '$todo'";
            $statementCheck = $connect->prepare($queryCheck);
            $statementCheck->execute();
            $rowCount = $statementCheck->fetchColumn();
            if($rowCount < 1)
            {
                $queryInsert = "INSERT INTO todolist SET TDL_User_Id = $userID, TDL_Todo = '$todo'";
                $statementInsert = $connect->prepare($queryInsert);
                $statementInsert->execute();
            }

        }
    }
    ?>