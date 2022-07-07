@extends('master')

@section('title' , 'SC Parking | Clients')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Modifier un client</h4>
       
        <form class="forms-sample">
          <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Nom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="Prénom">Prénom</label>
            <input type="text" class="form-control" id="Prénom" placeholder="Prénom">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="ville">Ville</label>
            <input type="password" class="form-control" id="ville" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="cin">CIN</label>
            <input type="password" class="form-control" id="cin" placeholder="Cin">
          </div>
          <div class="form-group">
            <label for="téléphone">Téléphone</label>
            <input type="password" class="form-control" id="téléphone" placeholder="Téléphone">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" placeholder="Password">
          </div>
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection