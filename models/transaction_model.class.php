<?php
/*
* Author: Holly Lindsey
* Date: 11/20/2019
* File: transaction_model.class.php
* Description:
*/

class UserModel {
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
    public function transaction($user_id, $account_type, $amount){
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


}