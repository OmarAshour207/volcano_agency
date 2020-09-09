<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingOrder;


class BookingOrderController extends Controller
{
    public function index()
    {
        $booking_orders = BookingOrder::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.booking_orders.index', compact('booking_orders'));
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->route('id');
            $booking_order = BookingOrder::findOrFail($id);
            $val = $booking_order->status == 0 ? 1 : 0;
//            dd($val);
            $booking_order->update(['status' => $val]);
            return response([
                'status'    => true,
                'message'   => __('admin.updated_successfully')
            ]);
        }
    }

    public function create()
    {
        return view('dashboard.booking_orders.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data = $request->validate([
            'name'          => 'required|string',
            'phone'         => 'required|string|min:10:max:12',
            'email'         => 'sometimes|nullable|string|email',
            'address'       => 'required|string',
            'type'          => 'required|string',
            'status'        => 'required|numeric'
        ]);

        BookingOrder::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('booking-orders.index');
    }

    public function edit(BookingOrder $booking_order)
    {
        return view('dashboard.booking_orders.edit', compact('booking_order'));
    }

    public function update(Request $request, BookingOrder $bookingOrder)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'phone'         => 'required|string|min:10:max:12',
            'email'         => 'sometimes|nullable|string|email',
            'address'       => 'required|string',
            'type'          => 'required|string'
        ]);

        $bookingOrder->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('booking-orders.index');
    }

    public function destroy(BookingOrder $bookingOrder)
    {
        $bookingOrder->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('booking-orders.index');
    }

}
