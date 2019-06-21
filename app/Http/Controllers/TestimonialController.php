<?php

namespace App\Http\Controllers;

use Image;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestimonialController extends Controller
{
    // Add New Testimonial
    public function addTestimonial(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $testimonial = new Testimonial;

            $testimonial->content       = $data['content'];
            $testimonial->user_name     = $data['user_name'];

            // Upload User image/icon
            if ($request->hasFile('user_image')) {
                $image_tmp = Input::file('user_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'Repid_Deals_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend/testimonial_images/large/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(500, 500)->save($large_image_path);

                    // Store image in Testimonial folder
                    $testimonial->user_image = $filename;
                }
            }
            $testimonial->save();

            return redirect('/admin/testimonials')->with('flash_message_success', 'Testimonial Added Successfully!');
        }

        return view('admin.testimonials.new_testimonial');
    }

    // View All Testimonial
    public function testimonialAll()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();

        return view('admin.testimonials.testimonial_all', compact('testimonials'));
    }

    // Delete Testimonials
    public function deleteTestimonials($id=null)
    {
        if(!empty($id)){
            Testimonial::where('id', $id)->delete();
            return redirect()->back()->with('flash_message_success', 'Testimonial Deleted Successfully!');
        }
    }

    // Disable Testimonials
    public function disableTestimonials($id=null)
    {
        if(!empty($id)){
            Testimonial::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('flash_message_success', 'Testimonial Disabled Successfully!');
        }
    }

    // Enable Testimonials
    public function enableTestimonials($id=null)
    {
        if(!empty($id)){
            Testimonial::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('flash_message_success', 'Testimonial Enabled Successfully!');
        }
    }

    // Edit Testimonials
    public function editTestimonials($id=null)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        $testimonial = json_decode(json_encode($testimonial));

        return view('admin.testimonials.edit_testimonial', compact('testimonial'));
    }
}