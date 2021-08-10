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
            <div class="content-c">
                <div class="sidebar-c">
                    <div class="sidebar-title">
                        <h3>หมวดหมู่สินค้า</h3>
                    </div>

                        <ul class="sidebar-categories">
                            <li><a href="">หมวดหมู่สินค้า 1</a></li>
                            <li><a href="">หมวดหมู่สินค้า 2</a></li>
                            <li><a href="">หมวดหมู่สินค้า 3</a></li>
                            <li><a href="">หมวดหมู่สินค้า 4</a></li>
                        </ul>
                </div>

                    <div class="product-c">
                        <?php if(isset($_SESSION['success'])) : ?>
                              <div class="success">
                                <h3>
                                    <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                                </h3>
                              </div>
                        <?php endif ?>
<br><br>
                        <div class="product-grid">
                            <div class="product-items">
                                <div class="pd-img">
                                    <h3>Product Name</h3>
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="">
                                        </a>
                                </div>
                                <div class="pd-info">
                                    <p class="price">ราคา 10000 บาท</p>
                                    <a href="#" class="buy"> สั่งซื้อ </a>
                                    <p class="price">จำนวนคงเหลือ 5 ชิ้น</p>
                                </div>
                            </div>

                             <div class="product-items">
                                <div class="pd-img">
                                    <h3>Product Name</h3>
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="">
                                        </a>
                                </div>
                                <div class="pd-info">
                                    <p class="price">ราคา 10000 บาท</p>
                                    <a href="#" class="buy"> สั่งซื้อ </a>
                                    <p class="price">จำนวนคงเหลือ 5 ชิ้น</p>
                                </div>
                            </div>

                             <div class="product-items">
                                <div class="pd-img">
                                    <h3>Product Name</h3>
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="">
                                        </a>
                                </div>
                                <div class="pd-info">
                                    <p class="price">ราคา 10000 บาท</p>
                                    <a href="#" class="buy"> สั่งซื้อ </a>
                                    <p class="price">จำนวนคงเหลือ 5 ชิ้น</p>
                                </div>
                            </div>
    
                             <div class="product-items">
                                <div class="pd-img">
                                    <h3>Product Name</h3>
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="">
                                        </a>
                                </div>
                                <div class="pd-info">
                                    <p class="price">ราคา 10000 บาท</p>
                                    <a href="#" class="buy"> สั่งซื้อ </a>
                                    <p class="price">จำนวนคงเหลือ 5 ชิ้น</p>
                                </div>
                            </div>

                             <div class="product-items">
                                <div class="pd-img">
                                    <h3>Product Name</h3>
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="">
                                        </a>
                                </div>
                                <div class="pd-info">
                                    <p class="price">ราคา 10000 บาท</p>
                                    <a href="#" class="buy"> สั่งซื้อ </a>
                                    <p class="price">จำนวนคงเหลือ 5 ชิ้น</p>
                                </div>
                            </div>

                        </div>

                    </div>
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