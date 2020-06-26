<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function registerform(){
        return view('users/register');
    }

    function handleregister(Request $request){
        $user = new User();
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        return redirect('/users/login');
    }


    function loginform(){
        return view('users/login');
    }

    function handlelogin(Request $request){
        $cred=array('email'=>$request->email,'password'=>$request->password);

        if( Auth::attempt($cred) )
        {
            return redirect('/books');
        }
        else
        {
            return 'not login';
        }
    }



    function note(){
        // all comment of users 
        // $com=comment::get();


        return view('users/comment');
    }
    function handlenote(Request $request){
        $comment = new comment();
        $comment->conent=$request->conent;
        $comment->user_id=Auth::user()->id;
        $comment->save();
        return redirect('users/comment');
    }
    function delete($id)
    {
        $user=comment::findorfail($id);
        $user->delete();
        return redirect('users/comment');
    }
}
