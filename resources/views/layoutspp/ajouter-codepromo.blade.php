@extends('master')

@section('title' , 'SC Parking | Codes promos')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        @if($errors->any())
      <div class='alert alert-danger'>
        @foreach ($errors->all() as $error)
        <div> {{$error}} </div>
              
        @endforeach   
      </div>
      @endif
        <h4  >Ajouter un nouveau code promo </h4>
       
        <form action='ajoutercodepromo' method='POST' class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="Occasion">Occasion</label>
            <input type="text" class="form-control" name="Occasion" id="Occasion" placeholder="Occasion">
          </div>
          <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="Code">Code</label>
            <input type="text" class="form-control" name="Code" id="Code" placeholder="code">
          </div>
          <div class="form-group">
            <label for="nb_reserv">People Autorized</label>
            <input type="number" class="form-control" name="nb_reserv" id="nb_reserv" placeholder="nb_reserv">
          </div>
          <div class="form-group">
            <label for="Pourcentage">Pourcentage</label>
            <input type="text" class="form-control" name="Pourcentage" id="Pourcentage" placeholder="Pourcentage">
          </div>
          <div class="form-group">
            <label for="date_expiration">Date d'expiration</label>
            <input type="datetime-local" class="form-control" name="date_expiration" id="date_expiration" placeholder="date_expiration">
          </div>
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection