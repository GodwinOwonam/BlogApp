<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    public function authorDashShow($id)
    {
        
        $posts = Post::where('user_id',$id)->get();
        // dd($id, $posts);
        if($posts == null)
        {
            return view('dummyAuthorDashboard');
        }
        else{
                
            return view('authorDashboard',[
                'posts' => $posts
            ]);
        }
    }

    public function readerDashShow($reader_id)
    {
        // Get posts from all the users and display them on the user dashboard
        $posts = Post::get();

        if($posts === null){
            return view('dummyReaderDash', [
                'reader_id' => $reader_id
            ]);
        }
        else{
            return view('customerDashboard',[
                'posts' => $posts,
                'reader_id' => $reader_id
            ]);
        } 
    }

    public function addNewPost(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        // added, get the user that is making this post
        $user = User::find($id);

        //create a new post after validating that all required data has been supplied
        $post = new Post();

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = $user->id;
        $post->author_name = $user->name;
        $post->author_email = $user->email;
        
        $post->save();
       
        return redirect()->route('authorDash', $user->id);
            // return view('customerDashboard');
        
    }

    public function editPost($id){
        $post = Post::find($id);
        return view('updatePost', [
            'post' => $post
        ]);  
    }

    public function updatePost(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        
        $post->save();
       
        return redirect()->route('authorDash', auth()->user()->id);
    }

    public function deletePost($id, $user_id){
        $post = Post::find($id);

        $post->delete();
        return redirect(route('authorDash', $user_id));
    }

    public function addComment($id, $reader_id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        if($comments == null){
            return view('dummyComments', [
                'post' => $post, 'reader_id' => $reader_id
            ]);
        }
        else{
            return view('comment', [
                'post' => $post,'reader_id' => $reader_id, 'comments' => $comments
            ]);
        }
    }
}
