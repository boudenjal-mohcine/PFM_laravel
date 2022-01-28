<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\View;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $hotels = Hotel::latest()->paginate(5);
        return view('admin.hotels.index',compact('hotels'),$data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('admin.hotels.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:40'],
            'description' => ['required','max:1000'],
            'price' => 'required',
            'location' => ['required','max:100'],
            'star' => 'required',
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $image = $request->file('image')->store('public/uploads/hotels');
        $htl = new Hotel;
        $htl->title = $request->title;
        $htl->description = $request->description;
        $htl->price = $request->price;
        $htl->location = $request->location;
        $htl->star = $request->star;
        $htl->image = $image;
        $htl->save();

        return redirect()->route('hotels.show',$htl->id)->with('success','Hotel created successfully.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel=Hotel::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view("admin.hotels.show",compact('hotel'),$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel=Hotel::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('admin.hotels.edit',compact('hotel'),$data);
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'star' => 'required',
            'price' => 'required',
        ]);

        $htl = Hotel::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            ]);
            $path = $request->file('image')->store('public/uploads/hotels');
            $htl->image = $path;
        }


        $htl->title = $request->title;
        $htl->description = $request->description;
        $htl->location = $request->location;
        $htl->star = $request->star;
        $htl->price = $request->price;
        $htl->save();
    
        return redirect()->route('hotels.show',$htl->id)->with('success','Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect('admin/hotels')->with('success', 'Hotel removed.');
    }
}
