<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BookingOrder;
use App\Models\ContactNotification;
use App\Models\Flight;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function showAll()
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $flights = Flight::orderBy('id', 'desc')->paginate(12);

        return view('site.first.flight_search_result',
                        compact('flights', 'services',
                                        'aboutUs'));
    }

    public function showSearchFlights(Request $request)
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $flights = Flight::where('ar_start', 'like', "%$request->start%")
            ->orWhere('en_start', 'like', "%$request->start%")
            ->where('ar_destination', 'like', "%$request->destination%")
            ->orWhere('en_destination', 'like', "%$request->destination%")
            ->orWhere('take_off', Carbon::parse($request->take_off)->format('Y-m-d'))
            ->orWhere('landing', Carbon::parse($request->landing)->format('Y-m-d'))
            ->orWhere('adults', $request->adults)
            ->paginate(12);
        return view('site.first.flight_search_result',
            compact('flights', 'services',
                    'aboutUs'));
    }

    public function showFlight(Request $request)
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $flight = Flight::findOrFail($request->id);

        return view('site.first.single_flight',
                    compact('flight', 'services',
                                    'aboutUs'));
    }

    public function bookFlight(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'email'         => 'sometimes|nullable|email',
            'phone'         => 'required|string|min:10:max:12',
            'address'       => 'sometimes|nullable|string',
        ]);
        $data['type'] = 'Flight';

        $info = BookingOrder::create($data);

//        echo "<a href='.route('flights.edit', $request->flight_id).'></a>";
        ContactNotification::create([
            'name'      => $info->name,
            'content'   => __('admin.book_flight'),
        ]);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
