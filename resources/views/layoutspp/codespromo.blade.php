@extends('master')

@section('title' , 'SC Parking | Codes promos')



@section('content')
<div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Filtre</h4> <hr>
      
      <div class="form-group row">
        <div class="col">
          <form action="/search_codepromos" method='get'>
          <label>Nom</label>
          <select class="form-control" id="exampleSelectGender" name="Nom">
            <option></option>
            @forelse ($codespromo as $p)
            <option>{{ $p->Nom}}</option>
            @empty <option > rien </option>
            @endforelse
          </select>
        </div>
       
          <div class="col">
          <label>Code</label>
          <div id="the-basics">
            <input class="typeahead" type="text" name="Code" >
          </div>
        </div> 
        <div class="col">
          <label>Pourcentage</label>
          <div id="the-basics">
            <input class="typeahead" type="text" name="Pourcentage">
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

  
  <button type="button" class="btn btn-primary btn-rounded btn-fw">Exporter le fichier csv </button>
  <a href="ajoutercodepromo" ><button type="button" class="btn btn-primary btn-rounded btn-fw" >Ajouter un code promo</button> </a>
  </div>
   <br> <br>  <br>
   @if(Session('message'))
      <div class="alert alert-success"> {{Session('message')}} </div>
      @endif
   <h4> La liste des codes promos : </h4> <br> 
   
<div class="table-responsive">
   
    <table class="table table-hover">
      <thead>
        <tr>
          
          <th>Occasion</th>
          <th>Nom</th>
          <th>Code</th>
          <th>Pourcentage</th>
          <th>People autorized</th>
          <th>Date d'éxpiration</th>
          <th> Actions </th>
        
          
        
        </tr>
      </thead>
      <tbody>
        @forelse ($codespromo as $cp) 
        <tr>
           
          <td> {{ $cp->Occasion }}</td>
          <td> {{ $cp->Nom }}</td>
          <td> {{ $cp->Code }}</td>
          
          <td class="text-success"> -{{ $cp->Pourcentage }} % </td>
          <td> {{ $cp->nb_reserv }}</td>
          <td> {{ $cp->date_expiration }}</td>
          <td> <a href="code_edit/{{$cp->id}} "><svg height="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg> </a> &nbsp; &nbsp; 
            <a href="{{route('delete_codepromo' , ['id'=>$cp->id ])}}"><svg height = '20 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg></td></a>
           @empty <h1> rien à afficher </h1>
               
        </tr>
        @endforelse
        
        
      </tbody>
    </table>  
    
  </div>
  <div style="margin-left: 20px ; ">
  {!! $codespromo->links() !!} 
  </div>
</div>
</div>
</div>

@endsection