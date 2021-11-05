<?php

namespace App\Controllers;

use \App\Core\App;

class UsersController{


    public function index(){

        $tableName = 'users';

        $users = App::get('database')->selectAll($tableName);


        return view('users', ['users' => $users]);
    }

    public function store(){

        App::get('database')->insert('users', [
            'name' => $_POST['name']
        ]);

        //header('Location: /users');

        return redirect('users');

    }


}


