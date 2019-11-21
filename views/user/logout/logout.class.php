<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class Logout extends View {

    public function display($loggedout){

        //header method defined to add header to the parent class
        parent::header();
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

        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? Sign up! <a href="/index.php?action=register">Register</a> </span>
        </div>
        <?php
        //footer method defined to add footer to the parent class
        parent::footer();

    }
}