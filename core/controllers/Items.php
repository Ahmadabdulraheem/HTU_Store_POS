<?php

/**
 * items controller class: controlles the workflow of the "/admin/items" request in index.php
 */

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Transaction;
use Core\Models\User;

class items extends Controller
{

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function list(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $items = new Item();
        $all_items = $items->get_all();
        $user = new User();
        
        foreach ($all_items as $key => $value) {
            $current_user = $user->get_by_id($value->item_author);
            $all_items[$key]->item_author = !empty($current_user) ? $current_user->display_name : "delete_user";
        }
        $this->view = 'admin.items.list';
        $this->data['items'] = $all_items;

    }

    public function single(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $items = new Item();
        $transaction = new transaction();
        $selected_transactions = [];
        $selected_items = $items->get_by_id($_GET['id']);
        $user = new User();
        $selected_items->item_author = $user->get_by_id($selected_items->item_author)->display_name;
        // please do not forget to do a validation if the item was not found, to redirect to 404.
        $this->view = 'admin.items.single';
        $this->data['item'] = $selected_items;

        foreach($items->get_items_transactions($selected_items->id) as $relation){
            $selected_transactions[] = $transaction->get_by_id($relation->transaction_id);
        }

        $this->data['transactions'] = $selected_transactions;
    }

    public function add(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $transaction = new transaction();
        $this->view = 'admin.items.add';
        $this->data['transactions'] = $transaction->get_all();
    }

    public function store(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $items = new Item();
        $items_title = $_POST['title'];
        $items_content = $_POST['content'];
        $items_excerpt = $_POST['excerpt'];
        $items->insert([
            'item_title' => $items_title,
            'item_content' => $items_content,
            'item_excerpt' => $items_excerpt,
            'item_author' => 1,
            'item_status' => 'published'
        ]);

        if(!empty($_item['items_transactions'])){
            $items->items_transactions($_item['items_transactions']);
        }
        redirect('/admin/items');
    }

    public function edit(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $items = new item();
        $transaction = new transaction();
        $selected_transactions = [];
        $selected_items = $items->get_by_id($_GET['id']);
        $item_transactions = $items->get_items_transactions($selected_items->id);

        foreach($item_transactions as $relation){
            $selected_transactions[] = $transaction->get_by_id($relation->transaction_id);
        }

        $this->view = 'admin.items.edit';
        $this->data['item'] = $selected_items;
        $this->data['selected_transactions'] = $selected_transactions;
        $this->data['all_transactions'] = $transaction->get_all();
    }

    public function update(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $items = new item();
        $items->update($_POST['id'], [
            'item_title' => $_POST['title'],
            'item_content' => $_POST['content'],
            'item_excerpt' => $_POST['excerpt'],
            'item_author' => 1,
            'item_status' => 'published'
        ]);

     
        if(isset($_item['items_transactions'])){
            $updated_transactions_arr = $_item['items_transactions'];
            $current_relations = $items->get_items_transactions($_item['id']);
            foreach ($current_relations as $key => $relation) {
                if(in_array($relation->transaction_id, $updated_transactions_arr)){
                    unset($updated_transactions_arr[$key]);
                } else {
                    $items->delete_relation($relation->id);
                }
            }

            foreach ($updated_transactions_arr as $transaction_id) {
                $items->add_relation($_item['id'], $transaction_id);
            }
        }
        
        redirect('/admin/items');
    }

    public function delete(){
        $this->authorize(['admin', 'items_edit']);
        self::set_admin();
        $items = new item();
        $items_id = $_POST['items_id'];
        $items->delete_relation_by_item_id($items_id);
        $items->delete($items_id);

        redirect('/admin/items');
    }
}
