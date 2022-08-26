@extends('master-client')

@section('title' , 'SC Parking | Reservations ')


@section('content')

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link active" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
         <!-- Number of reservations-->
        <div class="col-lg-3 mb-3">
           
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Number of reservations</div>
                    <div class="h3">{{$nb_reservation}}</div>
                    
                </div>
            </div>
        </div>

        <!-- Expired reservations-->
        <div class="col-lg-3 mb-3">
            
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Expired reservations</div>
                    <div class="h3">{{$nb_reservation_expired}}</div>
                   
                </div>
            </div>
        </div>

        

        <div class="col-lg-3 mb-3">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Reservations not expired yet</div>
                    <div class="h3 d-flex align-items-center">{{$nb_reservation_not_expired}}</div>
                   
                </div>
            </div>
        </div>

        <div class="col-lg-3 mb-3">
            
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Solde</div>
                    
                    <div class="h3">
                        <svg  height ='35'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M320 96H192L144.6 24.88C137.5 14.24 145.1 0 157.9 0H354.1C366.9 0 374.5 14.24 367.4 24.88L320 96zM192 128H320C323.8 130.5 328.1 133.3 332.1 136.4C389.7 172.7 512 250.9 512 416C512 469 469 512 416 512H96C42.98 512 0 469 0 416C0 250.9 122.3 172.7 179 136.4C183.9 133.3 188.2 130.5 192 128V128zM276.1 224C276.1 212.9 267.1 203.9 255.1 203.9C244.9 203.9 235.9 212.9 235.9 224V230C230.3 231.2 224.1 232.9 220 235.1C205.1 241.9 192.1 254.5 188.9 272.8C187.1 283 188.1 292.9 192.3 301.8C196.5 310.6 203 316.8 209.6 321.3C221.2 329.2 236.5 333.8 248.2 337.3L250.4 337.9C264.4 342.2 273.8 345.3 279.7 349.6C282.2 351.4 283.1 352.8 283.4 353.7C283.8 354.5 284.4 356.3 283.7 360.3C283.1 363.8 281.2 366.8 275.7 369.1C269.6 371.7 259.7 373 246.9 371C240.9 370 230.2 366.4 220.7 363.2C218.5 362.4 216.3 361.7 214.3 361C203.8 357.5 192.5 363.2 189 373.7C185.5 384.2 191.2 395.5 201.7 398.1C202.9 399.4 204.4 399.9 206.1 400.5C213.1 403.2 226.4 407.4 235.9 409.6V416C235.9 427.1 244.9 436.1 255.1 436.1C267.1 436.1 276.1 427.1 276.1 416V410.5C281.4 409.5 286.6 407.1 291.4 405.9C307.2 399.2 319.8 386.2 323.1 367.2C324.9 356.8 324.1 346.8 320.1 337.7C316.2 328.7 309.9 322.1 303.2 317.3C291.1 308.4 274.9 303.6 262.8 299.9L261.1 299.7C247.8 295.4 238.2 292.4 232.1 288.2C229.5 286.4 228.7 285.2 228.5 284.7C228.3 284.3 227.7 283.1 228.3 279.7C228.7 277.7 230.2 274.4 236.5 271.6C242.1 268.7 252.9 267.1 265.1 268.1C269.5 269.7 283 272.3 286.9 273.3C297.5 276.2 308.5 269.8 311.3 259.1C314.2 248.5 307.8 237.5 297.1 234.7C292.7 233.5 282.7 231.5 276.1 230.3L276.1 224z"/></svg>
                        &nbsp; &nbsp;{{$solde}} MAD
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        <div class="card-header">
            My reservations 
            @if(Session('message'))
            <div class="alert alert-success"> {{Session('message')}} </div>
            @endif
            
            <div class="header-btn d-none f-right d-lg-block">
                              
                <a href="findplace" class="btn head-btn1">add reservation</a>
             
             </div>
 
        </div>
        <div class="card-body px-0">
            @forelse($reservation as $r )
<div class="d-flex align-items-center justify-content-between px-4">
    <div class="d-flex align-items-center">
         <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
        <div class="ms-4" style="margin-left: 80px;">
            <div class="small">VILLE</div>
            
        </div>
        <div class="ms-4" style="margin-left: 100px;">
            <div class="small">Emplacement</div>
          
        </div>
        <div class="ms-4" style="margin-left: 100px;">
            <div class="small">Expired / pas encore</div>
            
        </div>
        <div class="ms-4" style="margin-left: 100px;">
            <div class="small">{{$r->prix}}</div>
            
        </div>
        <div class="ms-4" style="margin-left: 100px;">
            <div class="small">{{Carbon\Carbon::parse($r->date_debut)->format('d-m-Y H:i')}} <b>vers </b> {{Carbon\Carbon::parse($r->date_fin)->format('d-m-Y H:i')}}</div>
            
        </div>
    </div>
    <div class="ms-4 small" style="margin-left: 100px;">
        @if($r->date_fin < $now)
        <button type="button" href="#" class="btn btn-danger" style=' background-color : rgb(78, 78, 78) ; padding: 20px 32px; font-size: 16px; border-radius: 8px;'>Expired</button>
        
        @else

        <button type="button" class="btn btn-danger" style=' padding: 20px 32px; font-size: 16px; border-radius: 8px;'>Cancel</button>
        
        @endif
    </div>
    <div class="ms-4 small" style="margin-left: 10px;" >
        <a href="{{route('telecharger_ticket' ,$r->id )}}"> 
            <button type="button" class="btn btn-danger" style=' padding: 10px 20px;  border-radius: 8px;'>
                <svg height="23"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M128 160H448V352H128V160zM512 64C547.3 64 576 92.65 576 128V208C549.5 208 528 229.5 528 256C528 282.5 549.5 304 576 304V384C576 419.3 547.3 448 512 448H64C28.65 448 0 419.3 0 384V304C26.51 304 48 282.5 48 256C48 229.5 26.51 208 0 208V128C0 92.65 28.65 64 64 64H512zM96 352C96 369.7 110.3 384 128 384H448C465.7 384 480 369.7 480 352V160C480 142.3 465.7 128 448 128H128C110.3 128 96 142.3 96 160V352z"/></svg>
            </button>
        </a>

    </div>
</div>
<hr>
@empty <h5> You don't have reservation yet </h5>
@endforelse

</div>
</div>
@endsection