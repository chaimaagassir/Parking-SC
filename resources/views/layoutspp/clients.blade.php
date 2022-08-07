@extends('master')

@section('title' , 'SC Parking | Clients')

@section('content')
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
  <div style =' position: absolute; right: 40px;'>

  
  <button type="button" class="btn btn-primary btn-rounded btn-fw">Exporter le fichier csv </button>
  <a href="ajouterclient" ><button type="button"  class="btn btn-primary btn-rounded btn-fw " >Ajouter un client</button> </a>
  </div>
   <br> <br>  <br>
   
   @if(Session('message'))
      <div class="alert alert-success"> {{Session('message')}} </div>
      @endif
   <h4> La liste des clients  : </h4> <br> 
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Client</th>
          <th>Nom</th>
          <th>Prénom </th>
          <th>Téléphone</th>
          <th>Ville</th>
          <th>Email</th>
          <th>CIN</th>
          <th>Nb véhicules</th>
          <th>Etat  compte</th>
          <th>Action</th>
          
        
        </tr>
      </thead>
      <tbody>
        @forelse ($client as $p)
        
        <tr>
            <td class="py-1">
                <svg height ='23'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg> </a>
              </td>
               
              <td>{{ $p->name }}</td>
              <td >{{ $p->prenom }} </td>
              <td >{{ $p->tel}} </td>
              <td><label >{{ $p->ville }}</label></td>
              <td>{{ $p->email }}</td>
              <td >{{ $p->cin }} </td>
              <td >{{ $p->nb_v }} </td>
              
              @if( $p->etatcpt ==1)
                
                <td><label class="badge badge-success "> Activé</label></td>
              
              @else
                 
                <td><label class="badge badge-danger"> Désactivé</label></td>
              
              @endif
              
          
          <td >
            @if( $p->etatcpt ==0)
            <a href=" {{ route ('user.update.statuts', ['user_id'=>$p->id , 'user_statut'=>1 ] ) }} "><svg height='24' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path style='fill : green ; 'd="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg></a>&nbsp; &nbsp;
            @else
            <a href=" {{route('user.update.statuts', ['user_id'=>$p->id , 'user_statut'=>0 ] )}} "><svg height='24' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path style='fill :red ;'d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/></svg></a> &nbsp; &nbsp;
             @endif
            <a href='modifierclient'  ><svg height="24px" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/> </svg> </a>&nbsp; &nbsp; 
            <svg height = '20 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg>
            
          </td>
            @empty <h1> rien à afficher </h1>
          </tr>
          
          @endforelse
       
         
          
       
        
      </tbody>
    </table>
  </div>
  <div style="margin-left: 40px ; ">
  {!! $client->links() !!} 
  </div>
</div>
</div>
</div>

@endsection