<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;

class ProfileController extends Controller
{
    public function tweet_perso(){
        $tweets = Tweet::latest()->paginate(25);
        return view('profile.tweet-personnel', compact('tweets'));
    }
}
