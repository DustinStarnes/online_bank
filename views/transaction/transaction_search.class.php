<?php
/**
 * Author: Dustin Starnes
 * Date: 12/3/2019
 * File: transaction_search.class.php
 * Description:
 */

class TransactionSearch extends TransactionIndexView
{
    /*
     * the displays accepts an array of transaction objects and displays
     * them in a grid.
     */

    public function display($terms, $transactions)
    {
        //display page header
        parent::header("Search Results");
        ?>
        <div class="main-header" id="main-header"> Search Results for <i><?= $terms ?></i>
        <span class="rcd-numbers">
            <?php
            echo((!is_array($transactions)) ? "( 0 - 0 )" : "( 1 - " . count($transactions) . " )");
            ?>

        </div>

        <!-- display all records in a grid -->
        <div class="middle-row">
            <table class="table-container">
                <thead>
                <th class='right'>Title</th>
                <th class='right'>Amount</th>
                <th class='right'>Account_type</th>
                <th class='right'>Date</th>
                <th>Edit</th>
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
                        <td class='right'>$title</td>
                        <td class='right'>$amount</td>
                        <td class='right'>$account_type</td>
                        <td class='right'>$date</td>
                        <td><a class='edit' href='", BASE_URL, "/transaction/edit/$id'>Edit</a></td>
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

            <a  class="bottom-row" href="<?= BASE_URL ?>/transaction/index">Go to transaction list</a>

        <?php
        //display page footer
        parent::footer();
    }
}