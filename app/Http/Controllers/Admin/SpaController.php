<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Spa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Illuminate\Support\Facades\Session;
class SpaController extends AdminController
{
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
        $spa_types = DB::table('spas')->get();
        return view('admin.spa_type.view')->with('spa_types', $spa_types);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.spa_type.add');
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
        $rules = [
            'name' => 'required|max:50|unique:spas,name',
            'cost' => 'required|numeric|min:0',
            'duration' => 'numeric|min:0',
            'discount_percentage' => 'integer|between:0,100',
            'description' => 'max:800',
            'image' => 'required|mimes:jpeg, jpg, png',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $spa_type = new Spa();
        $spa_type->name = $request->input('name');
        $spa_type->cost = $request->input('cost');
        $spa_type->duration = $request->input('duration');
        $spa_type->discount_percentage = $request->input('discount_percentage');
        $spa_type->description = $request->input('description');
        
        $spa_type->status = $request->input('status');
        if ($request->hasFile('image')) {
            // $path = $request->file('image')->store('', 'event');
            // $event_image = ImageManager::make('storage/events/' . $path);
            // $event_image->fit(500, 450);
            // $event_image->save(storage_path() . '/app/public/events/' . $path);
            // $event->image = $path;
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('storage/spa/'), $filename);
            $spa_type->image = $filename;
        }
        $spa_type->save();

       
        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The spa_type has been added successfully');
        return redirect('admin/spa_type');
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
        $spa_type = Spa::find($id);
        return view('admin.spa_type.edit')->with([
            'spa_type' => $spa_type,
        ]);
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
        $spa_type = Spa::find($id);

        $rules = [
            'name' => 'required|max:50',
            'cost' => 'required|numeric|min:0',
            'duration' => 'numeric|min:0',
            'discount_percentage' => 'integer|between:0,100',
            'description' => 'max:800',
            'status' => 'required|boolean'
        ];


        

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $spa_type->name = $request->input('name');
        $spa_type->cost = $request->input('cost');
        $spa_type->duration = $request->input('duration');
        $spa_type->discount_percentage = $request->input('discount_percentage');
        $spa_type->description = $request->input('description');
        
        $spa_type->status = $request->input('status');
        if ($request->hasFile('image')) {
            // $path = $request->file('image')->store('', 'event');
            // $event_image = ImageManager::make('storage/events/' . $path);
            // $event_image->fit(500, 450);
            // $event_image->save(storage_path() . '/app/public/events/' . $path);
            // $event->image = $path;
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('storage/spa/'), $filename);
            $spa_type->image = $filename;
        }
        $spa_type->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The event has been updated successfully');
        return redirect('admin/spa_type');
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
        $spa= Spa::find($id);
        $spa->delete();
     
        return back();
    }
}
