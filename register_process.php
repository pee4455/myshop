<?php

    session_start();

        $user = "";
        $email = "" ;
        $error = array();

        include('server.php');

// Register User

    if(isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);  // Detected injection
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
        $address = mysqli_real_escape_string($conn, $_POST['address']); 
        $password = mysqli_real_escape_string($conn, $_POST['password']); 
        $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);  

        if(empty($username)) {
            array_push($error, "Username is required");
        }
        if(empty($email)) {
            array_push($error, "email is required");
        }
        if(empty($phone)) {
            array_push($error, "phone is required");
        }
        if(empty($address)) {
            array_push($error, "address is required");
        }
        if(empty($password)) {
            array_push($error, "password is required");
        }
        if ($password != $c_password) {
            array_push($error, "password not match");
        }

        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn,$user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user) {
            if($user['username'] === $username || $user['email'] === $email) {
                array_push($error, "email is used already ");
                $_SESSION['error'] = "email is used already";
                header("Location: index.php");
        }
    }

        if(count($error) == 0) {
            $password = md5($password); //encrypt the password before saving in the database
            $query = "INSERT INTO users (username, email, password, phone, address) 
                      VALUES('$username','$email','$password','$phone','$address')";
            mysqli_query($conn,$query);
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You login successfully ";
                header("Location: index.php");
        }
}
?>