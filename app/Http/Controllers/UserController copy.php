<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request){

        $users = User::with('roles')->get();
        // $users = User::find(1);
        
        // dd($users->toJson(),$users->toArray());

        view('users.index',['users'=>$users->toArray()]);
    }
}
