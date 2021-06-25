<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(User $user){

        $posts = $user->posts()->with(['user','likes'])->paginate(5);
        return view('users.profile.index',[
           'user'=> $user,
           'posts'=>$posts,
        ]);
    }
}
