<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hebergement;
use App\Models\Hotel;
use App\Models\Villa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\returnSelf;


class MainController extends Controller
{
    //methode pour login
    function login(){
        return view('auth.login');
    }

    //methode pur registre
    function register(){
        return view('auth.register');
    }

    //methode pour stocker les infos dans la base des données
    function save(Request $req){
       
 //Validation des champs

        $req->validate([
            'nom' => ['required', 'string', 'max:20'],
            'prenom' => ['required', 'string', 'max:20'],
            'email' => ['required','email','unique:users'],
            'cin' => 'required|min:7|max:20',
            'nationalite' => 'required|not_in:0',
            'password' => ['required', 'string', 'min:5','max:20'],
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);


        $input = $req->all();
        $photo = $req->file('photo')->store('public/uploads/profils');
        $usr = new User;
        $usr->nom = $req->nom;
        $usr->prenom = $req->prenom;
        $usr->cin = $req->cin;
        $usr->nationalite = $req->nationalite;
        $usr->email = $req->email;
        $usr->password = hash::make($req->password);
        $usr->photo = $photo;
        $usr->role = 'user';

        $usr->save();
        
        return redirect('auth/login')->with('success','Profil created successfully.');


    }


function check(Request $req){

  //Validation des champs

  $req->validate([
    'email' => ['required','email'],
    'password' => ['required','min:5','max:20'],
  ]);
    

  //verifier l'existance:
    $userinfo = User::where('email','=',$req->email)->first();

    if(!$userinfo){
        return back()->with('fail','Email n\'existe pas dans la base de données');
    }else{
        if(hash::check($req->password,$userinfo->password)&&$userinfo->role=='user'){
            $req->session()->put('LoggedUser',$userinfo->id);
            return redirect('user/dashboard');
        }else if(hash::check($req->password,$userinfo->password)&&$userinfo->role=='admin'){
            $req->session()->put('LoggedUser',$userinfo->id);
            return redirect('admin/dashboard');
        }else{
            return back()->with('fail','Mot de passe est incorrecte');
        }
    }
  }

  function userdashboard(){
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    return view('user.dashboard',$data);
  }

  function welcome(){
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    return view('welcome',$data);
  }

  function profile(){
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    return view('user.profile',$data);
  }
  
  function logout(){
      if(session()->has('LoggedUser')){
          session()->pull('LoggedUser');
          return redirect('/auth/login');
      }

  }


  function hotelslist(){
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    $hotels = Hotel::all();
    return view('user.hotelslist',compact('hotels'),$data);
}


function villaslist(){
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    $villas = Villa::all();
    return view('user.villaslist',compact('villas'),$data);
}


  function admindashboard(){
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    $users = User::all();
    $hotels = Hotel::all();
    $villas = Villa::all();
    $hebergements = Hebergement::all();
    return view('admin.dashboard',$data,compact('users','hotels','villas','hebergements'));
   
}

public function villashow($id)
{
    $villa=Villa::find($id);
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    return view("user.villashow",compact('villa'),$data);
}

public function hotelshow($id)
{
    $hotel=Hotel::find($id);
    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
    return view("user.hotelshow",compact('hotel'),$data);
}




}
