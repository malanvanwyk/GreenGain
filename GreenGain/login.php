<?php
    /**
     * Created by PhpStorm.
     * User: Malan
     * Date: 28-Jul-18
     * Time: 1:57 PM
     */

    //login.php

    include('scripts/database_connection.php');

    session_start();

    $form_data = json_decode(file_get_contents("php://input"));

    $validation_error = '';

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

    if(empty($error))
    {
        $query = "SELECT * FROM user_data 
                  WHERE
                        USR_Email = :USR_Email";

        $statement = $connect->prepare($query);
        if($statement->execute($data))
        {
            $result = $statement->fetchAll();
            if($statement->rowCount() > 0)
            {
                foreach($result as $row)
                {
                    if(password_verify($form_data->password, $row["USR_Password"]))
                    {
                        //send primary key of user_data table
                        $_SESSION['id'] = $row['USR_Id'];
                        $_SESSION["name"] = $row["USR_Name"];
                    }
                    else
                    {
                        $validation_error = 'Wrong Password';
                    }
                }
            }
            else
            {
                $validation_error = 'Wrong Email';
            }
        }
    }
    else
    {
        $validation_error = implode(", ", $error);
    }

    $output = array(
        'error' => $validation_error
    );

    echo json_encode($output);

    ?>