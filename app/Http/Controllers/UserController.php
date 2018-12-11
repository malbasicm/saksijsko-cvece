<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\User;
use App\Article;
use App\Purchase;
use App\PWRecovery;
use App\Mail\PasswordRecovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Get a user from the storage by ID.
     * 
     * @param int $id
     * @return \App\User
     */
    public function getById($id)
    {
        return User::where('userId',$id)->first();
    }
    /**
     * Buy an article.
     */
    public function buyArticle(Request $request)
    {
        // Get the info
        $userId = Session::get('user')->userId;
        $article = Article::where('id',$request->input('articleId'))->first();
        // Create the purchase
        $purchase = new Purchase;
        $purchase->article = $article->id;
        $purchase->boughtBy = $userId;
        $purchase->save();

        return $article->name;
    }
    /**
     * Reset users password
     */
    public function resetPW(Request $request) {
        $email = $request->input('email');
        $token = $request->input('token');
        if($token == null) {
            $token = str_random(32);
            $user = UserController::getByEmail($email);
            if($user != NULL) {
                $user->password = '-1';
                $rec = new PWRecovery;
                PWRecovery::where('user',$user->userId)->delete();
                $rec->user = $user->userId;
                $rec->token = $token;
                $rec->save();
                $user->update();
                /*try
                {*/
                    Mail::to($user->email)->send(new PasswordRecovery($token));
                /*}
                catch(\Exception $e) {}
                */
                return "Proverite mail";
            }
            else {
                return "Korisnik ne postoji";
            }
        }
        else {
            $rec = PWRecovery::where('token',$token)->first();
            if($rec != NULL) {
                $user = User::where('userId',$rec->user)->first();
                $user->password = bcrypt($email);
                $user->update();
                PWRecovery::where('user',$user->userId)->delete();

                return "Sifra je promenjena";
            }
            else {
                return "Neispravan token";
            }
        }
    }

    public function resetPasswordView(Request $request) {
        // grVuPc3u2OfuvF5SnS8ITs7BTLsolwDH
        $token = $request->input('token');
        if($token == NULL) return "Neispravan token";
        return view('resetpw')->with(['token' => $token]);
    }

    /**
     * Get a user from the storage by E-Mail.
     * 
     * @param string $email
     * @return \App\User
     */
    public function getByEmail($email)
    {
        return User::where('email',$email)->first();
    }

    /**
     * Tries to login the user.
     * 
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $user = UserController::getByEmail($email);
        if($user != NULL)
        {
            if(Hash::check($request->input('password'),$user->password))
            {
                Session::put('user',$user);
            }
            else 
            {
                return 'Invalid password';
            }
        }
        else
        {
            $user = new User;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            Session::put('user',$user);            
        }

        return redirect('/');
    }
}
