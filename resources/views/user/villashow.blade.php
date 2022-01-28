@extends('user.layoutuser')
@section('content')
<br><br>
<div class="container text-light bg-dark emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="{{ Storage::url($villa->image) }}" width="275px">
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                            {{ $villa->title }} 
                        </h5>
                        <p class="proile-rating"> Stars : <span> <ul class="list-unstyled d-flex">
                            @for ($i = 0; $i < $villa->star ; $i++)
                             <li class="ms-2"><img class="bi" width="24" height="24" src="{{ asset('/img/etoile_img/star.jpg') }}"/></li>
                            @endfor
                          </ul></span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-dark " name="btnAddMore" ><a href="#">Add to cart</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Villa Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $villa->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $villa->title }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Location</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $villa->location }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $villa->description }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prix / jour </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $villa->price." DH" }}</p>
                                </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop