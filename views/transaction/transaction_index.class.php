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

    public function display($transactions, $totals) {
        //display page header
        parent::header("List All Transactions");
        ?>
        <div class="top-row"> Transactions for user </div>

        <div class="middle-row">
            <div class="totals">
                <p>Checking Total: $<?php echo $totals[0] ?></p>
                <p>Savings Total: $<?php echo $totals[1] ?></p>
            </div>

            <table class="table-container">
            <thead>
            <tr>
                <th class='right'>Title</th>
                <th class='right'>Amount</th>
                <th class='right'>Account_type</th>
                <th class='right'>Date</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($transactions == 0) {
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
                        <td class='right'>$title</td>
                        <td class='right'>$$amount</td>
                        <td class='right'>$account_type</td>
                        <td class='right'>$date</td>
                       <td><a class='edit' href='", BASE_URL, "/transaction/edit/?id=$id'>Edit</a></td> 
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
            <span style="float: left">Ready to leave? <a class="link" href="<?= BASE_URL . "/user/logout" ?>">Log Out</a> </span>
        </div>
        <script src="www/js/ajax_autosuggestion.js"></script>
        <?php
        //display page footer
        parent::footer();
    } //end of display method
}