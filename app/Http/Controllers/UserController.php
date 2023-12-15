<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function ShowCorrectHomepage(){
        if(auth()->check()){
            // $posts = Post::all();
            return view('homepage-feed');
            // return auth()->user()->username;
        }else{
            return view('homepage');
        }
    }

    public function profile(){
        return view('profile');
    }

    public function register(Request $req){
        $incomingFeilds = $req->validate([
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $incomingFeilds['password'] = bcrypt($incomingFeilds['password']);

        $user = User::create($incomingFeilds);
        auth()->login($user);
        return redirect('/');
    } 

    public function login(Request $req){
        $incomingFeilds = $req->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username'=>$incomingFeilds['loginusername'],
        'password'=>$incomingFeilds['loginpassword']])){
            $req->session()->regenerate();
            return redirect('/')->with('success','Logged in Succefully');
        }else{
            return redirect('/')->with('failure','Wrong Credentials, try again');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    
}
