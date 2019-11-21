<?php
/*
 * Author: Holly Lindsey
 * Date: Nov 20, 2019
 * Name: transaction_index.class.php
 * Description: This class defines a method called "display", which displays all transactions.
 */
class TransactionIndex extends TransactionIndexView {
    /*
     * the display method accepts an array of transaction objects and displays
     * them in a grid.
     */

    public function display($transactions) {
        //display page header
        parent::displayHeader("List All Transactions");
        ?>
        <div id="main-header"> Transactions for user</div>

        <div class="grid-container">
            <?php
            if ($transactions === 0) {
                echo "No transaction was found.<br><br><br><br><br>";
            } else {
                //display transactions in a grid; six transactions per row
                foreach ($transactions as $i => $transaction) {
                    $id = $transaction->getId();
                    $amount = $transaction->getAmount();
                    $account_type = $transaction->getAccountType();


                    echo "<div class='col'><p><a href='", BASE_URL, "/transaction/detail/$id'> 
                    <span>Amount: $amount<br>Account: $account_type</span></p></a></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($transactions) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    } //end of display method
}