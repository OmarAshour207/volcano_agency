<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.flights.index', compact('flights'));
    }

    public function create()
    {
        return view('dashboard.flights.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_start'          => 'required|string',
            'en_start'          => 'required|string',
            'ar_destination'    => 'required|string',
            'en_destination'    => 'required|string',
            'price'             => 'required|numeric',
            'status'            => 'required|numeric',
            'take_off'          => 'required|date',
            'landing'           => 'required|date|after:take_off',
            'take_off_time'     => 'required',
            'landing_time'      => 'required',
            'adults'            => 'sometimes|nullable|numeric'
        ]);
        $data['image']  = $request->image;

        Flight::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('flights.index');
    }

    public function edit(Flight $flight)
    {
        return view('dashboard.flights.edit', compact('flight'));
    }

    public function update(Request $request, Flight $flight)
    {
        $data = $request->validate([
            'ar_start'          => 'required|string',
            'en_start'          => 'required|string',
            'ar_destination'    => 'required|string',
            'en_destination'    => 'required|string',
            'price'             => 'required|numeric',
            'status'            => 'required|numeric',
            'take_off'          => 'required|date',
            'landing'           => 'required|date|after:take_off',
            'take_off_time'     => 'required',
            'landing_time'      => 'required',
            'adults'            => 'required|numeric'
        ]);
        $data['image']  = $request->image;

        $flight->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('flights.index');
    }

    public function destroy(Flight $flight)
    {
        if ($flight->image != null) {
            Storage::disk('local')->delete('public/flights/' . $flight->image);
        }
        $flight->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('flights.index');
    }
}
