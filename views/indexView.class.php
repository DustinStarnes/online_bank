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
                <a class="lonk" href="#">Login</a>
                <span> | </span>
                <a class="lonk" href="#">Withdraw</a>
                <span> | </span>
                <a class="lonk" href="#">Deposit</a>
                <span> | </span>
                <a class="lonk" href="#">Check Balance</a>
            </div>
        </div>
        <?php
    }

    //create the page footer
    public static function footer() {
        ?>
        </body>
        </html>
        <?php
    }

}