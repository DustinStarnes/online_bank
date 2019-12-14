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
        parent::header("User Error");
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

                <span style="float: left">Already have an account? <a class="link" href="<?= BASE_URL . "/user/login" ?>">Login</a></span>
                <span style="float: right">&nbsp &nbsp Don't have an account? <a class="link" href="<?= BASE_URL . "/" ?>">Register</a></span>

        </div>
        <!-- page specific content ends -->


        <?php
        //footer method
        parent::footer();
    }
}