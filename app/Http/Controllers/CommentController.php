<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    //
    public function addNewComment(Request $request, $id, $reader_id)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        
        $post = Post::find($id);
        $reader = User::find($reader_id);

        //create a new comment after validating that all required data has been supplied
        $comment = new Comment();

        $comment->comment = $request->input('comment');
        $comment->post_id = $post->id;
        $comment->reader_id = $reader->id;
        $comment->reader_name = $reader->name;
        
        $comment->save();
       
        return redirect()->route('addComment', [$id, $reader->id]);
            // return view('customerDashboard');
        
    }

}
