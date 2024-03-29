<?php
/**
 * Aurthor: Dustin Starnes
 * Date: 11/21/2019
 * File: indexView.class.php
 * Description:
 */

class IndexView
{
    //create the page header
    public static function header($page_title) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Bank Online</title>
            <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/www/css/styles.css" />
        </head>
        <body>

        <div class="header-banner">I211 Banking Online</div>
        <div class="navbar">
            <div class="lonks">
                <?php
                //if logged in
                if(isset($_COOKIE['username'])){
                ?>
                    <a class="lonk" href="<?= BASE_URL . "/transaction/index" ?>">Home</a>
                    <span> | </span>
                    <a class="lonk" href="<?= BASE_URL . "/transaction/add_new" ?>">Withdraw & Deposit</a>
                    <span> | </span>
                    <a class="lonk" href="<?= BASE_URL . "/transaction/index" ?>">Balance</a>
                    <span> | </span>
                    <a class="lonk" href="<?= BASE_URL . "/user/reset" ?>">Reset Password</a>
                    <span> | </span>
                    <a class="lonk" href="<?= BASE_URL . "/user/logout" ?>">Logout</a>
                <?php } else{
                    //if not logged in
                ?>
                <a class="lonk" href="<?= BASE_URL . "/" ?>">Home</a>
                <span> | </span>
                <a class="lonk" href="<?= BASE_URL . "/" ?>">Register</a>
                <span> | </span>
                <a class="lonk" href="<?= BASE_URL . "/user/login" ?>">Login</a>
                <?php }
                ?>
            </div>
        </div>
        <?php
    }

    //create the page footer
    public static function footer() {
        ?>
        <script src="../www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    }

}