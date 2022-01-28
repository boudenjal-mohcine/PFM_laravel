<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $users = User::latest()->paginate(5);
        return view('admin.userslist.index',compact('users'),$data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('admin.userslist.create',$data);
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
            'nom' => ['required', 'string', 'max:20'],
            'prenom' => ['required', 'string', 'max:20'],
            'email' => ['required','email','unique:users'],
            'cin' => 'required|min:7|max:20',
            'nationalite' => 'required|not_in:0',
            'password' => ['required', 'string', 'min:5','max:20'],
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);


        
        $input = $request->all();
        $photo = $request->file('photo')->store('public/uploads/profils');
        $usr = new User;
        $usr->nom = $request->nom;
        $usr->prenom = $request->prenom;
        $usr->cin = $request->cin;
        $usr->nationalite = $request->nationalite;
        $usr->email = $request->email;
        $usr->password = hash::make($request->password);
        $usr->photo = $photo;
        $usr->role = $request->role;;
        $usr->save();

     
        return redirect()->route('userslist.index')->with('success','Profil created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view("admin.userslist.show",compact('user'),$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('admin.userslist.edit',compact('user'),$data);

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
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'nationalite' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        if($request->hasFile('photo')){
            $request->validate([
              'photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            ]);
            $path = $request->file('photo')->store('public/uploads/profils');
            $user->photo = $path;
        }


        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->nationalite = $request->nationalite;
        $user->role = $request->role;
        $user->save();
    
        return redirect()->route('userslist.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->role=='admin'){return back()->with('fail','Vous avez pas la permission pour supprimer un administrateur');}
        $user->delete();
        return redirect('admin/userslist')->with('success', 'User removed.');
    }
}
