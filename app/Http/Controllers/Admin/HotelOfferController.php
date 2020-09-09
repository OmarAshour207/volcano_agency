<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\HotelOffer;

class HotelOfferController extends Controller
{
    public function index()
    {
        $offers = HotelOffer::with('hotel')->paginate(10);
        return view('dashboard.hotel_offer.index', compact('offers'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('dashboard.hotel_offer.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hotel_id'      => 'required|numeric',
            'price'         => 'required|string',
            'check_in'      => 'required|date',
            'check_out'     => 'required|date|after:check_in',
            'rooms'         => 'required|numeric|min:1',
            'adults'        => 'sometimes|nullable|',
            'kids'          => 'sometimes|nullable|numeric',
        ]);

        HotelOffer::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('offers.index');
    }

    public function edit(HotelOffer $offer)
    {
        $hotels = Hotel::all();
        return view('dashboard.hotel_offer.edit', compact('offer', 'hotels'));
    }

    public function update(Request $request, HotelOffer $offer)
    {
        $data = $request->validate([
            'hotel_id'      => 'required|numeric',
            'price'         => 'required|string',
            'check_in'      => 'required|date',
            'check_out'     => 'required|date|after:check_in',
            'rooms'         => 'required|numeric|min:1',
            'adults'        => 'sometimes|nullable|',
            'kids'          => 'sometimes|nullable|numeric',
        ]);

        $offer->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('offers.index');
    }

    public function destroy(HotelOffer $offer)
    {
        $offer->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('offers.index');
    }
}
