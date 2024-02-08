<?php

use App\Comment;
use App\Reservation;
use App\Room;
use App\User;
use Barryvdh\Debugbar\Twig\Extension\Dump;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

/*=========================================================================================================================*/
    /* $user = DB::select('select * from users where id = ?', [2]);
     dump("mysql : ", $user);*/

    /*$pdo = DB::connection()->getPdo();
    $user = $pdo->query('select * from users')->fetchAll();
    dump("mysql : ", $user);*/

    /*$result = DB::select('select * from users where id = ? and name = ?', [1, 'Vilma 0\'Keefe']);
    $result = DB::select('select * from users where id = :id', ['id' => 1]);*/

/*=========================================================================================================================*/
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
/*=========================================================================================================================*/
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
/*=========================================================================================================================*/

    /*$users = DB::table('users')->get();
    $comment = DB::table('comments')->get();
    dump($users, $comment);*/
/*=========================================================================================================================*/

    //dump(factory(App\Comment::class, 4)->make());
    //dump(factory(App\Comment::class, 4)->create());
/*====================================pluck================================================================================*/
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->pluck('email'); //its show only email 
    // dump($users);
/*====================================where and first======================================================================*/
    //first means show only one data similar to condition
    /*$user = DB::table('users')->where('name', 'Alejandrin Kohler')->first();
    dump($user);*/
/*====================================where and value======================================================================*/

    // $user = DB::table('users')->where('name', 'Alejandrin Kohler')->value('email');
    // dump($user);

/*====================================find=================================================================================*/
    // $user = DB::table('users')->find(1);
    // dump($user);
/*====================================select===============================================================================*/
    // $comments = DB::table('comments')->select('content as comment_content')->get();
    // dump($comments);

/*====================================distinct=============================================================================*/
    // $comments = DB::table('comments')->select('user_id')->distinct()->get();
    // dump($comments);

/*====================================count================================================================================*/
    // $comments = DB::table('comments')->count();
    // dump($comments);

/*====================================max, min, avg  ======================================================================*/
    // $comments = DB::table('comments')->max('user_id');
    // dump($comments);
/*====================================exists, doesntExist==================================================================*/
    // $result = DB::table('comments')->where('content', 'content')->doesntExist();
    // dump($result);
/*==========================================where=====Room=================================================================*/
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
/*================================whereBetween,whereNotIn==================================================================*/
     // $result = DB::table('rooms')->whereBetween('room_size', [1,3])->get();

    // $result = DB::table('rooms')->whereNotIn('id', [1, 2, 3])->get();
   
  /* $result = DB::table('users')
            ->whereExists(function($query){
                $query->select('id')
                    ->from('reservations')
                    ->whereRaw('reservations.user_id = users.id')
                    ->where('check_in', '=', '2024-02-04')
                    ->limit(1);
            })
            ->get();*/
    //dump($result);
/*====================================whereJsonContains ===================================================================*/
        // $result = DB::table('users')
        //           ->whereJsonContains('meta->skills', 'Laravel')  
        //           ->where('meta->settings->site_language', 'en')
        //           ->get();

        // dump($result);
/*====================================paginate=============================================================================*/
            /*$result = DB::table('comments')->paginate(3);
            dump($result);*/

/*====================================statement============================================================================*/
        //$result = DB::statement('ALTER TABLE comments ADD FULLTEXT fulltext_index(content)');
       
        /*$result = DB::table('comments')
                ->whereRaw("MATCH(content) AGAINST(? IN BOOLEAN MODE )", ['Voluptatem  '])
                //->whereRaw("MATCH(content) AGAINST(? IN BOOLEAN MODE )", [' +repllendus -pariatur '])
                 ->get();*/
            //third baket er bitorer word er sate mil reke data show kore.
       
        /*$result = DB::table('comments')
                  ->where("content", 'like', '%officiis%')
                  ->get();*/

        //dump($result);

/*====================================join=================================================================================*/
               
       /* $result = DB::table('comments')
                   //->select(DB::raw('count(user_id) as number_of_comments, users.name'))
                 ->selectRaw('count(user_id) as number_of_comments, users.name')
                 ->join('users', 'users.id', '=', 'comments.user_id')
                 ->groupBy('user_id')
                 ->get();*/

       /* $result = DB::table('comments')
                ->orderByRaw('updated_at - created_at DESC ')
                ->get();*/

        /*$result = DB::table('users')
                ->selectRaw('LENGTH(name) as name_length, name' )
                ->orderByRaw('LENGTH(name) DESC')
                ->get();*/


        //dump($result);
/*====================================Latest first==========================================================================*/
           /* $result = DB::table('users')
                ->latest()
                ->first();
            dump($result);*/


/*==================================== having===============================================================================*/
       /* $result = DB::table('comments')
                ->selectRaw('count(id) as number_of_5stars_comments, rating')
                ->groupBy('rating')
                //->having('rating', '=' , 5)
                ->where('rating', '=' , 5)
                ->get();*/

        //dump($result);
/*==================================== skip take============================================================================*/
        // $result = DB::table('comments')
        //         ->skip(5)
        //         ->take(5)
        //         ->get();

        // dump($result);
/*====================================offset and limit======================================================================*/
            // $result = DB::table('comments')
            //     ->offset(5)
            //     ->limit(5)
            //     ->get();

            // dump($result);
/*====================================when==================================================================================*/
       /* $room_id = 1;
        $result = DB::table('reservations')
                ->when($room_id, function($query, $room_id){
                    return $query->where('room_id', $room_id);
                })
                ->get();*/

        /*$sortBy = 'room_number';
        $result = DB::table('rooms')
                ->when($sortBy, function($query, $sortBy){
                    return $query->orderBy($sortBy);
                }, function ($query){
                    return $query->orderBy('price');
                })
                ->get();*/


        //dump($result);
/*==================================== Chunk()===============================================================================*/
        // $result = DB::table('comments')
        //         ->orderBy('id')
        //         ->chunk(2, function($comments){
        //             foreach ($comments as $comment)
        //             {
        //                 echo $comment->content ."<br>";
        //             }
        //         });

       /* $result = DB::table('comments')
                ->orderBy('id')
                ->chunk(5, function($comments){
                    foreach ($comments as $comment)
                    {
                        DB::table('comments')
                        ->where('id', $comment->id)
                        ->update(['rating' => null]);
                    }
                });*/
        // dump($result);

/*========================================join===============================================================================*/
        /*$result = DB::table('reservations')
                ->join('rooms', 'reservations.room_id', '=', 'room_id')
                ->join('users', 'reservations.user_id', '=', 'user_id')
                ->where('rooms.id', '>' , 3)
                ->where('users.id', '>', 1)
                ->get();*/

        /*$result = DB::table('reservations')
                ->join('rooms', function($join){
                    $join->on('reservations.room_id', '=', 'room_id')
                    ->where('rooms.id', '>' , 3);
                })
                ->join('users', function($join){
                    $join->on('reservations.user_id', '=', 'user_id')
                    ->where('users.id', '>', 1);
                })
                ->get();*/

        /*$rooms = DB::table('rooms')
                ->where('id', '>', 3);
        $users = DB::table('users')
                ->where('id', '>', 1);
        $result = DB::table('reservations')
                ->joinSub($rooms, 'rooms', function($join){
                    $join->on('reservations.room_id', '=', 'room_id');
                })
                ->joinSub($users, 'users', function($join){
                    $join->on('reservations.user_id', '=', 'user_id');
                })
                ->get();*/

        /*$result = DB::table('rooms')
                ->leftJoin('reservations', 'rooms.id', '=', 'reservations.room_id')
                ->selectRaw('room_size, price, count(reservations.id) as reservations_count')
                ->groupBy('room_size', 'price')
                ->orderByRaw('count(reservations.id) DESC')
                ->get();*/

        /*$result = DB::table('rooms')
                ->crossJoin('cities')
                ->leftJoin('reservations', function($join){
                    $join->on('rooms.id', '=', 'reservations.room_id')
                    ->on('cities.id', '=', 'reservations.city_id');
                })
                ->selectRaw('count(reservations.id) as reservations_count, room_size, cities.name')
                ->groupBy('room_size', 'cities.name')
                ->orderByRaw('rooms.room_size DESC')
                ->get();*/


        //dump($result);
/*====================================Unions==========================================================================*/
    //order_id | client_id | order_date | order_amount 
    //refund_id | client_id | refund_date | refund_amount     

            /*$users = DB::table('users')
                    ->select('name');
            $result = DB::table('cities')
                    ->select('name')
                    ->union($users)
                    ->get();*/

            /*$comments = DB::table('comments')
                        ->select('rating as rating_of_room_id', 'id', DB::raw('"comments" as type_of_activity'))
                        ->where('user_id', 2);

            $result = DB::table('reservations')
                    ->select('room_id as rating_of_room_id', 'id', DB::raw('"reservations" as type_of_activity'))
                    ->union($comments)
                    ->where('user_id', 2)
                    ->get();*/

                        

            //dump($result);
/*====================================Insert==========================================================================*/
            /*DB::table('rooms')->insert([
                [
                    'room_number' => 1, 
                    'room_size'  => 1,
                    'price'  => 1,
                    'description' => 'new description 1'
                ],
                [
                    'room_number' => 2, 
                    'room_size'  => 2,
                    'price'  => 2,
                    'description' => 'new description 2'
                ]
                ]);

                $result = DB::table('rooms')
                ->get();*/

            /*$id = DB::table('rooms')->insertGetId(
                [
                    'room_number' => 3, 
                    'room_size'  => 3,
                    'price'  => 3,
                    'description' => 'new description 3'
                ]
                );

                dump($id);*/

/*======================================Update========================================================================*/
        /*$affected = DB::table('rooms')
                ->where('id', 1)
                ->update(['price' => 222]);*/

        /*$affected = DB::table('users')
                ->where('id', 1)
                ->update(['meta->settings->site_language' => 'es']);*/

        //$affected = DB::table('rooms')->increment('price', 20);

       // $affected = DB::table('rooms')->decrement('price', 10, ['description' => 'new description']);

        // $result = DB::table('rooms')
        //         ->get();

        //dump($affected, $result);
/*=========================================delete=====================================================================*/
               // DB::table('rooms')->where('id', '>', 10)->delete();

/*========================================lockForUpdate===============================================================*/
            // $result = DB::table('rooms')
            //         ->where('room_size', 2)
            //         ->lockForUpdate()
            //         ->get()
            //         ->dd();

            // dump($result);



/*==================addSelect===============elequent=Model dore kaj korte hoy=========================================*/
           // $result = Room::where('room_size' , 3)->get();

           /*$result = User::select('name', 'email')
                    ->addSelect(['worst_rating' => Comment::select('rating')
                    ->whereColumn('user_id', 'users.id')
                    ->orderBy('rating', 'asc')
                    ->limit(1)
                ])
                ->get()->toArray();*/

            /*$result = User::orderByDesc(
                        Reservation::select('check_in')
                            ->whereColumn('user_id', 'users.id')
                            ->orderBy('check_in', 'desc')
                            ->limit(1)
                    )->select('id', 'name')->get()->toArray();*/

            /*$result = Reservation::chunk(2, function($reservation){
                foreach($reservation as $reservation)
                {
                    echo $reservation->id;
                }
            });*/

            //dump($result);
/*====================find,first======withoutGlobalScope==========================================================================================*/
           // $result = User::find(1);
            //$result = User::where('email', 'like', '%@%')->first();

            // $result = User::where('email', 'like', '%@email12.com')->firstOr(function(){
            //     User::where('id', 1)->update(['email' => 'email@email.com']);
            // });


            //$result = Comment::all();
            // $result = Comment::withoutGlobalScope('rating')->get();
            //$result = Comment::rating(1)->get();

             //dump($result);
/*====================================================================================================================*/
                //$result = Comment::all()->toArray();
                //$result = Comment::all()->count();
                //$result = Comment::all()->toJson();

                // $comments = Comment::all();
                // $result = $comments->reject(function ($comment) {
                //     return $comment->rating < 3 ;
                // });

                // $result = $comments->map(function ($comment) {
                //     return $comment->content ;
                // });

                // $result = $comments->diff($result);


                // dump($result);
/*===============================data insert eloquent=====================================================================================*/
                   /* $comment = new Comment();
                    $comment->user_id = 1;
                    $comment->rating = 5;
                    $comment->content = 'comment content';
                    $result = $comment->save();*/
                    //1 recode insert in the database

                    // $result = Comment::create([
                    //     'user_id' => 1,
                    //     'rating' => 5,
                    //     'content' => 'comment content',
                    // ]);

                    // dump($result);
/*================================data update in eloquent====================================================================================*/
            // $comment = Comment::find(1);
            // $comment->user_id = 1;
            // $comment->rating = 5;
            // $comment->content = 'comment content update';
            // $result = $comment->save();

            // $result = Room::where('price', '<', 200)
            //             ->update([
            //                 'price' => 250
            //             ]);


            // dump($result);
/*=====================================delete==softdeletes=============================================================================*/
                // $comment = Comment::find(1);
                // $result = $comment->delete();

                //$result = Comment::destroy([1, 2,3]);
 
               // $result = Comment::where('rating', 1)->delete();

            //    $result = Comment::withTrashed()->get();

            //$result = Comment::withTrashed()->restore();
            $result = Comment::where('rating', 1)->forceDelete();

                dump($result);
/*=====================================================================================================================*/

/*=====================================================================================================================*/

/*=====================================================================================================================*/

/*===================================================================================================================================*/

/*===================================================================================================================================*/

/*===================================================================================================================================*/

/*===================================================================================================================================*/




















    return view('welcome');
});









