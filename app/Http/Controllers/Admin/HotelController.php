<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate(10);
        return view('dashboard.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('dashboard.hotels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name'               => 'required|string',
            'en_name'               => 'required|string',
            'address'               => 'sometimes|nullable|string',
            'ar_description'        => 'required|string|min:10',
            'en_description'        => 'required|string|min:10',
            'stars_number'          => 'sometimes|nullable|numeric',
        ]);
        $data['image'] = $request->image;

        Hotel::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('hotels.index');
    }

    public function edit(Hotel $hotel)
    {
        return view('dashboard.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'ar_name'               => 'required|string',
            'en_name'               => 'required|string',
            'address'               => 'sometimes|nullable|string',
            'ar_description'        => 'required|string|min:10',
            'en_description'        => 'required|string|min:10',
            'stars_number'          => 'sometimes|nullable|numeric',
        ]);
        $data['image'] = $request->image;

        $hotel->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('hotels.index');
    }

    public function destroy(Hotel $hotel)
    {
        if ($hotel->image != null) {
            Storage::disk('local')->delete('public/hotels/' . $hotel->image);
        }
        $hotel->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('hotels.index');
    }
}
