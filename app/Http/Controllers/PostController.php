<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Add New Post
    public function newPost(Request $request)
    {
        return view('admin.posts.new_post');
    }

    // View All Post in Admin Panel
    public function postsAll()
    {
        return view('admin.posts.posts_all');
    }
    
}
