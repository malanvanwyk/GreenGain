<?php
/**
 * Created by PhpStorm.
 * User: Malan
 * Date: 29-Jul-18
 * Time: 8:13 AM
 */

   //connection details to DB
    include('../scripts/database_connection.php');
    session_start();

    $userId = $_SESSION['id'];
    //echo $userId;

    $query="SELECT TDL_Todo AS name FROM todolist WHERE TDL_User_Id = $userId";
    //$data = array();

    $rs=$connect->query($query);
    $data = $rs->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
    ?>

