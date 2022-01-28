@extends('admin.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Ajouter un nouveau hotel</h2>
      <div class="card my-5">
        <form class="card-body cardbody-color p-lg-5" action="{{ route('hotels.store') }} " method="POST" enctype="multipart/form-data">
         @csrf

          <div class="mb-3">
            <label>Titre d'hotel</label>
            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Entrer titre d'hotel" value="{{ old('title') }}">
            <span class="text-danger">@error('title'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Prix d'hotel</label>
            <input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="Entrer prix d'hotel" value="{{ old('price') }}">
            <span class="text-danger">@error('price'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Description</label>
            <textarea type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="Décrire l'hotel" value="{{ old('description') }}"></textarea>
            <span class="text-danger">@error('description'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Localisation</label>
            <input type="text" class="form-control" name="location" aria-describedby="emailHelp" placeholder="Localisation de l'hotel" value="{{ old('location') }}">
            <span class="text-danger">@error('location'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Nombre des étoiles</label>
            <input type="hidden" name="star" value="" id="note"/>
  <img src="{{ asset('/img/etoile_img/design/star_out.gif') }}" id="clear_stars">
  <img src="{{ asset('/img/etoile_img/design/star_clear.gif') }}" id="star_1" class="star"/>
  <img src="{{ asset('/img/etoile_img/design/star_clear.gif') }}" id="star_2" class="star"/>
  <img src="{{ asset('/img/etoile_img/design/star_clear.gif') }}" id="star_3" class="star"/>
  <img src="{{ asset('/img/etoile_img/design/star_clear.gif') }}" id="star_4" class="star"/>
  <img src="{{ asset('/img/etoile_img/design/star_clear.gif') }}" id="star_5" class="star"/>
            <span class="text-danger">@error('star'){{ $message }}@enderror</span>
          </div>

          <div class="mb-3">
            <label>Photo d'hotel</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
          </div>
          <div class="btn-group btn-group-justified">
            <button type="submit" class="btn btn-danger">Enregistrer</button>
            <a class="btn btn-primary" href="{{ route('hotels.index') }}">Retour</a>
        </div>
          </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('js/hotel/etoiles.js') }}"></script>
@stop