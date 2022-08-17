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
        <div class="col-lg-4 mb-4">
           
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Number of reservations</div>
                    <div class="h3">20</div>
                    
                </div>
            </div>
        </div>

        <!-- Expired reservations-->
        <div class="col-lg-4 mb-4">
            
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Expired reservations</div>
                    <div class="h3">7</div>
                   
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Reservation (pas encore expiré)</div>
                    <div class="h3 d-flex align-items-center">3</div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        <div class="card-header">
            My reservations
            
            <div class="header-btn d-none f-right d-lg-block">
                              
                <a href="findplace" class="btn head-btn1">add reservation</a>
             
             </div>
 
        </div>
        <div class="card-body px-0">
<div class="d-flex align-items-center justify-content-between px-4">
    <div class="d-flex align-items-center">
         <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
        <div class="ms-4" style="margin-left: 80px;">
            <div class="small">VILLE</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Emplacement</div>
          
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Expired / pas encore</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Prix</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Le 17/08/2022</div>
            
        </div>
    </div>
    <div class="ms-4 small">
        <button type="button" class="btn btn-danger" style=' padding: 20px 32px; font-size: 16px; border-radius: 8px;'>Delet</button>
        
    </div>
</div>
<hr>
<!-- Payment method 2-->
<div class="d-flex align-items-center justify-content-between px-4">
    <div class="d-flex align-items-center">
         <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
        <div class="ms-4" style="margin-left: 80px;">
            <div class="small">VILLE</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Emplacement</div>
          
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Expired / pas encore</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Prix</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Le 17/08/2022</div>
            
        </div>
    </div>
    <div class="ms-4 small">
        <button type="button" class="btn btn-danger" style=' padding: 20px 32px; font-size: 16px; border-radius: 8px;'>Delet</button>
        
    </div>
</div>
<hr>

<!-- Payment method 3-->
<div class="d-flex align-items-center justify-content-between px-4">
    <div class="d-flex align-items-center">
         <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
        <div class="ms-4" style="margin-left: 80px;">
            <div class="small">VILLE</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Emplacement</div>
          
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Expired / pas encore</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Prix</div>
            
        </div>
        <div class="ms-4" style="margin-left: 120px;">
            <div class="small">Le 17/08/2022</div>
            
        </div>
    </div>
    <div class="ms-4 small">
        <button type="button" class="btn btn-danger" style=' padding: 20px 32px; font-size: 16px; border-radius: 8px;'>Delet</button>
        
    </div>
</div>
</div>
</div>
@endsection