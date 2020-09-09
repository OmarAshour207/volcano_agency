<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BookingOrder;
use App\Models\ContactNotification;
use App\Models\Hotel;
use App\Models\HotelOffer;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function showAll()
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $offers = HotelOffer::with('hotel')->orderBy('id', 'desc')->paginate(12);
        $hotels = Hotel::orderBy('id', 'desc')->get();

        return view('site.first.hotel_search_result',
            compact('offers', 'services',
                            'aboutUs', 'hotels'));
    }

    public function showSearchHotels(Request $request)
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $hotels = Hotel::select('ar_name', 'en_name')->orderBy('id', 'desc')->get();

        $offers = HotelOffer::with('hotel')
            ->whereHas('hotel', function ($q) use ($request) {
            return $q->where('id', "%$request->hotel_id%");
        })->where('check_in', Carbon::parse($request->check_in)->format('Y-m-d'))
            ->where('check_out', Carbon::parse($request->check_out)->format('Y-m-d'))
            ->where('adults', $request->adults)
            ->whereBetween('price', [$request->price_from, $request->price_to])
            ->paginate(12);

        return view('site.first.hotel_search_result',
            compact('offers', 'services',
                            'aboutUs', 'hotels'));
    }

    public function showOffer(Request $request)
    {
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $aboutUs = About::first();
        $offer = HotelOffer::with('hotel')->findOrFail($request->route('id'));
//        dd($offer);

        return view('site.first.single_offer',
                    compact('offer', 'services',
                                    'aboutUs'));
    }

    public function bookHotel(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'email'         => 'sometimes|nullable|email',
            'phone'         => 'required|string|min:10:max:12',
            'address'       => 'sometimes|nullable|string',
        ]);
        $data['type'] = 'Hotel';

        $info = BookingOrder::create($data);

//        echo "<a href='.route('flights.edit', $request->flight_id).'></a>";
        ContactNotification::create([
            'name'      => $info->name,
            'content'   => __('admin.book_hotel'),
        ]);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
