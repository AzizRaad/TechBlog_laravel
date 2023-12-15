<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function updatePost(Post $post, Request $req){
        $incomingFields = $req->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/post/' . $post->id)->with('success','Post Updated Successfully');
    }

    public function showEditForm(Post $post){
        return view('edit-post', ['post' => $post]);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success','Post succefully deleted');
    }

    public function viewSinglePost(Post $post){
        return view('singlepost')->with('post', $post);
    }

    public function storePost(Request $req){
        $incomingFields = $req->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['author'] = auth()->user()->username;

        $post = Post::create($incomingFields);
        return redirect('/');
    }

    public function creatingPost(){
        return view('creating-post');
    }
}
