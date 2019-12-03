<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;

    //create constructor to database
    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }

    //get user details & add to the users table
    public function add_user()
    {
        //retrieve user inputs from the registration form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        //passwords must be hashed before being stored into the database.
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username, password, email, firstname, lastname) VALUES ('$username', '$hashed_password', '$email', '$firstname', '$lastname')";

        //run the query

        if ($this->dbConnection->query($sql) === TRUE) {
            //echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
            return false;
        }
    }

    //retrieve the user's login info from the login form and then verify in the database.

    public function verify_user($username, $password)
    {
        //SQL select statement
        $sql = "SELECT * FROM users WHERE username = " . $username;


        //run the query
        $query = $this->dbConnection->query($sql);

        // to check if the the username is in the database.
        if ($query_row = $query->fetch_assoc()) {

            //verify password

            if (password_verify($query_row["password"], $password)) {

                //set temporary cookie
                setcookie("username", $username);
                return true;
            } else {

                //if password is not correct
                return false;
            }

        } else {
            //if user is not in database
            return false;
        }

    }

    //create logout function that destorys the temporary cookie that is created when the user signs in.

    public function logout()
    {
        if (isset($_COOKIE['username'])) {
            unset($_COOKIE['username']);
            return true;
        } else {
            return false;
        }
    }

    //retrieve the users username and password from the password reset & update the users password in the database.

    public function reset_password($password)
    {

        //SQL select statement

        $sql = "SELECT * FROM users WHERE username=" . $_COOKIE['username'];

        //run the query

        $query = $this->dbConnection->query($sql);

        //if username is in database

        if ($query_row = $query->fetch_assoc()) {

            //hash password

            $password = password_hash($password, PASSWORD_DEFAULT);

            //SQL update statement

            $sql = "UPDATE users SET password = " . $password . " WHERE username = " . $_COOKIE['username'];


            //execute the query, return true or false

            return $this->dbConnection->query($sql);

        } else {

            //if user is not found in database
            return false;
        }
    }
}