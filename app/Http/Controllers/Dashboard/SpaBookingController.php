<?php

namespace App\Http\Controllers\Dashboard;
use App\Model\SpaBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SpaBookingController extends DashboardController
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spa_bookings = SpaBooking::with('spa')
            ->where('user_id', Auth::user()->id)
            ->paginate(10);

        return view('dashboard.booking.spa_booking')->with([
            'spa_bookings' => $spa_bookings
        ]);
    }

    public function cancel($id)
    {
        $event_booking = EventBooking::findOrFail($id);

        // If the payment is already made
        if($event_booking->payment == true){
            return back()->withErrors('Sorry, you cannot cancel booking which has been already paid. Please, contact hotel staff.');
        }
        if($event_booking->status == false){
            return back()->withErrors('Sorry, you cannot cancel booking which is already cancelled. Please, contact hotel staff.');
        }
        $event_booking->status = false;
        $event_booking->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The event booking has been cancelled successfully');
        return redirect('dashboard/event/booking');
    }

}
