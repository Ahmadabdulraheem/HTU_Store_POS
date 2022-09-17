<?php 

session_start();

require_once "./config.php";
require_once "./functions.php";

use Core\Models\User;
use Core\Router;

spl_autoload_register(function($class_name){

    $file_path = __DIR__; 
    $class_name = explode('\\', $class_name);
  
    if($class_name[0] != 'Core')
        return;

    foreach($class_name as $key => $value){
   
        if($key != array_key_last($class_name)){
            $class_name[$key] = strtolower($value);
        }
        $file_path .= '/' . $class_name[$key];
    }

    $file_path .= '.php';
   

    require_once $file_path;
});


if(isset($_COOKIE['logged_in_user'])){
    $user = new User();
    $auth_user = $user->get_by_id($_COOKIE['logged_in_user']);
    if(!empty($auth_user)){
        $_SESSION['user'] = (object) [
            'username' => $auth_user->username,
            'display_name' => $auth_user->display_name,
            'user_id' => $auth_user->id,
            'logged' => true
        ];
    }
}


// Register Routes

// Public Routes
Router::get('/', 'front.list');
Router::get('/single', 'front.single');
Router::get('/tramsaction_cloud', 'front.tramsactions');
Router::get('/items_tramsactions', 'front.items_tramsactions');


// Adminstrating Routes
Router::get('/admin', 'admin'); // permission:all

// permission:admin && permission:new_edit
Router::get('/admin/items', 'items.list');
Router::get('/admin/items/single', 'items.single');
Router::get('/admin/items/add', 'items.add');
Router::post('/admin/items/store', 'items.store');
Router::get('/admin/items/edit', 'items.edit');
Router::post('/admin/items/update', 'items.update');
Router::post('/admin/items/delete', 'items.delete');

// permission:admin && permission:transactions_edit
Router::get('/admin/transactions', 'transactions.list');
Router::get('/admin/transactions/single', 'transactions.single');
Router::get('/admin/transactions/add', 'transactions.add');
Router::post('/admin/transactions/store', 'transactions.store');
Router::get('/admin/transactions/edit', 'transactions.edit');
Router::post('/admin/transactions/update', 'transactions.update');
Router::post('/admin/transactions/delete', 'transactions.delete');

// permission:admin
Router::get('/admin/users', 'users.list');
Router::get('/admin/users/single', 'users.single');
Router::get('/admin/users/add', 'users.add');
Router::post('/admin/users/store', 'users.store');
Router::get('/admin/users/edit', 'users.edit');
Router::post('/admin/users/update', 'users.update');
Router::post('/admin/users/delete', 'users.delete');

// permission:settings
Router::get('/admin/settings', 'settings.list');
Router::get('/admin/settings/edit', 'settings.edit');
Router::post('/admin/settings/update', 'settings.update');

// all
Router::get('/admin/profile', 'profile.list');
Router::get('/admin/profile/edit', 'profile.edit');
Router::post('/admin/profile/update', 'profile.update');

// all
Router::get('/login', 'login.form');
Router::post('/login', 'login.authenticate');
Router::post('/logout', 'login.logout');

Router::redirect();
