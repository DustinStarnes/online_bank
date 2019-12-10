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
        $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $lastname = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING));
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

        try {
            if ($username == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if ($password == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if ($lastname == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if ($firstname == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if ($email == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if (strlen($password) < 5) {
                throw new DataLength("Password must be 5 or more characters");
            }
            if (!Utilities::checkemail($email)) {
                throw new EmailFormat("Email is not valid.");
            } else {

            }
            //passwords must be hashed before being stored into the database.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // construct Insert query
            $sql = "INSERT INTO users(username, password, email, firstname, lastname) VALUES ('$username', '$hashed_password', '$email', '$firstname', '$lastname')";

            //execute the query and return true if successful or false if failed
            if ($this->dbConnection->query($sql) === TRUE) {
                return "Successful";
            } else {
                throw new DatabaseException("Database error has occured.");
            }


            // catch statements
        } catch (DataMissing $e) {
            return $e->getMessage();
        } catch
        (DataLength $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (EmailFormat $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }


    }


//retrieve/verify the user's login info from the login form and then verify in the database.

    public
    function verify_user($username, $password)
    {
        //retrieve username & password
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));

        try {
            if ($username == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if ($password == "") {
                throw new DataMissing("All fields must be filled.");
            } else {


                //SQL select statement
                $sql = "SELECT * FROM users WHERE username = " . $username;

                //run the query
                $query = $this->dbConnection->query($sql);

                // to check if the the username is in the database.
                if ($query_row = $query->fetch_assoc()) {

                    //verify password; if password is valid, set a temporary cookie
                    if ($query AND $query->num_rows > 0) {
                        $result_row = $query->fetch_assoc();
                        $hash = $result_row['password'];
                        if (password_verify($password, $hash)) {
                            setcookie("user", $username);
                            return "Success";
                        }
                    }

                    throw  new DatabaseException("Database Error");
                }
            }
        } catch
        (DataMissing $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }


    }


//create logout function that destorys the temporary cookie that is created when the user signs in.

    public
    function logout()
    {

        if (isset($_COOKIE['username'])) {
            unset($_COOKIE['username']);
            return true;
        } else {
            return false;
        }
    }

//retrieve the users username and password from the password reset & update the users password in the database.

    public
    function reset_password($password)
    {
        //retrieve username and password from a form
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        try {
            if ($username == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if ($password == "") {
                throw new DataMissing("All fields must be filled.");
            }
            if (strlen($password) < 5) {
                throw new DataLength("Password must be 5 or more characters");
            } else {

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

                    //return false if no rows were affected
                    if (!$query || $this->dbConnection->affected_rows == 0) {

                        throw  new DatabaseException("Database Error");
                    }

                    return "Successful";
                }
            }
        } catch
        (DataLength $e) {
            return $e->getMessage();
        } catch
        (DataMissing $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}