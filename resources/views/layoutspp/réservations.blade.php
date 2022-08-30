@extends('master')

@section('title' , 'SC Parking | Réservations')



@section('content')
<div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Filtre</h4> <hr>
      
      <div class="form-group row">
        <div class="col">
          <label for="exampleSelectGender">Client</label>
            <select class="form-control" id="exampleSelectGender">
              <option>salma</option>
              <option>chaimaa</option>
            </select>
      </div>
       
          <div class="col">
            <label for="exampleSelectGender">Ville</label>
              <select class="form-control" id="exampleSelectGender">
                <option>Casablanca</option>
                <option>Rabat</option>
              </select>
        </div>
        <div class="col">
          <label for="exampleSelectGender">Parking</label>
            <select class="form-control" id="exampleSelectGender">
              <option>sidi maarouf</option>
              <option>Rabat agdal</option>
            </select>
      </div>
        
        <div class="col">
          <label>Prix</label>
          <div id="the-basics">
            <input class="typeahead" type="text" >
          </div>
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

  
<<<<<<< HEAD
  <a href="=export-excel-reservation" ><button type="button" class="btn btn-primary btn-rounded btn-fw">Exporter le fichier csv </button> </a>
  <a href="ajouterrésevation" ><button type="button" class="btn btn-primary btn-rounded btn-fw" >Ajouter une réservation</button> </a>
=======
  <button type="button" class="btn btn-primary btn-rounded btn-fw">Exporter le fichier csv </button>
  {{-- <a href="ajouterrésevation" ><button type="button" class="btn btn-primary btn-rounded btn-fw" >Ajouter une réservation</button> </a> --}}
>>>>>>> bd0e803ac486b728889f183e3bb1633589dde05b
  </div>
   <br> <br>  <br>
     @if(Session('message'))
      <div class="alert alert-success"> {{Session('message')}} </div>
      @endif
   <h4> La liste des réservations  : </h4> <br> 
   
<div class="table-responsive">
   
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Client</th>
          <th>Ville</th>
          <th>Emplacement </th>
          
          <th>durée</th>
          <th>Statut</th>
          <th>Etat du place</th>
          <th>immatricule</th>
          <th>prix</th>
          <th>prix payé</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
<<<<<<< HEAD
        @forelse ($reservation as $reserve)
=======
        
        @forelse ($reservations as $r)
>>>>>>> bd0e803ac486b728889f183e3bb1633589dde05b
        <tr>
          
            <td class="py-1">
<<<<<<< HEAD
                
              </td>
              <td>{{ $reserve->ville }}</td>
              <td >{{ $reserve->parking }} </td>
              <td >{{ $reserve->place }} </td>
              <td><label >{{ $reserve->durée }}</label></td>
              <td >{{ $reserve->etat }} </td>
              <td >{{ $reserve->immatricule }} </td>
              <td >{{ $reserve->prix }} </td>
           
              <td> 
               <a href="#" ><img  style="width: 27px;"src="images/more.svg" alt="logo" /></a>&nbsp; &nbsp;  
                <a href="#"><svg height="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg> </a>&nbsp; &nbsp; 
                <a href="#"><svg height = '20 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg></td></a>
            @empty <h1> rien à afficher </h1>
        </tr>
        @endforelse   
=======

              @if ($r->profile_photo_path)

                  
              <img  width="23" height="23" src="/storage/{{ $r->profile_photo_path }}"  class="rounded-circle z-depth-2" alt="100x100" data-holder-rendered="true">
              
              @else
               <svg height ='24'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg> 
               
              @endif
              </td>
              
          <td>{{$r->ville}}</td>
          <td > {{$r->emplacement}}  </td>
         
          <td><label >  {{$r->date_debut}}</label></td>

          @if( $r->statut =='confirmée')
                
          <td><label class="badge badge-success "> Confirmée</label></td>
        
        @else
           
          <td><label class="badge badge-danger"> Annulée</label></td>
        
        @endif
          <td><label >  @if($r->couverte == '1')
            Couverte @else Non couverte   @endif</label></td>
            
          <td> {{$r->immatricule}} </td>
          <td><label >  {{$r->prix}} MAD </label></td>
          <td><label >  {{$r->prix_a_payer}} MAD</label></td>
          <td> 
            <a href=" {{ route ('reservation_details_admin', ['id'=>$r->id ] ) }} " ><img  style="width: 27px;"src="images/more.svg" alt="logo" /></a>&nbsp; &nbsp;  
            
           
            <a href="{{route('delete_reservation' , ['id'=>$r->id ])}}"><svg height = '20 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg></a>
            
            </tr>
        @empty <h1> rien à afficher </h1>
      </tr>
      
      @endforelse
   
>>>>>>> bd0e803ac486b728889f183e3bb1633589dde05b
      </tbody>
    </table>
  </div>
  <div style="margin-left: 40px ; ">
    {!! $reservations->links() !!} 
    </div>
</div>
</div>
</div>

@endsection