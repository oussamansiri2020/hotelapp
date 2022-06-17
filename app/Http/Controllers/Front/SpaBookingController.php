<?php

namespace App\Http\Controllers\Front;


use App\Model\Spa;
use App\Model\SpaBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SpaBookingController extends FrontController
{
    //
    public function book(Request $request, $spa_type_id)
    {
        //check here if the user is authenticated
        if (!Auth::check()) {
            return Redirect::to("/login");
        }

        // $rules = [ 
        //     'arrival_date' => 'required|date|date_format:d/m/Y|after_or_equal:today'
           
        // ];

        $spa_type = Spa::findOrFail($spa_type_id);
        $new_arrival_date = $request->input('arrival_date');
        //$new_departure_date = $request->input('departure_date');
        // $rules['booking_validation'] = [new SpaAvailableRule($spa_type, $new_arrival_date)];

        // $validator = Validator::make($request->all(), $rules);
        // if($validator->fails()){
        //     return redirect()->back()
        //         ->withInput($request->all())
        //         ->withErrors($validator);
      

        $spa_booking = new SpaBooking();
        $user = Auth::user();

        $spa_booking->arrival_date = $request->input('arrival_date');
        /**
         * Find total cost by counting number of days and multiplying it with cost of rooms.
         */
        $startTime = Carbon::parse($spa_booking->arrival_date);
        // $finishTime = Carbon::parse($room_booking->departure_date);
        // $no_of_days = $finishTime->diffInDays($startTime) ? $finishTime->diffInDays($startTime) : 1;
        // $room_booking->room_cost = $no_of_days * $room_type->finalPrice;
        $spa_booking->user_id = $user->id;
        /**
         * Select random room for booking of given room type
         */

        //$booking = new Booking($spa_type, $new_arrival_date);
        //dd($booking->available_room_number());
        //$spa_booking->room_id = $booking->available_room_number();
        $spa_booking->spa_id=$spa_type->id;
        $spa_booking->cost=$spa_type->cost;
        $spa_booking->user_id = $user->id;
        $spa_booking->save();

        // $this->send_email(Auth::user()->email);

        Session::flash('flash_title', "Success");
        Session::flash('flash_message', "Spa has been Booked.");
        return redirect('/dashboard/spa/booking');

    }

    private function send_email($email){
        if(empty($email)){
            $email = Auth::user()->email;
        }
        Mail::to($email)->send(new RoomBooked());
    }
}
