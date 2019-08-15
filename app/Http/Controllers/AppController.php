<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AppController extends Controller
{

    public function init()
    {
        $user = Auth::user();
        return response()->json(['user'=>$user], 200);
    }

    public function login(Request $request)
    {
    	
      return 'sfgdg';

    }

    public function register(Request $request)
    {

       $user = User::where('email', $request->email)->first();
       if(isset($user->id)){
       	  return response()->json([ 'error' => 'Email already exists'], 401);
       }

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save();
       Auth::login($user);

    }

    public function logout()
    {
       Auth::logout();
    }

}
