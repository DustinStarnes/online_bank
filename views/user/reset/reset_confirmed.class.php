<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class ResetConfirmed extends IndexView
{

    public function display($reset){

        //header method
        parent::header();
        ?>
        <!-- top row of page header -->
        <div class="top-row">Logout</div>

        <!-- middle row of page header -->
        <div class="middle-row">
        <?php

        if ($reset) {
            echo "Password Reset";
        } else {

            echo "Reset Failed";
        }


        ?>

        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">Want to log out? <a href="../../../index.php">Logout</a></span>
            <span style="float: right">Don't have an account? <a href="../../../index.php">Register</a></span>
        </div>
        <?php

        //footer method
        parent::footer();

    }
}