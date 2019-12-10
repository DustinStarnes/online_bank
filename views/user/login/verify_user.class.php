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

        if (!$verify) {
            echo "Error";

        } else {

            echo "Successful";
        }

        ?>


        }
        </div>
        <div class="bottom-row">
            <span style="float: left">
                Want to log out? <a href="index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Reset password? <a href="index.php?action=reset">Reset</a></span>
        </div>
        <?php

        //footer method
        parent::footer();
    }
}