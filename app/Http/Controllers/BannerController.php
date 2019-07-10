<?php

namespace App\Http\Controllers;

use Image;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    // Add Banner
    public function addBanner(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Upload Category image/icon
            if ($request->hasFile('banner_image')) {
                $image_tmp = Input::file('banner_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'Rapid_Deals_slide_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend/banner/large/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(1920, 975)->save($large_image_path);
                }
            }

            Banner::create([
                'image'             => $filename,
                'title'             => $data['title'],
                'description'       => $data['description'],
                'link'              => $data['banner_link']
            ]);

            return redirect('/admin/banners')->with('flash_message_success', 'Banner Added Successfully!');
        }
        return view('admin.setting.banners.add_banner');
    }

    // Get all banners list
    public function banners()
    {
        $banners = Banner::get();
        return view('admin.setting.banners.banners', compact('banners'));
    }

    // Enable Banner
    public function enableBanner($id = null)
    {
        if (!empty($id)) {
            Banner::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('flash_message_success', 'Banner Enabled Successfully!');
        }
    }

    // Disable Banner
    public function disableBanner($id = null)
    {
        if (!empty($id)) {
            Banner::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('flash_message_success', 'Banner Disabled Successfully!');
        }
    }

    // Edit Banner
    public function editBanner(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if ($request->hasFile('banner_image')) {
                $image_tmp = Input::file('banner_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'Rapid_Deals_slide_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend/banner/large/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(1920, 975)->save($large_image_path);
                }
            } else {
                $filename = $data['current_image'];
            }

            Banner::where('id', $id)->update(['image' => $filename, 'title' => $data['title'], 'link' => $data['banner_link'], 'description' => $data['description']]);
            return redirect('/admin/banners')->with('flash_message_success', 'Banner Updated Successfully!');
        }

        $banners = Banner::where('id', $id)->first();
        $banners = json_decode(json_encode($banners));

        // echo "<pre>"; print_r($banners); die;

        return view('admin.setting.banners.edit_banner', compact('banners'));
    }


    // Delete Banner
    public function deleteBanner($id = null)
    {
        if (!empty($id)) {
            Banner::where('id', $id)->delete();
            return redirect()->back()->with('flash_message_success', 'Banner Deleted Successfully!');
        }
    }
}
