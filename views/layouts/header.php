<?php
if (isset($view['params']['likes'])) {
    $likes = count($view['params']['likes']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="../assets/front/css/front.css">
    <link rel="stylesheet" href="../assets/front/css/media.css">
    <script src="../assets/front/js/jquery-3.7.1.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <header>
            <div class="navigation">
                <div class="left-nav">
                    <a href="/front/home"><h2>Gallery</h2></a>
                </div>
                <div class="right-nav">
                    <ul>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                            <li class="nav-li"><a class="navbar-link" href="/front/my_photos"><strong>My photos</strong></a>
                            </li>
                            <li class="nav-li" id="likescount"><a class="navbar-link" href="/front/wishlist"><strong>Wishlist</strong></a>
                                <?php if (isset($likes)) {
                                    if ($likes <= 9 and $likes > 0) { ?>
                                        <div class="number_liked"><?= $likes ?></div>
                                    <?php } else if ($likes > 9) { ?>
                                        <div class="number_liked">9+</div>
                                    <?php }
                                } ?>
                            </li>
                        <?php }
                        if (isset($_SESSION['user_id'])) { ?>

                            <li class="nav-li"><a href="/user/logout" class="navbar-btn">Logout</a></li>
                        <?php } else { ?>
                            <li class="nav-li"><a href="/front/auth" class="navbar-btn">Login</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </header>