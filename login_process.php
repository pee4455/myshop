<?php
    session_start();

    include('server.php');

    $error = array();

        // Login User
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn,$_POST['login_user']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        if (empty($username)) {
                array_push($error, "User is required ");
            }
        if (empty($password)) {
                array_push($error, "password is required ");
            }
if(count($error) == 0) {
        $password = md5($password);
        $query = "SELECT * from users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Your login successful";
            header("Location: index.php");

    } else {
            $_SESSION['error'] = "Your Username are incorrect";
    }
}
    }

?>
