@extends('admin.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Modifier l'hebergement faite par {{ $hbr->user }} du {{ $hbr->hotelvilla }}</h2>
       <div class="card my-5">
         <form  class="card-body cardbody-color p-lg-5" action="{{ route('hebergements.update',$hbr->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')

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
            <input type="hidden" class="form-control" name="user" aria-describedby="emailHelp" value="{{ $hbr->user }}">
          </div>

          <div class="mb-3">
            <label>Date Debut d'hébérgement</label>
            <input type="date" class="form-control" name="begin" aria-describedby="emailHelp" value="{{ $hbr->begin }}">
            <span class="text-danger">@error('begin'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Date Fin d'hébérgement</label>
            <input type="date" class="form-control" name="end" aria-describedby="emailHelp" value="{{ $hbr->end }}">
            <span class="text-danger">@error('end'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Prix Totale</label>
            <input type="text" class="form-control" name="total_price" aria-describedby="emailHelp" placeholder="Entrer prix total d'hebergement" value="{{ $hbr->total_price }}">
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