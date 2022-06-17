<?php

namespace App\Http\Controllers\Front;
use App\Model\Spa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpaController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $spa_types = Spa::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        //dd($room_types);

        return view('front.spa_type.index')->with([
            'spa_types' => $spa_types
        ]);
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
        $spa_type = Spa::where('status', true)
            ->findOrFail($id);

          // dd($spa_type);
        //dd($room_type->getAggregatedRating());
        return view('front.spa_type.profile')
            ->with([
                'spa_type' => $spa_type,
            ]);
            
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
