<?php
/*
 * Author: Holly Lindsey
 * Date: 12/4/2019
 * Name: add_transaction.class.php
 * Description: 
 */

class AddTransaction extends IndexView
{

    public function display()
    {

        //header method
        parent::header("Register");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Add Transaction</div>

        <!-- middle row of page header -->
        <div class="middle-row">
        <form method="post" action="<?= BASE_URL . "/transaction/do_add" ?>">
            <div><input class="text-box" type="text" name="title" placeholder="Transaction Name" required /></div>
            <div><input type="radio" id="deposit" name="sign" value="+"
                        >
                <label for="deposit">Deposit</label></div>
            <div><input type="radio" id="withdraw" name="sign" value="-" checked>
                <label for="withdraw">Withdraw</label></div>
            <div>$ <input class="text-box" type="text" name="amount" placeholder="Amount" required /></div>
            <div>
                <select name="account_type" required>
                    <option value="Savings">Savings</option>
                    <option value="Checking">Checking</option>
                </select>
            </div>
            <div><input type="submit" value="Submit" class="button"/></div>
        </form>


        <!-- bottom row of page header -->
        <div class="bottom-row">

        </div>
        <?php

        //footer method
        parent::footer();

    }
}