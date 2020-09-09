<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.trips.index', compact('trips'));
    }

    public function create()
    {
        return view('dashboard.trips.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_title'          => 'required|string',
            'en_title'          => 'required|string',
            'ar_description'    => 'required|string',
            'en_description'    => 'required|string',
            'ar_start'          => 'required|string',
            'en_start'          => 'required|string',
            'ar_destination'    => 'required|string',
            'en_destination'    => 'required|string',
            'start_at'          => 'required|date',
            'start_at_time'     => 'required',
            'end_at'            => 'required|date',
            'end_at_time'       => 'required',
            'price'             => 'required|numeric',
            'image'             => 'sometimes|nullable|string'
        ]);
        $data['image']  = $request->image;

        Trip::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('trips.index');
    }

    public function edit(Trip $trip)
    {
        return view('dashboard.trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $data = $request->validate([
            'ar_title'          => 'required|string',
            'en_title'          => 'required|string',
            'ar_description'    => 'required|string',
            'en_description'    => 'required|string',
            'ar_start'          => 'required|string',
            'en_start'          => 'required|string',
            'ar_destination'    => 'required|string',
            'en_destination'    => 'required|string',
            'start_at'          => 'required|date',
            'start_at_time'     => 'required',
            'end_at'            => 'required|date',
            'end_at_time'       => 'required',
            'price'             => 'required|numeric',
            'image'             => 'sometimes|nullable|string'
        ]);
        $data['image']  = $request->image;

        $trip->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('trips.index');

    }

    public function destroy(Trip $trip)
    {
        if ($trip->image != null) {
            Storage::disk('local')->delete('public/trips/' . $trip->image);
        }
        $trip->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('trips.index');
    }
}
