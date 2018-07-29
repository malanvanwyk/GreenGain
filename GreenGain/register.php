<?php
    /**
     * Created by PhpStorm.
     * User: Malan
     * Date: 28-Jul-18
     * Time: 1:50 PM
     */

    //register.php

    include('scripts/database_connection.php');

    $form_data = json_decode(file_get_contents("php://input"));

    $message = '';
    $validation_error = '';

    if(empty($form_data->name))
    {
        $error[] = 'Name is Required';
    }
    else
    {
        $data[':USR_Name'] = $form_data->name;
    }

    if(empty($form_data->email))
    {
        $error[] = 'Email is Required';
    }
    else
    {
        if(!filter_var($form_data->email, FILTER_VALIDATE_EMAIL))
        {
            $error[] = 'Invalid Email Format';
        }
        else
        {
            $data[':USR_Email'] = $form_data->email;
        }
    }

    if(empty($form_data->password))
    {
        $error[] = 'Password is Required';
    }
    else
    {
        $data[':USR_Password'] = password_hash($form_data->password, PASSWORD_DEFAULT);
    }

    if(empty($error))
    {
        $query = "INSERT INTO user_data (USR_Name, USR_Email, USR_Password) VALUES (:USR_Name, :USR_Email, :USR_Password)";
        $statement = $connect->prepare($query);
        if($statement->execute($data))
        {
            $message = 'Registration Completed';
        }
    }
    else
    {
        $validation_error = implode(", ", $error);
    }

    $output = array(
        'error'  => $validation_error,
        'message' => $message,
        'lastId' => $connect->lastInsertId()
    );

    echo json_encode($output);


    ?>