<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class Register extends IndexView
{

    public function display($success)
    {

        //header method
        parent::header("Register");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Create an account</div>

        <!-- middle row of page header -->
        <div class="middle-row">
            <?php

            if ($success) {
                echo "Registration was successful.";
            } else {

                echo "Registration failed.";
            }


            ?>
        </div>

        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">You have attempted to register <a href="/index.php?action=login">Login</a> </span>
        </div>
        <?php

        //footer method
        parent::footer();

    }
}