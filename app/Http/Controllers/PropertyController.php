<?php

namespace App\Http\Controllers;

use App\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Add Property Types
    public function addPropertyType(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            if (!empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $url = str_slug($data['property_type_name']);

            $property_type = PropertyType::create([
                'name'          => $data['property_type_name'],
                'type_code'     => $data['type_code'],
                'url'           => $url,
                'description'   => $data['description'],
                'status'        => $status
            ]);

            return redirect('/admin/property-type')->with('flash_message_success', 'Property Type Created Successfully!');
        }
        return view('admin.property.add_property_type');
    }

    // View all Property Types
    public function propertyTypes()
    {
        $property_type = PropertyType::orderBy('created_at', 'desc')->get();

        return view('admin.property.property_type', compact('property_type'));
    }

    // Enable Property Type
    public function enablePropertyType($id = null)
    {
        if (!empty($id)) {
            PropertyType::where('id', $id)->update(['status' => 1]);
            return redirect()->back()->with('flash_message_success', 'Property Type Enabled Successfully!');
        }
    }

    // Disable Property Type
    public function disablePropertyType($id = null)
    {
        if (!empty($id)) {
            PropertyType::where('id', $id)->update(['status' => 0]);
            return redirect()->back()->with('flash_message_success', 'Property Type Disabled Successfully!');
        }
    }

}
