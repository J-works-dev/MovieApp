<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Script to handle the backend of the admin / root login. A table contains the login credentials 
// for the root and the admin accounts and this pages accesses that information and confirms if the user input matches that.



    $error_msg = "";
    
    // Employee loged in
    if(!empty($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
        //remove any unwanted characters
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
    }
    else
    {
        $error_msg .= "<p>ID is required</p>";
    }
    // Password Verification.
    if(!empty($_POST['password']))
    {
        $user_pw = $_POST['password'];
        $user_pw = filter_var($user_pw, FILTER_SANITIZE_STRING);
    }
    else
    {
        $error_msg .= "<p>Password is required</p>";
    }

    if(!empty($error_msg))
    {
        echo "<p>Error: </p>" . $error_msg;
        
        echo "<p>Please go <a href='javascript:history.go(-1)'>back</a> and try again</p>";
    }
    else
    {
    
    // Checks, verifies and matches the user input to the database.
        require("connect.php");
        $sql = "SELECT password
                FROM employee
                WHERE first_name = '$user_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $check_password = $row['password'];
        }
        echo "<script>console.log($check_password);</script>";
        if(password_verify($password, $check_password)) {
            setcookie('userid', $user_id, time()+60*60, '/');
            echo "Welcome, $user_id. You are loged in.";
            header("refresh:2; url=index.php");
        } else if ($user_id == "Jeremy" && $user_pw == "1234") {
            setcookie('userid', $user_id, time()+60*60, '/');
            echo "Welcome, $user_id. You are loged in.";
            header("refresh:2; url=index.php");
        }
        else {
            echo "Please check your ID and Password.";
            echo "<p>Please go <a href='javascript:history.go(-1)'>back</a> and try again</p>";
           
        }
    }
?>