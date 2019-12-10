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
                if (strpos($verify, "successful") == true) { //if the user has logged in, display the logout button
                    echo "Want to log out? <a href='index.php?action=logout'>Logout</a>";
                    echo "Successful";
                    echo "Welcome ". $_COOKIE['username'];
                } else { //if the user has not logged in, display the login button
                    echo "Already have an account? <a href='index.php?action=login'>Login</a>";
                }
                ?>


        }
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