@extends('admin.layout')
@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">
        <div>
            <img class="img-profile rounded-circle" src="{{ Storage::url($hotel->image) }}" width="200px" style="float: right;">
            <h2>Modifier les informations de l'hotel : {{$hotel->title}}</h2>
        </div>
    </div>

 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row">
      <div class="col-md-8 offset-md-3">
        <div class="card my-5">
          <form class="card-body cardbody-color p-lg-5" action="{{ route('hotels.update',$hotel->id) }} " method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
  
            <div class="mb-3">
              <label>Titre d'hotel</label>
              <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Entrer titre d'hotel" value="{{ $hotel->title }}">
              <span class="text-danger">@error('title'){{ $message }}@enderror</span>
            </div>
  
            <div class="mb-3">
              <label>Prix d'hotel</label>
              <input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="Entrer prix d'hotel" value="{{ $hotel->price }}">
              <span class="text-danger">@error('price'){{ $message }}@enderror</span>
            </div>
  
            <div class="mb-3">
              <label>Description</label>
              <textarea type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="Decrire l'hotel">{{ $hotel->description }}</textarea>
              <span class="text-danger">@error('description'){{ $message }}@enderror</span>
            </div>
  
            <div class="mb-3">
              <label>Localisation</label>
              <input type="text" class="form-control" name="location" aria-describedby="emailHelp" placeholder="Decrire l'hotel" value="{{ $hotel->location }}">
              <span class="text-danger">@error('location'){{ $message }}@enderror</span>
            </div>
  
            <div class="mb-3">
              <label>Nombre des étoiles</label>
              <input type="hidden" name="star" value="{{ $hotel->star }}" id="note"/>
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
              <input type="file" class="form-control" name="image" value="{{ $hotel->image }}">
              <span class="text-danger">@error('image'){{ $message }}@enderror</span>
            </div>
            <div class="btn-group btn-group-justified">
                    <button type="submit" class="btn btn-danger">Enregistrer</button>
                    <a class="btn btn-primary" href="{{ route('hotels.index') }}">Retour</a>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript" src="{{ asset('js/hotel/etoiles.js') }}"></script>
@stop