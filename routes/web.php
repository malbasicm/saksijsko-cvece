<?php

use \App\User;
use \App\Post;
use \App\Article;
use \App\Thread;
use \App\Http\Controllers;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    // Index page
    Route::get('/',function() {
        return view('index');
    });
    // Galerija
    Route::get('/galerija',function() {
        return view('galerija');
    });
    // Web Shop
    Route::get('/shop',function () {
        // Get all from database
        $articles = [];
        foreach(Article::all() as $article)
        {
            $artInfo = [
                'id' => $article->id,
                'name' => $article->name,
                'src' => URL::to('/image/shop/').'/'.strtolower($article->name).'.jpg',
                'desc' => $article->description,
                'price' => $article->price
            ];

            array_push($articles,$artInfo);
        }
        return view('shop')->with(['articles' => $articles]);
    });
    Route::post('/getItem', function(Request $request) {
        return Article::where('id',$request->input('itemId'))->first();
    });
    Route::get('/cart', function () {
        return view('cart');
    });
    // O Autoru
    Route::get('/oautoru',function () {
        return view('o-autoru');
    });
    // O Sajtu
    Route::get('/osajtu',function () {
        return view('o-sajtu');
    });
    // Login
    Route::get('/login',function() {
        return view('login');
    });
    // Logout
    Route::any('/logout',function () {
        Session::forget('user');
        return redirect('/');
    });
});

Route::prefix('/user')->group(function(){
    // Get user by ID
    Route::get('/getById/{id}','UserController@getById');
    // Get user by E-Mail
    Route::get('/getByEmail/{email}','UserController@getByEmail');
    // Login
    Route::post('/login', 'UserController@login');
    // Buy an article
    Route::post('/buy', 'UserController@buyArticle');
    // Reset a password
    Route::get('/reset','UserController@resetPasswordView');
    Route::post('/reset', 'UserController@resetPW');
});

Route::prefix('/forum')->group(function(){
    // Forum
    Route::get('/',function () {
        if(Session::has('user'))
        {
            $threads = Thread::all()->toArray();

            for ($i=0; $i < count($threads); $i++) { 
                $threads[$i]['user'] = User::where('userId',Session::get('user')->userId)->first()->email;
            }

            return view('forum')->with(['threads' => $threads]);
        }
        else
            return redirect('/login');
    });
    // Get the thread
    Route::get('/view/{id}',function ($id) {
        $posts = Post::where('thread',$id)->get()->toArray();

        for ($i=0; $i < count($posts); $i++) { 
            $posts[$i]['user'] = User::where('userId',$posts[$i]['user'])->first()->email;
        }

        return view('forum-thread-view')->with(['posts' => $posts,'tid' => $id]);
    });
    // Post
    Route::post('/post',function(Request $request){
        // Get the info
        $userId = Session::get('user')->userId;
        $content = $request->input('post');
        $thread = $request->input('thread');

        $post = new Post;
        $post->user = $userId;
        $post->thread = $thread;
        $post->content = $content;

        $post->save();

        return redirect('/forum/view/'.$thread);
    });
    Route::get('/thread',function() {
        return view('forum-thread');
    });
    Route::post('/thread',function (Request $request) {
        if(Session::has('user'))
        {
            // Get the info
            $userId = Session::get('user')->userId;
            $name = $request->input('thread-name');
            // Create the thread
            $thread = new Thread;
            $thread->user = $userId;
            $thread->name = $name;
            // Proveri dal tema postoji
            if(Thread::where('name',$name)->first() != NULL) return "Tema vec postoji!";
            else
            {
                $thread->save();
                return redirect('/forum');
            }
        }
        else return redirect('/login');
    });
});