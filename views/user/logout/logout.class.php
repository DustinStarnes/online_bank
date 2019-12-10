<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class Logout extends IndexView {

    public function display($loggedout){

        //header method
        parent::header("Logout");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Logout</div>


        <!-- middle row of page header -->
        <div class="middle-row">
        <?php

        if ($loggedout) {
            echo "You have been logged out.";
        } else {

            echo "Logout failed.";
        }


        ?>
        </div>
        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? Sign up! <a class="link" href="/index.php?action=register">Register</a> </span>
        </div>
        <?php
        //footer method
        parent::footer();

    }
}