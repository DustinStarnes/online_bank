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
        <div id="searchbar" class="searchBar-holder">
            <form method="get" action="<?= BASE_URL ?>/transaction/search">
                    <div id="searchbar">
                        <input class="searchBar" type="text" name="query-terms" id="searchtextbox" placeholder="Search transactions" autocomplete="off" onkeyup="handleKeyUp(event)">
                        <div id="suggestionDiv"></div>
                    </div>
                    <input class="searchBtn" type="submit" value="Go" />

            </form>

        </div>
        <?php
    }

    public static function footer() {
        parent::footer();
    }

}