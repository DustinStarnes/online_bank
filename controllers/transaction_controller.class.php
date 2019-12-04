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
            $message = "There was a problem displaying Transactions.";
            $this->error($message);
            return;
        }

        // display all movies
        $view = new TransactionIndex();
        $view->display($transactions);
    }

    public function add_new(){
        $view= new AddTransaction();
        $view->display();
    }
    public function do_add(){
        $addTransaction = $this->transaction_model->add_transaction();
        $view = new ConfrimAdd();
        $view->display($addTransaction);
    }
    public function error($message){
        $view = new TransactionError();
        $view->display($message);
    }

    //search transactions
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all movies
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $transactions = $this->transaction_model->search_transaction($query_terms);

        if ($transactions === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new TransactionSearch();
        $search->display($query_terms, $transactions);
    }
}