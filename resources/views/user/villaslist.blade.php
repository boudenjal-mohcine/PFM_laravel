@extends('user.layoutuser')
@section('content')
<div class="album py-5 bg-light bg-dark">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($villas as $villa)
        <div class="col">
            <div class="card shadow-sm">
              <img class="bi" width="410" height="250"  src="{{ Storage::url($villa->image) }}"/>
  
              <div class="card-body">
                  <p class="card"><strong>{{ $villa->title }}</strong> </p> 
                  <p class="card-text"> {{ $villa->description }}
                      
                       </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">	<a href="{{ route('user.villashow' , $villa->id) }}" title="view" >VIEW</a></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">save</button>
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
          @endforeach
  </div>
 </div>
</div> 

@endsection