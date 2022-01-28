@extends('admin.layout')
@section('content')
<div class="container">
  <h1 align="center">liste des villas</h1><br><br>
</div>
@foreach ($villas as $villa)
      <div class="container">
          <div class="col-md-6 offset-md-3">
            <div class="col">
                <div class="card shadow-sm">
                  <img class="bi" width="490" height="300"  alt="img" src="{{ Storage::url($villa->image) }}"/>
                  <div class="card-body">
                        <p class="card"><strong>{{ $villa->title}}</strong> </p> 
                        <p class="card-text">{{ $villa->description }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                           <div class="btn-group">
                            <form action="{{ route('villas.destroy', $villa->id) }}" method="POST">
                              <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a href="{{ route('villas.edit' , $villa->id) }}">Modifier</a> 
                              </button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">
                                 <a href="{{ route('villas.show' , $villa->id) }}">Voir</a> 
                                </button>
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Supprimer
                               </button>
                          </form>
                           </div>
                           <small class="text-muted">{{ $villa->price." DH " }}</small>

                         <ul class="list-unstyled d-flex">
                          @for ($i = 0; $i < $villa->star ; $i++)
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