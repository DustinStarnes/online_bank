<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class UserError extends IndexView
{

    public function display($message) {

        //header method
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="top-row">Error</div>

        <!-- middle row -->
        <div class="middle-row">
            <h3>We are sorry, but an error has occurred.</h3>
            <p><?= $message ?></p>
        </div>

        <!-- bottom row for links  -->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <!-- page specific content ends -->


        <?php
        //footer method
        parent::footer();
    }
}