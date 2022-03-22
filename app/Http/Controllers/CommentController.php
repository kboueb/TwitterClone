<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Comment;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Tweet $tweet){
        request()->validate([
            'content' =>'required | min:3',
        ]);

        $comment = new Comment;
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;

        $tweet->comments()->save($comment);

        return redirect()->route('tweet.show', $tweet);
    }

     public function storeReply(Comment $comment){
        request()->validate([
            'replyComment' =>'required | min:3',
        ]);

        $commentReply = new Comment;
        $commentReply->content = request('replyComment');
        $commentReply->user_id = auth()->user()->id;

        $comment->comments()->save($commentReply);

        return redirect()->back();
    }

}
