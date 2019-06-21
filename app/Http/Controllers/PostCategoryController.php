<?php

namespace App\Http\Controllers;

use Image;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostCategoryController extends Controller
{
    // Add New Category
    public function newCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $category = new PostCategory;

            $category->name         = $data['name'];
            $category->url          = $data['url'];
            $category->parent_cat   = $data['parent_cat'];
            $category->description  = $data['description'];

            // Upload Category image/icon
            if ($request->hasFile('cat_image')) {
                $image_tmp = Input::file('cat_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'Repid_Deals_cat_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend/post_images/category/large/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(1920, 500)->save($large_image_path);

                    // Store image in category folder
                    $category->cat_image = $filename;
                }
            }
            $category->save();

            return redirect('/admin/categories')->with('flash_message_success', 'Category Added Successfully!');
        }

        $post_category = PostCategory::where(['parent_cat'=>0])->get();
        $post_category_dropdown = '<option value="0" selected="selected">Main Category</option>';

        foreach($post_category as $pCategory){
            $post_category_dropdown .= "<option value='".$pCategory->id."'><strong>".$pCategory->name."</strong></option>";
            $sub_post_category = PostCategory::where(['parent_cat'=>$pCategory->id])->get();
            foreach($sub_post_category as $sub_pCategory){
                $post_category_dropdown .= "<option value='".$sub_pCategory->id."'>&nbsp;--&nbsp;".$sub_pCategory->name."</option>";
                $sub_sub_post_category = PostCategory::where(['parent_cat'=>$sub_pCategory->id])->get();
                foreach($sub_sub_post_category as $sub_subpCategory){
                    $post_category_dropdown .= "<option value='".$sub_subpCategory->id."'>&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;".$sub_subpCategory->name."</option>";
                }
            }
        }

        return view('admin.posts.new_category', compact('post_category_dropdown'));
    }

    // View All Category in Admin Panel
    public function categoryAll()
    {
        $categories = PostCategory::orderBy('name', 'asc')->get();
        return view('admin.posts.category_all', compact('categories'));
    }

    // Enable Post Category
    public function enableCategory($id=null)
    {
        if(!empty($id))
        {
            PostCategory::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('flash_message_success', 'Category Enabled Successfully!');
        }
    }

    // Disable Post Category
    public function disableCategory($id=null)
    {
        if(!empty($id))
        {
            PostCategory::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('flash_message_success', 'Category Disabled Successfully!');
        }
    }

    // Delete Post Category
    public function deleteCategory($id=null)
    {
        if(!empty($id))
        {
            PostCategory::where('id', $id)->delete();
            return redirect()->back()->with('flash_message_success', 'Category Deleted Successfully!');
        }
    }

    // Edit Post Category
    public function editCategory($id=null)
    {
        $pcat = PostCategory::where('id', $id)->first();
        $pcat = json_decode(json_encode($pcat));

        return view('admin.posts.edit_category', compact('pcat'));
    }
}


