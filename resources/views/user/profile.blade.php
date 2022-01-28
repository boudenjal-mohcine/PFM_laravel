@extends('user.layoutuser')
@section('content')
<br><br>
<div class="container text-light bg-dark emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="{{ Storage::url($LoggedUserInfo->photo) }}" width="200px">
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                            {{ $LoggedUserInfo->prenom." ".$LoggedUserInfo->nom."  (".$LoggedUserInfo->role.")" }} 
                        </h5>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            @if($LoggedUserInfo->role=='admin')
            <button class="btn btn-dark" name="btnAddMore" ><a href="{{ route('userslist.edit' , $LoggedUserInfo->id) }}">Edit Profile</a></button>
            @endif
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
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $LoggedUserInfo->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $LoggedUserInfo->nom }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prenom</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $LoggedUserInfo->prenom }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $LoggedUserInfo->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nationalité</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $LoggedUserInfo->nationalite }}</p>
                                </div>
                            </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop