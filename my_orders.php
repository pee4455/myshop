<?php
    session_start();
    include('server.php');

    if(!isset($_SESSION['username'])) {
        header("location: login.php");
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }


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
                    <img src="img/banner.jpg" width="100%">
                </div>
            </div>
        </header>

        <nav>
            <div class="container">
                <div class="nav-c">
                    <ul class="menu">
                        <li><a href="inpex.php">Home</a></li>
                        <li><a href="inpex.php">About</a></li>
                        <li><a href="inpex.php">Contact</a></li>
                        <li>
                            <form action="" class="search_bar" method="post">
                                <span>ค้นหา</span>
                                <input type="text" name="search_name" placeholder"ค้นหาสินค้า">
                                <input type="submit" name="search_btn" placeholder"Search">
                            </form>
                        </li>
                    </ul>


                    <ul class="login">
                        <?php if (isset($_SESSION['username'])) : ?>
                        <li>Welcome <strong><?php echo $_SESSION['username']; ?></strong><li>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>ตะกร้า</a></li>
                        <li><a href="my_orders.php"><i class="fa fa-list-alt" aria-hidden="true">ดูรายการสินค้า</i></a></li>
                        <li><a href="index.php?logout=<?php echo $_SESSION['username']; ?>" style="color: red;">logout</a></li>
                        <?php else :  ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <?php endif ?>
                     </ul>
                </div>
            </div>
        </nav>

<section>
<br><br>
    <div class="container">
        <br>
            <h1>รายการสั่งซื้อของคุณ <?php echo $_SESSION['username']; ?> </h1>
        <br>
            <div class="content-c">
                <table width="100%" border="1" style="border-collapse: collapse">
                    <tr>
                        <td>Order ID</td>
                        <td>Order Date</td>
                        <td>Order Name</td>
                        <td>Order Email</td>
                        <td>Order Phone</td>
                        <td>Order Address</td>
                        <td>Order Total</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2020-01-30-11:40:29</td>
                        <td>Patipan ppppp</td>
                        <td>patpat@gmail.com</td>
                        <td>808080088008</td>
                        <td>bangkok 10510</td>
                        <td>10000</td>
                    </tr>
                </table>
            </div>
    </div>

</section>

<footer>
        <div class="container">
            <p>&copy; Copyright 2020 All right reserve</p>
        </div>
</footer>

</body>
</html>