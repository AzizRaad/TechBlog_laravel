<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Post_Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        return view('index');
    }

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
            'category' => 'required',
        ]);

        $post = new Post;
        $post->title = strip_tags($incomingFields['title']);
        $post->body = strip_tags($incomingFields['body']);
        $post->user_id = auth()->id();
        $post->author = auth()->user()->username;
        $post->save();

        foreach ($req->input('category') as $category) {
            Post_Categories::create([
                'post_id' => $post->id,
                'category_id' => $category,
            ]);
        }
        
        return redirect('/')->with('success','Blog Created Successfully');
    }

    public function creatingPost(){
        return view('creating-post');
    }
}

