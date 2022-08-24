@extends('master')

@section('title' , 'SC Parking | Parkings') 



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        @if($errors->any())
        <div class='alert alert-danger'>
          @foreach ($errors->all() as $error)
          <div> {{$error}} </div>
              
          @endforeach 
        <h4  >Ajouter un nouveau parking </h4>  
           @endif
           <form action='ajouterparking' method='POST' enctype="multipart/form-data"  class="forms-sample">
          @csrf
          <div class="form-group">    
            <label for="Ville">Ville</label>
            <input type="text" class="form-control" name="ville" id="Ville" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="Emplacement">Emplacement</label>
            <input type="text" class="form-control"  name="emplacement" id="Emplacement" placeholder="Emplacement">
          </div>
          <div class="form-group">
            <label for="Numéro de téléphone">Numéro de téléphone</label>
            <input type="text" class="form-control" name="tel" id="Numéro de téléphone" placeholder="Numéro de téléphone">
          </div>
           <div class="form-group" >
            <label>Image</label>
            <input type="file" class="form-control" name="image" class="file-upload-default">
            
          </div>
          
          <div class="form-group">
            <label for="Nombre de place">Nombre de place couverte voiture</label>
            <input type="number" class="form-control" name="nb_p_c_voiture"id="Nombre de place" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place non couverte voiture</label>
            <input type="number" class="form-control" name="nb_p_nc_voiture" id="Nombre de place" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place couverte moto</label>
            <input type="number" class="form-control" name="nb_p_c_moto" id="Nombre de place" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place non couverte moto</label>
            <input type="number" class="form-control" name="nb_p_nc_moto" id="Nombre de place" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Prix/heure">Prix par heure</label>
            <input type="number" class="form-control" name="prix_heure" id="Prix/heure" placeholder="Prix/heure">
          </div>
          <div class="form-group">
            <label for="Prix/jour">Prix par jour</label>
            <input type="number" class="form-control" name="prix_jour" id="Prix/jour" placeholder="Prix/jour">
          </div>
          <div class="form-group">
            <label for="Prix/mois">Prix par mois</label>
            <input type="number" class="form-control" name="prix_mois" id="Prix/mois" placeholder="Prix/mois">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" style="width:100% ;height: 150px" name="description" class="form-control form-control-lg" placeholder="Description" >
          </div>
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection