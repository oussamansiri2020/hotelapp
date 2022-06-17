<?php

namespace App\Http\Controllers\admin;

use App\Model\SpaBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;


class SpaBookingController extends AdminController
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $spa_bookings = SpaBooking::all();
        return view('admin.spa_booking.view')
            ->with('spa_bookings', $spa_bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $spa_booking = SpaBooking::find($id);
        return view('admin.spa_booking.edit')->with('spa_booking', $spa_booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $spa_booking = SpaBooking::findOrFail($id);

        $rules = [
            'status' => 'boolean',
            'payment' => 'boolean'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $spa_booking->status = $request->input('status');
        $spa_booking->payment = $request->input('payment');
        $spa_booking->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The spa Booking has been updated successfully.');
        return redirect('/admin/spa_booking');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
