<?php

/**
 * transactions controller class: controlles the workflow of the "/admin/transactions" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\transaction;

class transactions extends Controller
{

    public function __construct()
    {
        $this->authorize(['admin', 'transactions_edit']);
    }

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function list(){
        self::set_admin();
        $transactions = new transaction();
        $all_transactions = $transactions->get_all();

        $this->view = 'admin.transactions.list';
        $this->data['transactions'] = $all_transactions;

    }

    public function single(){
        self::set_admin();
        $transactions = new transaction();
        $selected_transaction = $transactions->get_by_id($_GET['id']);
        
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.transactions.single';
        $this->data['item'] = $selected_transaction;
    }

    public function add(){
        self::set_admin();
        $this->view = 'admin.transactions.add';
    }

    public function store(){
        self::set_admin();
        $transaction = new transaction();
        $transaction->insert([
            'name' => $_POST['transaction_name'],
        ]);
        redirect('/admin/transactions');
    }

    public function edit(){
        self::set_admin();
        $transaction = new Transaction();
        $this->view = 'admin.transactions.edit';
        $this->data['item'] = $transaction->get_by_id($_GET['id']);
    }

    public function update(){
        self::set_admin();
        $transaction = new Transaction();
        $transaction->update($_POST['id'], [
            'name' => $_POST['transaction_name'],
        ]);
        redirect('/admin/transactions');
    }

    public function delete(){
        self::set_admin();
        $transaction = new Transaction();
        $transaction->delete($_POST['transaction_id']);

        redirect('/admin/transactions');
    }
}
