<?php

/*
 * Author: Holly Lindsey
 * Date: Nov 20, 2019
 * Name: transaction.class.php
 * Description: the transaction class models a real-world transaction.
 */

class Transaction
{

    //private data members
    private $id, $title, $amount, $account_type, $date;

    /**
     * Transaction constructor.
     */
    public function __construct($id, $title, $amount, $account_type, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->amount = $amount;
        $this->account_type = $account_type;
        $this->date= $date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }






}

