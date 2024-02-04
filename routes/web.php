<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
/*===================================================================================================================================*/
    /* $user = DB::select('select * from users where id = ?', [2]);
     dump("mysql : ", $user);*/

    /*$pdo = DB::connection()->getPdo();
    $user = $pdo->query('select * from users')->fetchAll();
    dump("mysql : ", $user);*/

    /*$result = DB::select('select * from users where id = ? and name = ?', [1, 'Vilma 0\'Keefe']);
    $result = DB::select('select * from users where id = :id', ['id' => 1]);*/

/*===================================================================================================================================*/
    //data insert
    /*DB::insert('insert into users (name, email, password) values(?, ?, ?)', ['Inserted1 Name', 'email@fdf.com', 'password']);*/

   // dump($result);

   //Upadte
   /*$affected = DB::update('update users set email = "updatedemail@email.com" where email = ?', ['email@fdf.fd']);
   dump( $affected);*/

   //delete
   /*$deleted = DB::delete('delete from users where id = ?', [4]);
   dump( $deleted);*/

   //DB::statement('truncate table users');
/*===================================================================================================================================*/
   //$result = DB::select('select * from users'); //row sql
   // $result = User::all(); //aluquent orm

   //Transaction
   /* DB::transaction(function (){
        //try catch block is not necessary as well as DB:: rollBacke()
        try{
            DB::table('users')->delete();
            $result = DB::table('users')->where('id', 3)->update(['email' => 'none@gmail.com']);
        
            if(!$result){
                throw new \Exception;
            }

        }catch(\Exception $e){
            DB::rollBack();
        }

    }, 5);//optional third argument, how many times a transaction should be readttempted

    //DB::table('users')->where('id', 4)->update(['email' => 'none']);
    //DB::table('users')->where('id', 3)->update(['email' => 'none@gmail.com']);

    $result = DB::table('users')->select()->get(); //query builder
    dump($result);*/
/*===================================================================================================================================*/

    /*$users = DB::table('users')->get();
    $comment = DB::table('comments')->get();
    dump($users, $comment);*/
/*===================================================================================================================================*/

    //dump(factory(App\Comment::class, 4)->make());
    //dump(factory(App\Comment::class, 4)->create());
/*====================================pluck==========================================================================================*/
    /*$users = DB::table('users')->get();
    $users = DB::table('users')->pluck('email'); //its show only email 
    dump($users);*/
/*====================================where and first================================================================================*/
    //first means show only one data similar to condition
    /*$user = DB::table('users')->where('name', 'Alejandrin Kohler')->first();
    dump($user);*/
/*====================================where and value===============================================================================*/

    // $user = DB::table('users')->where('name', 'Alejandrin Kohler')->value('email');
    // dump($user);

/*====================================find================================================================================*/
    // $user = DB::table('users')->find(1);
    // dump($user);
/*====================================select================================================================================*/
    // $comments = DB::table('comments')->select('content as comment_content')->get();
    // dump($comments);

/*====================================distinct================================================================================*/
    //  $comments = DB::table('comments')->select('user_id')->distinct()->get();
    // dump($comments);

/*====================================count================================================================================*/
    // $comments = DB::table('comments')->count();
    // dump($comments);

/*====================================max, min, avg  ================================================================================*/
    // $comments = DB::table('comments')->max('user_id');
    // dump($comments);
/*====================================exists, doesntExist==================================================================*/
    // $result = DB::table('comments')->where('content', 'content')->exists();
    // dump($result);
/*==========================================where=====Room==================================================================*/
   // $result = DB::table('rooms')->where('price', '<', 200)->get();
   
   /* $result = DB::table('rooms')->where([
        ['room_size', '2'],
        ['price', '<', '400'],
    ])->get();*/

    /*$result = DB::table('rooms')
    ->where('room_size', '2')
    ->orWhere('price', '<', '200')
    ->get();*/

   //dump($result);
/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/

/*====================================where and first================================================================================*/





















    return view('welcome');
});









