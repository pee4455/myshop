<?php
    session_start();

        $username = "";
        $email = "";
        $errors = array();

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
            array_push($errors, "Username is required");
        }
        if(empty($email)) {
            array_push($errors, "email is required");
        }
        if(empty($phone)) {
            array_push($errors, "phone is required");
        }
        if(empty($address)) {
            array_push($errors, "address is required");
        }
        if(empty($password)) {
            array_push($errors, "password is required");
        }
        if ($password != $c_password) {
            array_push($errors, "password not match");
        }

        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' ";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user) {
            if($user['username'] === $username || $user['email'] === $email) {
                array_push($errors, "email is used already ");
                $_SESSION['error'] = "email is used already";
                header("location: register.php");
        }
    }

        if(count($errors) == 0) {
            $password = md5($password); //encrypt the password before saving in the database
            $query = "INSERT INTO users (username, email, password, phone, address) 
                      VALUES('$username','$email','$password','$phone','$address')";
            mysqli_query($conn,$query);
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You login successfully ";
                header("location: index.php");
        }
}
var_dump($errors);

?>