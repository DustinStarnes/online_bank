<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class VerifyUser extends IndexView
{

    public function display($verify) {
        //header method
        parent::header("Verify User");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Login</div>

        <!-- middle row of page header -->
        <div class="middle-row">

        <?php
                if ($verify) { //if the user has logged in, display the logout button
                    echo "Welcome ". $_COOKIE['username'];
                    echo "<br>Want to log out? <a href='../../user/logout'>Logout</a>";
                } else { //if the user has not logged in, display the login button
                    echo "<br>Already have an account? <a href='../../user/login'>Login</a>";
                }
                ?>



        </div>
        <div class="bottom-row">
            <span style="float: left">
                Want to log out? <a class="link" href="index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Reset password? <a class="link" href="index.php?action=reset">Reset</a></span>
        </div>
        <?php

        //footer method
        parent::footer();
    }
}