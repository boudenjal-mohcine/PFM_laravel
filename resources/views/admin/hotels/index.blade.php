@extends('admin.layout')
@section('content')
<div class="container">
  <h1 align="center">Nos hotels</h1><br><br>
</div>
@foreach ($hotels as $hotel)
      <div class="container">
          <div class="col-md-6 offset-md-3">
            <div class="col">
                <div class="card shadow-sm">
                  <img class="bi" width="490" height="300"  alt="img" src="{{ Storage::url($hotel->image) }}"/>
                  <div class="card-body">
                        <p class="card"><strong>{{ $hotel->title}}</strong> </p> 
                        <p class="card-text">{{ $hotel->description }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                           <div class="btn-group">
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                              <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a href="{{ route('hotels.edit' , $hotel->id) }}">Modifier</a> 
                              </button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">
                                 <a href="{{ route('hotels.show' , $hotel->id) }}">Voir</a> 
                                </button>
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Supprimer
                               </button>
                          </form>
                           </div>
                           <small class="text-muted">{{ $hotel->price." DH " }}</small>

                         <ul class="list-unstyled d-flex">
                          @for ($i = 0; $i < $hotel->star ; $i++)
                           <li class="ms-2"><img class="bi" width="24" height="24" src="{{ asset('/img/etoile_img/star.jpg') }}"/></li>
                        
                          @endfor
                        </ul>
                       </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
   @endforeach
@stop