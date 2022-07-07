@extends('master')

@section('title' , 'SC Parking | Parkings')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Ajouter un nouveau parking </h4>
       
        <form class="forms-sample">
          <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Nom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="Ville">Ville</label>
            <input type="text" class="form-control" id="Ville" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="Numéro de téléphone">Numéro de téléphone</label>
            <input type="email" class="form-control" id="Numéro de téléphone" placeholder="Numéro de téléphone">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place</label>
            <input type="password" class="form-control" id="Nombre de place" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Prix/heure">Prix/heure</label>
            <input type="password" class="form-control" id="Prix/heure" placeholder="Prix/heure">
          </div>
          <div class="form-group">
            <label for="Prix/mois">Prix/mois</label>
            <input type="password" class="form-control" id="Prix/mois" placeholder="Prix/mois">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" style="width:100% ;height: 150px" class="form-control form-control-lg" placeholder="Description" >
          </div>
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection