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
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="Code">Code</label>
            <input type="text" class="form-control" name="Code" id="Code" placeholder="code">
          </div>
          <div class="form-group">
            <label for="Pourcentage">Pourcentage</label>
            <input type="text" class="form-control" name="Pourcentage" id="Pourcentage" placeholder="Pourcentage">
          </div>
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection