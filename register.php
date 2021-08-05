<?php
    session_start();
    include ('server.php');
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
                    <li><a href="my_orders.php"><i class="fa fa-list-alt" aria-hidden="true"></i>ดูรายการสินค้า</a></li>
                    <li><a href="#" style="color: red;">logout</li>
                        <?php else :  ?>
                    <li><a href="login.php" >login</a></li>
                    <li><a href="register.php" >register</a></li>
                    <?php endif; ?>
                </ul>
            </div> <!-- nav-c -->
      </div>
</nav>

    <section>
        <div class="container">
                <div class="register-form">
<br>
                    <img width="25%" src="img/register.jpg" alt="">
<br><br>
<?php if(isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
            <?php endif ?>
                    <h1>Register - สมัครสมาชิก</h1>
                    <br>
                    <form action="register_process.php" method="post">
                     <?php  include['error.php']; ?> 
                        <input type="text" name="username" placeholder="Enter your username" required >
                            <br>
                        <input type="text" name="email" placeholder="Enter your email" required >
                            <br>
                        <input type="password" name="password" placeholder="Enter your password" required >
                            <br>
                         <input type="password" name="c_password" placeholder="Confirm your password" required >
                            <br>
                        <input type="text" name="phone" placeholder="Enter phone number" required >
                            <br>
                        <textarea name="address" placeholder="Enter your address" required ></textarea>   
                            <br>     
                        <input type="submit" name="login_user" value="Register">
                    </form>
                    <a style="color: blue; font-size: 12px;" href="login.php">เข้าสู่ระบบ</a>
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