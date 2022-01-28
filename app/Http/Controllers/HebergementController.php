<?php

namespace App\Http\Controllers;
use App\Models\Hebergement;
use App\Models\User;
use App\Models\Villa;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $hebergements = Hebergement::latest()->paginate(5);

        return view('admin.hebergements.index',compact('hebergements'),$data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $hotels = Hotel::all();
        $villas = Villa::all();
        $users = User::all();

        return view('admin.hebergements.create',compact('hotels','villas','users'),$data);
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
            'begin' => ['required','date'],
            'end' => 'required|date',
            'user' => 'required',
            'hotelvilla' => 'required|not_in:0',
            'total_price' => 'required',
        ]);


        
        $hbr = new Hebergement;
        $hbr->hotelvilla = $request->hotelvilla;
        $hbr->begin = $request->begin;
        $hbr->end = $request->end;
        $hbr->user = $request->user;
        $hbr->total_price = $request->total_price;
        $hbr->save();

     
        return redirect()->route('hebergements.index')->with('success','Hebergement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hbr=Hebergement::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view("admin.hebergements.show",compact('hbr'),$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hbr=Hebergement::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $hotels = Hotel::all();
        $villas = Villa::all();
        $users = User::all();
        return view('admin.hebergements.edit',compact('hotels','villas','users','hbr'),$data);
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
            'begin' => 'required',
            'end' => 'required',
            'hotelvilla' => 'required|not_in:0',
        ]);

        $hbr = Hebergement::find($id);


        $hbr->begin = $request->begin;
        $hbr->end = $request->end;
        $hbr->total_price = $request->total_price;
        $hbr->user = $request->user;
        $hbr->hotelvilla = $request->hotelvilla;
        $hbr->save();
    
        return redirect()->route('hebergements.index')->with('success','Hebergement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hbr = Hebergement::find($id);
        $hbr->delete();
        return redirect('admin/hebergements')->with('success', 'Hebergement removed.');
    }
}
