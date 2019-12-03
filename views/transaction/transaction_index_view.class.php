<?php
/*
 * Author: Holly Lindsey
 * Date: Nov 20, 2019
 * Name: transaction_index.class.php
 * Description: This class defines a method called "display", which displays all transactions.
 */

class TransactionIndexView extends IndexView {

    public static function header($title) {
        parent::header($title)
        ?>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/transaction/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search transactions" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function footer() {
        parent::footer();
    }

}