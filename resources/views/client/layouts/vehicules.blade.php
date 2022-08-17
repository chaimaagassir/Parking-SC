@extends('master-client')

@section('title' , 'SC Parking | Vehicles ')


@section('content')

<div class="container-xl px-4 mt-4">
   <br><br><br>

    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        <div class="card-header">
            My vehicles
            
            <div class="header-btn d-none f-right d-lg-block">
                              
                <a  data-toggle="modal" data-target=".bd-example-modal-xl" href="findplace" class="btn head-btn1">add vehicle</a>
                {{-- form add vehicule --}}
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                       <form action='ajouterclient' method='POST'class="forms-sample" style="   margin-top: 50px; margin-bottom: 50px; margin-right: 150px; margin-left: 80px;">
                       
                        
                            @csrf
                            <div class="form-group">  
                              <label for="Immatricule">Immatricule</label>
                              <input type="text" class="form-control" name="immatricule" id="Immatricule" placeholder="Immatricule">
                            </div>
                          
                            <div  class="form-group">
                              <label for="Type">Type</label><br>
                              <select type="text" class="form-control" name="type" id="Type" placeholder="Type"  >
                                <option>Voiture </option>
                                <option>Moto </option>
                              </select>
                              
                            </div>
                            <br><br>
                           
                            <button type="submit" class="btn btn-danger" >Enregistrer</button>
                           
                           
                            
                        </form>
                      </div>
                    </div>
                  </div>
             </div>
            


        </div>
        <div class="card-body px-0">
<div class="d-flex align-items-center justify-content-between px-4">
    <div class="d-flex align-items-center">
        <svg height='24' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M39.61 196.8L74.8 96.29C88.27 57.78 124.6 32 165.4 32H346.6C387.4 32 423.7 57.78 437.2 96.29L472.4 196.8C495.6 206.4 512 229.3 512 256V448C512 465.7 497.7 480 480 480H448C430.3 480 416 465.7 416 448V400H96V448C96 465.7 81.67 480 64 480H32C14.33 480 0 465.7 0 448V256C0 229.3 16.36 206.4 39.61 196.8V196.8zM109.1 192H402.9L376.8 117.4C372.3 104.6 360.2 96 346.6 96H165.4C151.8 96 139.7 104.6 135.2 117.4L109.1 192zM96 256C78.33 256 64 270.3 64 288C64 305.7 78.33 320 96 320C113.7 320 128 305.7 128 288C128 270.3 113.7 256 96 256zM416 320C433.7 320 448 305.7 448 288C448 270.3 433.7 256 416 256C398.3 256 384 270.3 384 288C384 305.7 398.3 320 416 320z"/></svg>
        <div class="ms-4" style="margin-left: 80px;">
            <div class="small"><b>AA-123-AA</b></div>
            <div class="text-xs text-muted">Added on 17/08/2022</div>
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
        <svg height='24' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.5 32C357.2 32 370.7 40.05 377.6 52.98L391.7 78.93L439.1 39.42C444.9 34.62 452.1 32 459.6 32H480C497.7 32 512 46.33 512 64V96C512 113.7 497.7 128 480 128H418.2L473.3 229.1C485.5 226.1 498.5 224 512 224C582.7 224 640 281.3 640 352C640 422.7 582.7 480 512 480C441.3 480 384 422.7 384 352C384 311.1 402.4 276.3 431.1 252.8L415.7 224.2C376.1 253.4 352 299.8 352 352C352 362.1 353.1 373.7 355.2 384H284.8C286.9 373.7 287.1 362.1 287.1 352C287.1 263.6 216.4 192 127.1 192H31.1V160C31.1 142.3 46.33 128 63.1 128H165.5C182.5 128 198.7 134.7 210.7 146.7L255.1 192L354.1 110.3L337.7 80H279.1C266.7 80 255.1 69.25 255.1 56C255.1 42.75 266.7 32 279.1 32L342.5 32zM448 352C448 387.3 476.7 416 512 416C547.3 416 576 387.3 576 352C576 316.7 547.3 288 512 288C509.6 288 507.2 288.1 504.9 288.4L533.1 340.6C539.4 352.2 535.1 366.8 523.4 373.1C511.8 379.4 497.2 375.1 490.9 363.4L462.7 311.2C453.5 322.3 448 336.5 448 352V352zM253.8 376C242.5 435.2 190.5 480 128 480C57.31 480 0 422.7 0 352C0 281.3 57.31 224 128 224C190.5 224 242.5 268.8 253.8 328H187.3C177.9 304.5 154.9 288 128 288C92.65 288 64 316.7 64 352C64 387.3 92.65 416 128 416C154.9 416 177.9 399.5 187.3 376H253.8zM96 352C96 334.3 110.3 320 128 320C145.7 320 160 334.3 160 352C160 369.7 145.7 384 128 384C110.3 384 96 369.7 96 352z"/></svg>
        <div class="ms-4" style="margin-left: 80px;">
            <div class="small"> <b >DE-897-OI </b></div>
            <div class="text-xs text-muted">Added on 17/08/2022</div>
        </div>
    </div>
    <div class="ms-4 small">
        <button type="button" class="btn btn-danger" style=' padding: 20px 32px; font-size: 16px; border-radius: 8px;'>Delet</button>
        
    </div>
    
</div>


</div>
</div>
@endsection