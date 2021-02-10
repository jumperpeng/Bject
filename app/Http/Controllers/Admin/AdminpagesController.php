<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminpagesController extends Controller
{
    public function Control(){

        return view('adminControl.index');

    }

    public function Dashboard(){

        $posts = Post::count();
        $users = user::count();
        $admins = Admin::count();

        return view('adminControl.dashboard')
            ->with('posts', $posts)
            ->with('users', $users)
            ->with('admins', $admins);

    }

    public function Blog(){

        $posts = Post::all();
        $admin = Admin::all();
        $user = User::all();

        if( count($posts) < 1){
            return view('adminControl.blog')->with('posts', $posts);
        }else{
                $order1 = 1;
                $order2 = count($posts);


                return view('adminControl.blog')
                ->with('posts', $posts)
                ->with('admins', $admin)
                ->with('users', $user)
                ->with('Or_st',$order1)
                ->with('Or_su',$order2);
            }
    }

    // public function AccountUser(){

    //     $user = User::all();

    //     $order1 = 1;
    //     $order2 = count($user);

    //     return view('adminControl.accountUser')
    //     ->with('users', $user)
    //     ->with('Or_st',$order1)
    //     ->with('Or_su',$order2);

    // }

    // public function AccountAdmin(){

    //     $admin = Admin::all();

    //     $order1 = 1;
    //     $order2 = count($admin);

    //     return view('adminControl.accountAdmin')
    //     ->with('admins', $admin)
    //     ->with('Or_st',$order1)
    //     ->with('Or_su',$order2);

    // }

}
