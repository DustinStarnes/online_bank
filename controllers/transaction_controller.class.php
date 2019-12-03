<?php
/*
 * Author: Holly Lindsey
 * Date: 12/3/2019
 * Name: transaction_controller.class.php
 * Description: 
 */

class TransactionController
{

    private $transaction_model;

    public function __construct()
    {
        $this->transaction_model = new TransactionModel;
    }

    public function index(){
        //retrieve all movies and store them in an array
        $transactions = $this->transaction_model->list_transactions();

        if (!$transactions) {
            //display an error
            $message = "There was a problem displaying movies.";
            $this->error($message);
            return;
        }

        // display all movies
        $view = new TransactionIndex();
        $view->display($transactions);
    }
    public function add(){
        $addTransaction = $this->transaction_model->add_transaction();
        $view = new Add();
        $view->display($addTransaction);
    }
    public function error($message){
        $view = new TransactionError();
        $view->display($message);
    }
}