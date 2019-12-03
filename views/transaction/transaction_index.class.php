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
        parent::header("List All Transactions");
        ?>
        <div class="top-row"> Transactions for user</div>

        <div class="middle-row">
        <table class="table-container">
            <thead>
                <td>Title</td>
                <td>Amount</td>
                <td>Account_type</td>
                <td>Date</td>
            </thead>
            <tbody>
            <?php
            if ($transactions === 0) {
                echo "No transaction was found.<br><br><br><br><br>";
            } else {
                //display transactions six transactions per row
                foreach ($transactions as $i => $transaction) {
                    $id = $transaction->getId();
                    $title = $transaction->getTitle();
                    $amount = $transaction->getAmount();
                    $account_type = $transaction->getAccountType();
                    $date = $transaction->getDate();


                    echo "<tr>
                        <td>$title</td>
                        <td>$amount</td>
                        <td>$account_type</td>
                        <td>$date</td>
                        <td><a href='", BASE_URL, "/transaction/edit/$id'>Edit</a></td>
                        </tr>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($transactions) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
            </tbody>
        </table>
        </div>

        <div class="bottom-row">
            <span style="float: left">Already have an account? <a class="link" href="/index.php?action=login">Login</a> </span>
        </div>

        <?php
        //display page footer
        parent::footer();
    } //end of display method
}