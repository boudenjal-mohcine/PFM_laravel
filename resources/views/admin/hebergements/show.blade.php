@extends('admin.layout')
@section('content')
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                            {{ $hbr->hotelvilla." [ ".$hbr->user ." ] " }} 
                        </h5>
                       
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informations</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <button class="profile-edit-btn" name="btnAddMore" ><a href="{{ route('hebergements.edit' , $hbr->id) }}">Modifier</a></button>
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
                                    <label>Hebergement Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $hbr->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $hbr->user }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>De : </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $hbr->begin }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jusqu'à :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $hbr->end }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prix Total d'hébérgement </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $hbr->total_price." DH" }}</p>
                                </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop