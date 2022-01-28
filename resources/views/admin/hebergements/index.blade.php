@extends('admin.layout')
@section('content')
<h1 align="center">Liste des Hébérgements</h1><br><br>
<table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">hotel/villa</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Début d'hébérgement</th>
        <th scope="col">Fin d'hébérgement</th>
        <th scope="col">Prix total</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($hebergements as $hebergement)
      <tr>
            <th scope="row">{{ $hebergement->id }}</th>
            <td>{{ $hebergement->hotelvilla }}</td>
            <td>{{ $hebergement->user }}</td>
            <td>{{ $hebergement->begin }}</td>
            <td>{{ $hebergement->end }}</td>  
            <td>{{ $hebergement->total_price }}</td>
            <td>
            <form action="{{ route('hebergements.destroy', $hebergement->id) }}" method="POST">
                <button type="button" class="btn btn-outline-primary btn-sm px-2">
                  <a href="{{ route('hebergements.edit' , $hebergement->id) }}">Edit</a> 
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm px-2">
                   <a href="{{ route('hebergements.show' , $hebergement->id) }}">Show</a> 
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