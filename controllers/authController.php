<?php

session_start();
require 'config/db.php';
require_once 'emailcontroller.php';
$errors = array();
$username = "";
$email = "";
//if user clicks on the sign up button
if (isset($_POST['signup-btn'])){
    $username =$_POST['username'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $cpassword =$_POST['cpassword'];

    //validation
    if (empty($username)){
        $errors['username'] = "Username required";

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email adress is invalid";
    }
    if (empty($email)){
        $errors['email'] = "Email required";
    }
    if (empty($password)){
        $errors['password'] = "Password required";
    }
    if($password !== $cpassword){
        $errors['password'] = "Passwords do not match";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0){
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssiss', $username, $email, $verified, $token, $password);
        
        if ($stmt->execute()) {
            //login user
            $user_id = $conn->dba_insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($email, $token);
            
            //flash message
            $_SESSION['message'] = "You are now logged in!" ;
            $_SESSION['alert-class'] = "alert-success";
            header('location:index.php');
            exit();
        } else {
          $errors['db_error'] = "Database error: failed to register";
          echo $stmt->error;
        }
    }

}



// if user clicks on the signin button

if (isset($_POST['signin-btn'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    //validation
    if (empty($username)){
        $errors['username'] = "Username required";

    }
    if (empty($password)){
        $errors['password'] = "Password required";
    }

    if(count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])) {
            //login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $user['verified'];
            //flash message
            $_SESSION['message'] = "You are now logged in!" ;
            $_SESSION['alert-class'] = "alert-success";
            header('location:index.php');
            exit();
    
        }else{
         $errors['login_fail'] = "Wrong Credentials";
        }
    }
   

}

//logout user
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: signin.php');
    exit();

}