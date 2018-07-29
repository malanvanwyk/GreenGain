<?php
    /**
     * Created by PhpStorm.
     * User: Malan
     * Date: 28-Jul-18
     * Time: 2:06 PM
     */

    //logout.php

    session_start();

    session_destroy();

    header("location:index.php");


    ?>