<?php
/*
 * Author: Holly Lindsey
 * Date: 12/4/2019
 * Name: confirm_add.class.php
 * Description: 
 */

class ConfrimEdit extends IndexView
{

    public function display($success)
    {

        //header method
        parent::header("Register");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Add Transaction</div>

        <!-- middle row of page header -->
        <div class="middle-row">
        <?php

        if ($success) {
            echo "Transaction was successful.";


        } else {

            echo "Transaction failed.";
        }

        ?>
        </div>


        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left"><a class="link" href="<?= BASE_URL . "/transaction/index" ?>">View Transactions</a> </span>
        </div>
        <?php

        //footer method
        parent::footer();

    }
}