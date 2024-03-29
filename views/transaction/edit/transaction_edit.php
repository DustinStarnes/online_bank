<?php
/*
 * Author: Holly Lindsey
 * Date: 12/12/2019
 * Name: transaction_edit.php
 * Description: 
 */

class TransactionEdit extends IndexView
{

    public function display($transaction)
    {
        //display page header
        parent::header("Edit Transaction");
        ?>
        <div class="top-row"> Edit Transaction</div>

        <div class="middle-row" >

            <?php

            //display transactions six transactions per row


            if ($transaction === 0) {
                echo "No transaction was found.<br><br><br><br><br>";
            } else {


                //display transactions six transactions per row
               // foreach ($transactions as $i => $transaction) {

                    //$transaction = $transactions[0];


            $id = $transaction->getId();
            $title = $transaction->getTitle();
            $amount = $transaction->getAmount();
            $account_type = $transaction->getAccountType();
            $date = $transaction->getDate();
            ?>

            <form method="post" action="<?= BASE_URL . "/transaction/do_edit" ?>">
                <div><input class="text-box" type="hidden" name="id" placeholder="Transaction ID"
                            value="<?= $id ?>" />
                </div>
                    <div><input class="text-box" type="text" name="title" placeholder="Transaction Name"
                                value="<?= $title ?>" required/>
                    </div>
                    <div>$ <input class="text-box" type="text" name="amount" placeholder="Amount" value="<?= $amount ?>"
                                  required/></div>
                    <div>
                        <select name="account_type" required>
                            <option value="Savings" selected>Savings</option>
                            <option value="Checking">Checking</option>
                        </select>
                    </div>
                    <div><input type="submit" value="Submit" class="button"/></div>
                </form>
                <form method="post" action="<?= BASE_URL . "/transaction/delete" ?>">
                    <div><input class="text-box" type="hidden" name="id" placeholder="Transaction ID"
                                value="<?= $id ?>" />
                    </div>
                    <div><input type="submit" value="Delete" class="button"/></div>
                </form>

            <?php
            }
   // }
            ?>
        </div>

        <div class="bottom-row">
            <span style="float: left">Ready to leave? <a class="link"
                                                         href="../../../index.php">Log Out</a> </span>
        </div>
        <script src="www/js/ajax_autosuggestion.js"></script>
        <?php
        //display page footer
        parent::footer();
    } //end of display method
    }