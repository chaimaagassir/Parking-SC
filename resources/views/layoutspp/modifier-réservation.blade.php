@extends('master')

@section('title' , 'SC Parking | Réservations')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Modifier une  réservation </h4>
       
        <form class="forms-sample">
          <div class="form-group">
            <label for="Nom">Client</label>
            <select class="form-control" id="exampleSelectGender">
          </div>
          <div class="form-group">
            <label for="Prénom">ville</label>
            <select class="form-control" id="exampleSelectGender">
              
            </select>
          </div>
          <div class="form-group">
            <label for="Prénom">Parking</label>
            <select class="form-control" id="exampleSelectGender">
              
            </select>
          </div>
          
          <div class="form-group">
            <label for="Prénom">Place</label>
            <select class="form-control" id="exampleSelectGender">
              
            </select>
          </div>
          <div class="form-group">
            <label for="cin">date début</label>
            <input type="date" class="form-control" id="cin" placeholder="Cin">
          </div>
          <div class="form-group">
            <label for="téléphone">date fin</label>
            <input type="date" class="form-control" id="téléphone" placeholder="Téléphone">
          </div>
          <div class="form-group">
            <label for="cin">heure début</label>
            <input type="time" class="form-control" id="cin" placeholder="Cin">
          </div>
          <div class="form-group">
            <label for="téléphone">heure fin</label>
            <input type="time" class="form-control" id="téléphone" placeholder="Téléphone">
          </div>
         
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection