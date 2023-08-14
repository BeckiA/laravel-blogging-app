<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Validation for user registration
    public function register(Request $request ){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        // Validating user password
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        // Creating User Model and registering user to the Database
        User::create($incomingFields);
        
        return 'Hello from controller';
    }
}
