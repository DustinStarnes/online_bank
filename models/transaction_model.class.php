<?php
/*
* Author: Holly Lindsey
* Date: 11/20/2019
* File: transaction_model.class.php
* Description:
*/

class TransactionModel {
    private $db;
    private $dbConnection;

    //constructor, connect to databsase
    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }

    // retrieve user details from the registration form and then add them into
    //the users table in the usersystem database.
    public function addTransaction($user_id, $account_type, $amount){
        //add transaction to database
        $sql = "INSERT INTO transactions(user_id, account_type, amount) VALUES (" .$user_id.", " .$account_type.", ".$amount.")";

        //execute the query
        if ($this->dbConnection->query($sql) === TRUE) {
            echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
            return false;
        }

    }

    public function list_transactions() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        //$user= $_COOKIE['user'];
        $user= 1;

        $sql = "SELECT * FROM transactions WHERE user_id=" . $user ;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query){
            echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
            return false;
        }

        //if the query succeeded, but no transaction was found.
        if ($query->num_rows == 0) {
            echo "Error: No Transaction found: " . $sql . "<br>" . $this->dbConnection->error;
            return 0;
        }

        //handle the result
        //create an array to store all returned transactions
        $transactions = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $transaction = new Transaction(stripslashes($obj->id), stripslashes($obj->title), stripslashes($obj->amount), stripslashes($obj->account_type), stripslashes($obj->date));

            //add the transaction into the array
            $transactions[] = $transaction;
        }
        return $transactions;
    }

    //find total for a user's account
    public function get_total($user_id, $account_type){
        //SQL select statement
        $sql = "SELECT SUM(amount) FROM transactions WHERE user_id = " . $user_id . "AND account_type = " . $account_type ;

        //execute the query
        $query = $this->dbConnection->query($sql);

        //if query executes
        if ($query_row = $query->fetch_assoc()) {
            //show total
            echo $sql;

        } else {
            //if user is not in database
            return false;
        }

    }

    //get user details & add to the users table
    public function add_transaction()
    {
        //retrieve user inputs from the registration form
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_FLOAT);
        $sign = filter_input(INPUT_POST, "sign", FILTER_SANITIZE_STRING);
        $account_type = filter_input(INPUT_POST, 'account_type', FILTER_SANITIZE_STRING);

        if($sign == "-") {
            $amount = -1 * $amount;
        }

        //get user's ID
        if (isset($_COOKIE['user_id'])) {
            $user_id = $_COOKIE['user_id'];

        } else {
            //username cookie is not set error
            return false;
        }


        $sql = "INSERT INTO transactions(title, user_id, account_type, amount)  VALUES (' $title', $user_id ,  '$account_type' ,  $amount  ) ";



        if ($this->dbConnection->query($sql) === TRUE) {
            //echo "New record created successfully";
            return true;
        } else {
            //echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
            return false;
        }
    }

    public function search_transaction($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM transactions WHERE user_id=" . $user_id ;
        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }


        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query){
            echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
            return false;
        }

        //if the query succeeded, but no transaction was found.
        if ($query->num_rows == 0) {
            echo "Error: No Transaction found: " . $sql . "<br>" . $this->dbConnection->error;
            return 0;
        }

        //search succeeded, and found at least 1 transaction found.
        //create an array to store all the returned transactions
        $transactions = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $transaction = new Transaction(stripslashes($obj->id), stripslashes($obj->title), stripslashes($obj->amount), stripslashes($obj->account_type), stripslashes($obj->date));

            //add the transaction into the array
            $transactions[] = $transaction;
        }
        return $transactions;
    }



}