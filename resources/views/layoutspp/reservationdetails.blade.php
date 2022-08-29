@extends('master')

@section('title' , 'SC Parking | Details')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            @forelse ($reservations as $p)
            <h3 class="card-title">{{ $p->ville }}</h3>
            <h6 class="card-subtitle">{{ $p->emplacement }}</h6>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-3">
                    <a href="#"><img src="../../uploads/parkings/{{ $p->image }}" width="400" 
                        height="300" alt="image"/></a>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Parking description</h4>
                    @php
                            $nb_place =  $p->nb_p_c_voiture  + $p->nb_p_nc_voiture + $p->nb_p_c_moto + $p->nb_p_nc_moto  ;
                            @endphp
                            
                            @if( $p->description ==null)
                            <p> Le parking de {{ $p->emplacement }} qui se situe à {{ $p->ville }} contient @php echo $nb_place  ; @endphp places séparés entre des places de voiture couverte et non couverte et  des places moto couverte et non couverte . </p>
                            @else
                            <p>{{ $p->description }}</p>
                            @endif
                    
                </div>
              
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">General Info</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390"><b>Client</b></td>
                                    <td> @if ($p->profile_photo_path)

                  
                                        <img  width="23" height="23" src="/storage/{{ $p->profile_photo_path }}"  class="rounded-circle z-depth-2" alt="100x100" data-holder-rendered="true">
                                        
                                        @else
                                         <svg height ='24'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg> 
                                         
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Email client</b></td>
                                    <td>{{ $p->email }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Cin client</b></td>
                                    <td>{{ $p->cin }}</td>
                                </tr>
                               
                                <tr>
                                    <td width="390"> <b>Ville</b></td>
                                    <td>{{ $p->ville }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Emplacement</b></td>
                                    <td>{{ $p->emplacement }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Numéro place </b></td>
                                    <td>{{ $p->numero }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Type de place</b></td>
                                    <td>@if( $p->couverte == '1' ) Couverte @else Non couverte @endif</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Type de vehicule</b></td>
                                    <td>@if( $p->type == '1' ) Voiture @else Moto @endif</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Immatricule</b></td>
                                    <td>{{ $p->immatricule }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Statut réservation</b></td>
                                    @if( $p->statut =='confirmée')
                                    <td ><label class="badge badge-success" style = " font-size : 15px ;" >{{ $p->statut}}</label></td>
                        
                                    @else
                                    <td ><label class="badge badge-danger" style = " font-size : 15px ;" >{{ $p->statut}}</label></td>
                                    @endif
                                </tr>

                                <tr>
                                    <td width="390"><b>Date début</b></td>
                                    <td>{{Carbon\Carbon::parse($p->date_debut)->format('d-m-Y H:i')}}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Date fin</b></td>
                                    <td>{{Carbon\Carbon::parse($p->date_fin)->format('d-m-Y H:i')}}</td>
                                </tr>
                               
                              
                                <tr>
                                    <td width="390"><b>Prix</b></td>
                                    <td>{{ $p->prix }} DH</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Prix payé</b></td>
                                    <td>{{ $p->prix_a_payer }} DH</td>
                                </tr>
                               
                                
                                <tr>
                                    <td width="390"> <b>Ajouté  le :</b></td>
                                    <td>{{$p->created_at}}</td>
                                </tr>
                               
                                @empty <h1> nothing to show </h1>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection