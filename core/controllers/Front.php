<?php 
/**
 * Front controller class: controlles the workflow of the public requests in index.php
 */
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;
use Core\Models\Item;
use Core\Models\Transaction;
use Core\Models\User;

class Front extends Controller{
    // Handle the "/" user request.
    // get the needed data from the DB.
    // get the view.

    public function render() : View {
        return $this->view($this->view, $this->data);
    }

    public function list(){
        $option = new Option();
        $items = new Item();

        $this->view = 'homepage';
        $this->data['options'] = (object) [
            'title' => $option->get_option('site_title'),
            'slogan' => $option->get_option('site_slogan')
        ];
        $this->data['items'] = $items->get_all();
    }

    public function single(){
        $items = new Item();
        $transaction = new Transaction();
        $selected_transactions = [];
        $selected_items = $items->get_by_id($_GET['id']);
        $user = new User();
        $user_ob = $user->get_by_id($selected_items->item_author);
        $selected_items->item_author = !$user_ob ? "Deleted User" : $user_ob->display_name;
        $this->view = 'single';
        $this->data['item'] = $selected_items;

        foreach($items->get_items_transactions($selected_items->id) as $relation){
            $selected_transactions[] = $transaction->get_by_id($relation->transaction_id);
        }

        $this->data['transactions'] = $selected_transactions;
    }

    public function transactions(){
        $transaction = new Transaction();
        $this->data['transactions'] = $transaction->get_all();
        $this->view = 'transaction_cloud';
    }

    public function items_transactions(){
        $items = new item();
        $transaction = new transaction();
        $relations = $items->get_relations_based_on_tag($_GET['transaction_id']);
        $items_arr = [];
        foreach ($relations as $relation) {
            $items_arr[] = $items->get_by_id($relation->item_id);
        }

        $this->data['transaction'] = $transaction->get_by_id($_GET['transaction_id']);
        $this->data['items'] = $items_arr;
        $this->view = 'transactions_related_items';

    }

    


}
