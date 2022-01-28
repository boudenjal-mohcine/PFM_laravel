<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\View;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $villas = Villa::latest()->paginate(5);
        return view('admin.villas.index',compact('villas'),$data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('admin.villas.create',$data);
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
        $villa = new Villa;
        $villa->title = $request->title;
        $villa->description = $request->description;
        $villa->price = $request->price;
        $villa->location = $request->location;
        $villa->star = $request->star;
        $villa->image = $image;
        $villa->save();

        return redirect()->route('villas.show',$villa->id)->with('success','Villa created successfully.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $villa=Villa::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view("admin.villas.show",compact('villa'),$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $villa=Villa::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('admin.villas.edit',compact('villa'),$data);
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

        $villa = Villa::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            ]);
            $path = $request->file('image')->store('public/uploads/villas');
            $villa->image = $path;
        }


        $villa->title = $request->title;
        $villa->description = $request->description;
        $villa->location = $request->location;
        $villa->star = $request->star;
        $villa->price = $request->price;
        $villa->save();
    
        return redirect()->route('villas.show',$villa->id)->with('success','Villa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $villa = Villa::find($id);
        $villa->delete();
        return redirect('admin/villas')->with('success', 'Villa removed.');
    }
}
