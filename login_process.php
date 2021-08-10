<?php
    session_start();
    include('server.php');
    $errors = array();

        // Login User
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
                array_push($errors, "User is required");
            }
        if (empty($password)) {
                array_push($errors, "password is required");
            }

        if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Your login successful";
            header("Location: index.php");

    } else {
            $_SESSION['error'] = "Your Username are incorrect";
            header("Location: login.php");
    }
}

    }

var_dump($errors);
?>
