@extends('master')

@section('title' , 'SC Parking | Places')


@section('content')
{{-- filter form  --}}
<div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Filtre</h4> <hr>
      
      <div class="form-group row">
        <div class="col">
          <form>
          <label>Nom</label>
          <div id="the-basics">
            <input class="typeahead" type="text" >
          </div>
        </div>
       
          <div class="col">
            <label for="exampleSelectGender">Ville</label>
              <select class="form-control" id="exampleSelectGender">
                <option>Male</option>
                <option>Female</option>
              </select>
        </div> <div class="col">
          <label>CIN</label>
          <div id="the-basics">
            <input class="typeahead" type="text" >
          </div>
        </div> 
        <div class="col">
          <label>Nombre de véhicules</label>
          <div id="the-basics">
            <input class="typeahead" type="text" >
          </div>
        </div>
        <div class="col">
          <label for="exampleSelectGender">Etat compte</label>
            <select class="form-control" id="exampleSelectGender">
              <option>Activé</option>
              <option>Désactivé</option>
            </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary btn-rounded btn-fw" style =' position: absolute; right: 40px;'>Filtrer </button> <br>  <br>
    </div>
  </div>
  
</form>
</div>

<br> <br>  <br>
  <div class="card">
    <div class="card-body">
<div style =' position: absolute; right: 20px;'>

  
  <button type="button" class="btn btn-primary btn-rounded btn-fw">Exporter le fichier csv </button>
  {{-- <a href="ajouterplace" ><button type="button" class="btn btn-primary btn-rounded btn-fw" >Ajouter une nouvelle place</button> </a> --}}
  </div>
   <br> <br>  <br>
   <h4> La liste des Places  : </h4> <br> 
   
<div class="table-responsive">
   
    <table class="table table-hover">
      <thead>
        <tr>
          
          <th>id parking</th>
          <th>Type de véhicule</th>
          <th>couverte/non couverte</th>
          <th>état</th>
          <th> Actions </th>
        
          
        
        </tr>
      </thead>
      <tbody>
        @forelse ($places as $p)
        <tr>
           
          <td> {{ $p->id_parking }}</td>
          {{-- condition type de vehicule --}}
          @if($p->typev =='1')
          <td>voiture</td> 
          @else
          <td>moto</td> 
          @endif

          {{-- condition couverte ou pas --}}
          @if($p->couverte =='1')
          <td>couverte</td> 
          @else
          <td>non couverte</td> 
          @endif
          {{-- condition etat --}}   
          @if($p->etat =='1')
          <td><label class="badge badge-success "> réservé</label></td>
          @else
          <td><label class="badge badge-danger"> vide</label></td>
          @endif
         
         
          <td>
          <a href=" {{ route ('placesdetailsadmin', ['parking_id'=>$p->id_parking ] ) }} "><img  style="width: 27px;"src="images/more.svg" alt="logo" /></a>&nbsp; &nbsp;
         
          <a href="{{route('delete_place' , ['id'=>$p->id ])}}"><svg height = '20 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg></a></td>
          @empty <h1> rien à afficher </h1>
        </tr>
        
        @endforelse
       
        
      </tbody>
    </table>
  </div>
  <div style="margin-left: 40px ; ">
    {!! $places->links() !!} 
    </div>
</div>
</div>
</div>

@endsection
