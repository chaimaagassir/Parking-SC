@extends('master')

@section('title' , 'SC Parking | Details')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            @forelse ($parking as $p)
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
                                    <td width="390"> <b>Ville</b></td>
                                    <td>{{ $p->ville }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Emplacement</b></td>
                                    <td>{{ $p->emplacement }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Numéro de téléphone</b></td>
                                    <td>{{ $p->emplacement }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>prix par heure</b></td>
                                    <td>{{ $p->prix }} DH</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Nombre de place couverte voiture</b></td>
                                    <td>{{ $p->nb_p_c_voiture }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Nombre de place non couverte voiture</b></td>
                                    <td>{{ $p->nb_p_nc_voiture }}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Nombre de place couverte moto</b></td>
                                    <td>{{ $p->nb_p_c_moto}}</td>
                                </tr>
                                <tr>
                                    <td width="390"><b>Nombre de place non couverte moto</b></td>
                                    <td>{{ $p->nb_p_nc_moto }}</td>
                                </tr>
                                <tr>
                                    <td width="390"> <b>Crée le :</b></td>
                                    <td>{{$p->created_at}}</td>
                                </tr>
                                <tr>
                                    <td width="390"> <b>Modifié le :</b></td>
                                    <td>{{ $p->updated_at }}</td>
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