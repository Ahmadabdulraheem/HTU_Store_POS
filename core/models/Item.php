<?php
/**
 * Item Class: Model class to manage the website items (products)
 */

namespace Core\Models;

use Core\Base\Collection;
use Core\Base\Model;

class Item extends Model
{
    function items_transactions($transactions_id_arr){
        foreach($transactions_id_arr as $transaction_id){
           $transaction_id = (int)$transaction_id;
            $sql = "INSERT INTO items_transactions (item_id, transaction_id) VALUES ($this->last_insert_id, $transaction_id)";
            $this->connection->query($sql);
        }
    }

    function get_items_transactions($items_id){
        $sql = "SELECT * FROM items_transactions WHERE item_id=?";
        $query_result = $this->execute_by_id($sql, $items_id);
        $collection = new Collection($query_result);
        return $collection->data;
    }

    function get_relations_based_on_tag($transaction_id){
        $sql = "SELECT * FROM items_transactions WHERE transaction_id=?";

        $query_result = $this->execute_by_id($sql, $transaction_id);
        $collection = new Collection($query_result);
        return $collection->data;
    }

    function delete_relation($relation_id){
        $query = "DELETE FROM items_transactions WHERE id=$relation_id";
        return $this->connection->query($query);
    }

    function delete_relation_by_item_id($item_id){
        $query = "DELETE FROM items_transactions WHERE item_id=$item_id";
        return $this->connection->query($query);
    }

    function add_relation($items_id, $transaction_id){
        $items_id = (int) $items_id;
        $transaction_id = (int) $transaction_id;
        $sql = "INSERT INTO items_transactions (item_id, transaction_id) VALUES ($items_id, $transaction_id)";
        return $this->connection->query($sql);
    }
}

