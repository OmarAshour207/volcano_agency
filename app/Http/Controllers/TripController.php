<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BookingOrder;
use App\Models\ContactNotification;
use App\Models\Service;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function showAll()
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $trips = Trip::orderBy('id', 'desc')->paginate(12);

        return view('site.first.trip_search_result',
                    compact('trips', 'services',
                                    'aboutUs'));
    }

    public function showSearchTrips(Request $request)
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $flights = Trip::where('ar_start', 'like', "%$request->start%")->orWhere('en_start', 'like', "%$request->start%")
            ->where('ar_destination', 'like', "%$request->destination%")->orWhere('en_destination', 'like', "%$request->destination%")
            ->where('start_at', Carbon::parse($request->take_off)->format('Y-m-d'))
            ->whereBetween('price', [$request->price_from, $request->price_to])
            ->paginate(8);
        return view('site.first.trip_search_result',
                        compact('flights', 'services',
                                        'aboutUs'));
    }

    public function showTrip(Request $request)
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $trip = Trip::findOrFail($request->id);

        return view('site.first.single_trip',
                        compact('trip', 'services',
                                        'aboutUs'));
    }

    public function bookTrip(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'email'         => 'sometimes|nullable|email',
            'phone'         => 'required|string|min:10:max:12',
            'address'       => 'sometimes|nullable|string',
        ]);
        $data['type'] = 'Trip';

        $info = BookingOrder::create($data);

//        echo "<a href='.route('flights.edit', $request->flight_id).'></a>";
        ContactNotification::create([
            'name'      => $info->name,
            'content'   => __('admin.book_trip'),
        ]);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
