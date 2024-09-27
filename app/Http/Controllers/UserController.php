<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $users = User::with('roles')->get();
        // $users = User::find(1);
        
        // dd($users->toJson(),$users->toArray());
// dd(User::with('roles')->get());
    //   return  view('users.index',['users'=>$users->toArray()]);
        return view('users.index');
    }


    public function getUsersData(Request $request)
    {
        // Fetch the users data
        // $users = User::query();
        // $users = User::with('roles')->query();
        $users =  User::with('roles')->get();
        // dd($users);
        // Return DataTables response
        return DataTables::of($users)
            ->addColumn('actions', function ($user) {
                return '<a href="/users/'.$user->id.'/edit">Edit</a>';
            })
           
            ->editColumn('roles', function($user) {
                return $user->roles->pluck('name')->implode(', '); // Join role names into a single string
            })
            ->rawColumns(['actions'])  // If you are rendering HTML columns, this is necessary
            ->make(true);
    }
}
