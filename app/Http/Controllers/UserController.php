<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $req){
        try {
            $registerFields = $req->validate([
                'name' => ['required'],
                'email' => ['required'],
                'password' => ['required']    
            ]);

            $registerFields['password'] = bcrypt( $registerFields['password']  );
            User::create( $registerFields );
            
            Session::flash('success', 'Registration successful! Welcome to our website.');
        } catch (\Exception $e) {
            // Registration failed
            Session::flash('error', 'Registration failed. Please try again.');
        }

        // auth()->login($user);

        return redirect('/');
    }

    public function logout(  ){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $req  ){
         $loginFields = $req->validate(
            [
                'loginName' => ['required'],
                'loginPassword' => ['required']
            ]);
        if (
            auth()->attempt( [ 'name' => $loginFields['loginName'] , 
                                'password' => $loginFields['loginPassword'] ] )
            )
        {
            $req->session()->regenerate(); 
            return redirect('/main');
        } 

        return redirect('/');    
    }

    
}
