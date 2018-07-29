<?php
/**
 * Created by PhpStorm.
 * User: Malan
 * Date: 29-Jul-18
 * Time: 4:23 PM
 */
    include('../scripts/database_connection.php');
    session_start();
    $lastId = $_POST['lastId'];

	if(!empty($_FILES['image'])){

        $path = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        $image = time().'.';
        move_uploaded_file($_FILES["image"]["tmp_name"], '../images/'.$image);
        $queryUpload = "INSERT INTO photo SET PHT_Name = '$image', PHT_User_Id = $lastId";
        echo $queryUpload;
        $statementUpload = $connect->prepare($queryUpload);
        $statementUpload->execute();

    }
    else
    {
        echo "<script>Error!</script>";
    }
?>