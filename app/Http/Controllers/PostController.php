<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    // Add New Post
    public function newPost(Request $request)
    {

        if($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $author = Auth::user()->id;

            if(!empty('status')){
                $status = 1;
            }else{
                $status = 0;
            }
            if(!empty('feature_post')){
                $featured = 1;
            }else{
                $featured = 0;
            }

            $post_data = new Post;

            $post_data->title       = $data['name'];
            $post_data->url         = $data['url'];
            $post_data->post_cat    = $data['post_cat'];
            $post_data->post_type   = $data['post_type'];
            $post_data->author      = $author;
            $post_data->content     = $data['description'];
            $post_data->status      = $status;
            $post_data->featured    = $featured;

            // Upload Post image/icon
            if ($request->hasFile('featured_image')) {
                $image_tmp = Input::file('featured_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'Repid_Deals_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend/post_images/large/' . $filename;
                    $small_image_path = 'images/frontend/post_images/small/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(1599, 618)->save($large_image_path);
                    Image::make($image_tmp)->resize(569, 395)->save($small_image_path);

                    // Store image in Post Image folder
                    $post_data->post_image = $filename;
                }
            }
            $post_data->save();

            return redirect()->back()->with('flash_message_success', 'Post Published Successfully!');
        }

        $post_category = PostCategory::where(['parent_cat' => 0])->get();
        $post_category_dropdown = '<option value="0" selected="selected">Main Category</option>';

        foreach ($post_category as $pCategory) {
            $post_category_dropdown .= "<option value='" . $pCategory->id . "'><strong>" . $pCategory->name . "</strong></option>";
            $sub_post_category = PostCategory::where(['parent_cat' => $pCategory->id])->get();
            foreach ($sub_post_category as $sub_pCategory) {
                $post_category_dropdown .= "<option value='" . $sub_pCategory->id . "'>&nbsp;--&nbsp;" . $sub_pCategory->name . "</option>";
                $sub_sub_post_category = PostCategory::where(['parent_cat' => $sub_pCategory->id])->get();
                foreach ($sub_sub_post_category as $sub_subpCategory) {
                    $post_category_dropdown .= "<option value='" . $sub_subpCategory->id . "'>&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;" . $sub_subpCategory->name . "</option>";
                }
            }
        }

        return view('admin.posts.new_post', compact('post_category_dropdown'));
    }

    // View All Post in Admin Panel
    public function postsAll()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts.posts_all', compact('posts'));
    }

    // Single Post Detail Page Function
    public function singlePost($url=null)
    {
        $posts = Post::where('url', $url)->orderBy('created_at', 'desc')->get();

        return view('frontend.posts.single_post', compact('posts'));
    }

    // Blog Page Function
    public function blogPage()
    {
        $posts = Post::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('frontend.posts.blog_page', compact('posts'));
    }
}
