<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request -> validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);
        if (auth() -> attempt(['name' => $incomingFields['loginName'], 'password' => $incomingFields['loginPassword']])) {
            $request -> session() -> regenerate();
        }
        return redirect('/');
    }
    public function logout(){
        auth() -> logout();
        return redirect('/');
    }
    //Validation for user registration
    public function register(Request $request ){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users','name')],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        // Validating user password
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        // Creating User Model and registering user to the Database
        $user = User::create($incomingFields);
        // Implmenting the login functionality
        auth() -> login($user);
        return redirect('/');
    }
}
