@extends('admin.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Ajouter une nouvelle hebergement</h2>
      <div class="card my-5">
        <form class="card-body cardbody-color p-lg-5" action="{{ route('hebergements.store') }} " method="POST" enctype="multipart/form-data">
         @csrf

          <div class="mb-3">
            <label>Hotel/Villa</label>
            <select name="hotelvilla" class="form-control">
              @foreach ($hotels as $hotel)
              <option value="{{ $hotel->title." (hotel)" }}">{{ $hotel->title." (hotel)" }}</option>
              @endforeach
              @foreach ($villas as $villa)
              <option value="{{ $villa->title ." (villa)" }}">{{ $villa->title." (villa)" }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label>Utilisateur</label>
            <select name="user" class="form-control">
              @foreach ($users as $user)
              @if ($user->role!='admin')
              <option value="{{ $user->email."  ( id = ".$user->id." )" }}">{{ $user->prenom."  ".$user->nom."( ".$user->email." )" }}</option>
              @endif
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label>Date Debut d'hébérgement</label>
            <input type="date" class="form-control" name="begin" aria-describedby="emailHelp" placeholder="Entrer prix d'hotel" value="{{ old('begin') }}">
            <span class="text-danger">@error('begin'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Date Fin d'hébérgement</label>
            <input type="date" class="form-control" name="end" aria-describedby="emailHelp" placeholder="Entrer prix d'hotel" value="{{ old('end') }}">
            <span class="text-danger">@error('end'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Prix Totale</label>
            <input type="text" class="form-control" name="total_price" aria-describedby="emailHelp" placeholder="Entrer prix d'hotel" value="{{ old('total_price') }}">
            <span class="text-danger">@error('total_price'){{ $message }}@enderror</span>
          </div>

          <div class="btn-group btn-group-justified">
            <button type="submit" class="btn btn-danger">Enregistrer</button>
            <a class="btn btn-primary" href="{{ route('hebergements.index') }}">Retour</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop