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


    public function list_transactions() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        //$user= $_COOKIE['user'];
        $user= 1;

        try{
            $sql = "SELECT * FROM transactions WHERE user_id=" . $user ;

            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query){
                throw new DatabaseException("Error: " . $sql . "<br>" . $this->dbConnection->error);
            }

            //if the query succeeded, but no transaction was found.
            if ($query->num_rows == 0) {
                throw new DatabaseException("Error: No Transaction found: " . $sql . "<br>" . $this->dbConnection->error);
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
        } catch (DatabaseException $e) {
            return $e->getMessage();
        }
    }

    public function get_transaction() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        //get user's ID
        if (isset($_COOKIE['user_id'])) {
            $user = $_COOKIE['user_id'];
        } else {
            $user = 1;
        }

        try {
            $sql = "SELECT * FROM transactions WHERE user_id=" . $user . " AND id = " . $_GET["id"];

            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query) {
                throw new DatabaseException( "Error: " . $sql . "<br>" . $this->dbConnection->error);

            }

            //if the query succeeded, but no transaction was found.
            if ($query->num_rows == 0) {
                throw new DatabaseException( "Error: No Transaction found: " . $sql . "<br>" . $this->dbConnection->error);

            }

            //handle the result

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $transaction = new Transaction(stripslashes($obj->id), stripslashes($obj->title), stripslashes($obj->amount), stripslashes($obj->account_type), stripslashes($obj->date));
            }
            return $transaction;
        } catch (DatabaseException $e) {
            return $e->getMessage();
        }
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
            $user_id = 1;
        }


        try{
            $sql = "INSERT INTO transactions(title, user_id, account_type, amount)  VALUES (' $title', $user_id ,  '$account_type' ,  $amount  ) ";
            if ($this->dbConnection->query($sql) === TRUE) {
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
                throw new DatabaseException("Error: " . $sql . "<br>" . $this->dbConnection->error);
            }
        } catch (DatabaseException $e) {
            return $e->getMessage();

        }
    }

    public function search_transaction($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach

        if (isset($_COOKIE['user_id'])) {
            $user_id = $_COOKIE['user_id'];
        } else {
            $user_id = 1;
        }

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

    public function edit_transaction()
    {
        //retrieve user inputs from the registration form
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
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
            $user_id = 1;
        }

        try {

            $sql = "UPDATE transactions SET  title='$title', account_type= '$account_type' , amount= $amount WHERE user_id= $user_id AND id= $id ";


            if ($this->dbConnection->query($sql) === TRUE) {
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
                throw new DatabaseException("Error: " . $sql . "<br>" . $this->dbConnection->error);
            }

        } catch (DatabaseException $e) {
            return $e->getMessage();
        }
    }



}