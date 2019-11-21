<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class users_class
{
    //private attributes
    private $username, $password, $first_name, $last_name, $email;

    // constructor
    public function __construct($username, $password, $first_name, $last_name, $email)
    {
        $this->username= $username;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;

    }

    //create getters
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }





}