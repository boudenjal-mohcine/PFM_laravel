@extends('admin.layout')
@section('content')
<h1 align="center">Liste des utilisateurs</h1><br><br>
<table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Profil</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nom</th>
        <th scope="col">CIN</th>
        <th scope="col">Email</th>
        <th scope="col">Nationalite</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
            <th scope="row">{{ $user->id }}</th>
            <td><img src="{{ Storage::url($user->photo) }}" width="100px"></td>
            <td>{{ $user->prenom }}</td>
            <td>{{ $user->nom }}</td>
            <td>{{ $user->cin }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nationalite }}</td>
            <th scope="row">{{ $user->role }}</th>
            <td>
            <form action="{{ route('userslist.destroy', $user->id) }}" method="POST">
                <button type="button" class="btn btn-outline-primary btn-sm px-2">
                  <a href="{{ route('userslist.edit' , $user->id) }}">Edit</a> 
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm px-2">
                   <a href="{{ route('userslist.show' , $user->id) }}">Show</a> 
                  </button>
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm px-2">
                  Delete
                 </button>
            </form>
            </td>
      </tr>
        @endforeach
        </tbody>
  </table>  
@stop