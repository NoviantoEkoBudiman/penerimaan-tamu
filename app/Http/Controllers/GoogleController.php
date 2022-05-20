<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;


class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try{
            $account = Socialite::driver('github')->user();
            $user = User::where('email',$account->email)->first();
            if($user){
                Auth::login($user);
                return redirect('user');
            }else{
                $new_user = User::create([
                    'name' => $account->name,
                    'email' => $account->email,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]);
                Auth::login($new_user);
                return redirect('user');
            }
        }catch(\Throwable $th){
            abort(404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
