<footer>
    <div class="footer-menu">
        <div class="left-footer">
            <div class="sitename">
                <h3>Site name</h3>
            </div>
            <div class="sm-icons">
                <ul class="sm-ul">
                    <li class="sm-li"><a href="#" class="sm-icon-link"><img src="../assets/front/img/facebook.png"
                                                                            alt="facebook"></a></li>
                    <li class="sm-li"><a href="#" class="sm-icon-link"><img src="../assets/front/img/linkedin.png"
                                                                            alt="linkedin"></a></li>
                    <li class="sm-li"><a href="#" class="sm-icon-link"><img src="../assets/front/img/youtube.png"
                                                                            alt="youtube"></a></li>
                    <li class="sm-li"><a href="#" class="sm-icon-link"><img src="../assets/front/img/instagram.png"
                                                                            alt="instagram"></a></li>
                </ul>
            </div>
        </div>
        <div class="right-footer">
            <div class="menu1">
                <strong class="menu-title">Menu</strong>
                <ul class="menu-footer">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="menu-li"><a href="/front/add_image">Add image</a></li>
                        <li class="menu-li"><a href="/user/logout">Logout</a></li>
                    <?php }else{?>
                    <li class="menu-li"><a href="/front/auth">Login</a></li>
                    <li class="menu-li"><a href="/front/auth">Registration</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="menu1">
                <strong class="menu-title">Menu</strong>
                <ul class="menu-footer">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="menu-li"><a href="/front/my_photos">My photos</a></li>
                        <li class="menu-li"><a href="/front/wishlist">Wishlist</a></li>
                    <?php } ?>
                    <li class="menu-li"><a href="#">Page</a></li>
                </ul>
            </div>
            <div class="menu1">
                <strong class="menu-title">Menu</strong>
                <ul class="menu-footer">
                    <li class="menu-li"><a href="#">Page</a></li>
                    <li class="menu-li"><a href="#">Page</a></li>
                    <li class="menu-li"><a href="#">Page</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="../assets/front/js/main.js" type="text/javascript" charset="utf-8"></script>
<script src="../assets/front/js/like.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>