@extends('master')

@section('title' , 'SC Parking | Clients')



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
        <h4  >Ajouter un nouveau client</h4>
       
        <form action='ajouterclient' method='POST'class="forms-sample">
          @csrf
          <div class="form-group">  
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="Nom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="Prénom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="Prénom" placeholder="Prénom">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
          </div>  
          <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville">
          </div>
          <div class="form-group">
            <label for="cin">CIN</label>
            <input type="text" class="form-control" name="cin" id="cin" placeholder="Cin">
          </div>
          <div class="form-group">
            <label for="téléphone">Téléphone</label>
            <input type="text" class="form-control" name="tel" id="téléphone" placeholder="Téléphone">
          </div>
        
         
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection