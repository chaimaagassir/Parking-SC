@extends('master')

@section('title' , 'SC Parking | Parkings')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Modifier un parking </h4>
       
        <form action="/parking_update/{{ $parkings[0]->id }} " method="POST" class="forms-sample">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="Ville">Ville</label>
            <input type="text" class="form-control"  name="ville" id="Ville" value="{{ $parkings[0]->ville}}" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="Emplacement">Emplacement</label>
            <input type="text" class="form-control" name="emplacement" id="Emplacement" value="{{ $parkings[0]->emplacement}}" placeholder="Emplacement">
          </div>
          <div class="form-group" >
            <label>Image</label>
            <img height="150" width="150" src="uploads/parkings/{{ $parkings[0]->image}}">
          </div>
          <div class="form-group" >
            <label>Update image</label>
            <input type="file" name="file">
          </div>
          <div class="form-group">
            <label for="Numéro de téléphone">Numéro de téléphone</label>
            <input type="email" class="form-control" name="numéro_téléphone" id="Numéro de téléphone" value="{{ $parkings[0]->numéro_téléphone}}"  placeholder="Numéro de téléphone">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place couverte voiture</label>
            <input type="number" class="form-control" name="nb_p_c_voiture"id="Nombre de place" value="{{ $parkings[0]->nb_p_c_voiture}}"  placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place non couverte voiture</label>
            <input type="number" class="form-control" name="nb_p_nc_voiture" id="Nombre de place" value="{{ $parkings[0]->nb_p_nc_voiture}}" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place couverte moto</label>
            <input type="number" class="form-control" name="nb_p_c_moto" id="Nombre de place" value="{{ $parkings[0]->nb_p_c_moto}}" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Nombre de place">Nombre de place non couverte moto</label>
            <input type="number" class="form-control" name="nb_p_nc_moto" id="Nombre de place" value="{{ $parkings[0]->nb_p_nc_moto}}" placeholder="Nombre de place">
          </div>
          <div class="form-group">
            <label for="Prix/heure">Prix/heure</label>
            <input type="password" class="form-control" name="prix" id="Prix/heure" value="{{ $parkings[0]->prix}}"  placeholder="Prix/heure">
          </div>
          <div class="form-group">
            <label for="Description">Description</label>
            <input type="text" style="width:100% ;height: 150px" name="description" class="form-control form-control-lg" value="{{ $parkings[0]->description}}"  placeholder="Description">
          </div>
         
         
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection