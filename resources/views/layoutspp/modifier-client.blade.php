@extends('master')

@section('title' , 'SC Parking | Clients')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Modifier un client</h4>
       
        <form action="/update/{{ $users[0]->id }} " method="POST" class="forms-sample">
          {{ csrf_field() }}
             
          <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" name="name" id="Nom" value="{{ $users[0]->name}}" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="Prénom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="Prénom" value="{{ $users[0]->prenom}}" placeholder="Prénom">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control"name="email" id="email" value="{{$users[0]->email}}" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="ville">Ville</label>
            <input  class="form-control"name="ville" id="ville" value="{{$users[0]->ville}}" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="cin">CIN</label>
            <input  class="form-control" name="cin" id="cin" value="{{$users[0]->cin}}" placeholder="Cin">
          </div>
          <div class="form-group">
            <label for="téléphone">Téléphone</label>
            <input  class="form-control" name="tel" id="téléphone" value="{{$users[0]->tel}}" placeholder="Téléphone">
          </div>
         
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection