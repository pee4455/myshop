<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <header>
            <div class="container">
                <div class="banner">
                    <img width="100%" height=""src="img/banner.jpg" alt="">
</div>
</div>
</header>


<nav>
    <div class="container">
        <div class="nav-c">
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">About</a></li>
                <li><a href="index.php">Contact</a></li>
                <li>
                    <form method="post" class="search_bar" action="">
                        <span>ค้นหา</span>
                        <input type="text" name="search_name" id="" placeholder="ค้นหาสินค้า">
                        <input type="submit" name="search_btn" id="" value="Search">
                    </form>
                </li>
            </ul>

               <ul class="login">
                    <?php if (isset($_SESSION['username'])) : ?>
                    <li>Welcome <strong><?php echo $_SESSION['username']; ?></strong></li>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ตะกร้า</a></li>
                    <li><a href="my_orders.php"><i class="fa fa-list-alt" aria-hidden="true">ดูรายการสินค้า</a></li>
                    <li><a href="#">logout</a></li>
                    <?php else :  ?>
                    <li><a href="login.php" >login</a></li>
                    <li><a href="register.php" >register</a></li>
                    <?php endif ?>
                </ul>
            </div> <!-- nav-c -->
      </div>
</nav>

    <section>
        <div class="container">
            <div class="login-form">
             <br>
                <img width="10%" src="img/login.jpg" alt="">
            <br><br>
            <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
            <?php endif ?>
                    <h1>login - เข้าสู่ระบบ</h1>
                    <br>
                    <form action="login_process.php" method="post">
                        <input type="text" name="username" placeholder="Enter your username" required >
                            <br>
                        <input type="password" name="password" placeholder="Enter your password" required >
                            <br>
                        <input type="submit" name="login_user" value="Login">
                    </form>
                    <a style="color: blue; font-size: 12px;" href="register.php">สมัครสมาชิก</a>
                </div>
        </div> <!-- container -->
    </section>


<footer>
    <div class="container">
        <p>&copy: Copyright 2020 All rights reserved. myshop</p>
    </div>
</footer>

</body>
</html>