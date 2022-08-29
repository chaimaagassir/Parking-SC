@extends('master-client')

@section('title' , 'SC Parking | Reserver ')


@section('content')
<div id="booking" class="section">
  <div class="section-center">
      <div class="container">
          <div class="row">
              <div class="booking-form">
                  <div class="form-header">
                      <h1>Make your reservation  </h1>
                      @if(Session('message'))
            <div class="alert alert-danger"> {{Session('message')}} </div>
            @endif
                  </div>
                  <form action='{{route('make_reservation',  ['id'=>$id ])}}' method='post'>
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <input name='date_debut' class="form-control" type="datetime-local" required>
                                  <span class="form-label">Check In</span>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <input name='date_fin' class="form-control" type="datetime-local" required>
                                  <span class="form-label">Check out</span>
                              </div>
                          </div>
                      </div>
                      <div class="row" style='margin-right :5% ; margin-left:5% ;  '>
                          <div class="col-md-4">
                              <div class="form-group">
                                 <div style='  color: rgba(255, 255, 255, 0.5);'> Choose vehicle</div>
                                  <select name="id_vehicule"class="form-control" required>
                                     @forelse ($vehicules as $p)
                                      <option value='{{$p->id}}'> {{$p->immatricule}} </option>
                                      @empty <option> please add vehicle </option>
                                      @endforelse
                                  </select>
                                 
                              </div>
                          </div>
                        

                          <div class="col-md-4">
                            <div class="form-group">
                               <div style='  color: rgba(255, 255, 255, 0.5);'> Type of place</div>
                                <select name="couverte" class="form-control" required>
                                   
                                    <option value='1'> Covered </option>
                                    <option value='0'> Not covered </option>
                                </select>
                             
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <br>
                            <a href='vehicules' class="btn btn-danger" style=' padding: 20px 32px; font-size: 16px; border-radius: 8px; margin-top :25;'> add vehicle  </a>
                     
                            

                          </div>
                      </div>
                      
                      </div><br><br>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Enter your promo code" name="promocode">
                                  <span class="form-label">Promo code</span>
                              </div>
                          </div>
                          
                      </div>
                      <div class="form-btn">
                          <button class="submit-btn">Book Now</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('css_reserver')
    <style>  
    body {
      /* background-image: linear-gradient(to right, #f0ebf1, #bebbbc)
      */
      /* background-image: url('../../../client/ZMER/img/back.jpg');
      background-size: cover;
      background-position: center; */
    }

    .section {
      position: relative;
      height: 100vh;
    }

    .section .section-center {
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
    }

    #booking {
      font-family: 'Raleway', sans-serif;
    }

    .booking-form {
      position: relative;
      max-width: 642px;
      width: 100%;
      margin: auto;
      padding: 40px;
      overflow: hidden;
      background-image: url('public/client/ZMER/img/back.jpg');
      background-size: cover;
      border-radius: 5px;
      z-index: 20;
    }

    .booking-form::before {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      background: rgba(0, 0, 0, 0.7);
      z-index: -1;
    }

    .booking-form .form-header {
      text-align: center;
      position: relative;
      margin-bottom: 30px;
    }

    .booking-form .form-header h1 {
      font-weight: 700;
      text-transform: capitalize;
      font-size: 42px;
      margin: 0px;
      color: #fff;
    }

    .booking-form .form-group {
      position: relative;
      margin-bottom: 30px;
    }

    .booking-form .form-control {
      background-color: rgba(255, 255, 255, 0.2);
      height: 60px;
      padding: 0px 25px;
      border: none;
      border-radius: 40px;
      
      -webkit-box-shadow: 0px 0px 0px 2px transparent;
      box-shadow: 0px 0px 0px 2px transparent;
      -webkit-transition: 0.2s;
      transition: 0.2s;
    }

    .booking-form .form-control::-webkit-input-placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .booking-form .form-control:-ms-input-placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .booking-form .form-control::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .booking-form .form-control:focus {
      -webkit-box-shadow: 0px 0px 0px 2px #fb246a;
      box-shadow: 0px 0px 0px 2px #fb246a;
    }

    .booking-form input[type="date"].form-control {
      padding-top: 16px;
    }

    .booking-form input[type="date"].form-control:invalid {
      color: rgba(255, 255, 255, 0.5);
    }

    .booking-form input[type="date"].form-control+.form-label {
      opacity: 1;
      top: 10px;
    }

    .booking-form select.form-control {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    .booking-form select.form-control:invalid {
      color: rgba(255, 255, 255, 0.5);
    }

    .booking-form select.form-control+.select-arrow {
      position: absolute;
      right: 15px;
      top: 50%;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      width: 32px;
      line-height: 32px;
      height: 32px;
      text-align: center;
      pointer-events: none;
      color: rgba(255, 255, 255, 0.5);
      font-size: 14px;
    }

    .booking-form select.form-control+.select-arrow:after {
      content: '\279C';
      display: block;
      -webkit-transform: rotate(90deg);
      transform: rotate(90deg);
    }

    .booking-form select.form-control option {
      color: #000;
    }

    .booking-form .form-label {
      position: absolute;
      top: -10px;
      left: 25px;
      opacity: 0;
      color: #fb246a;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.3px;
      height: 15px;
      line-height: 15px;
      -webkit-transition: 0.2s all;
      transition: 0.2s all;
    }

    .booking-form .form-group.input-not-empty .form-control {
      padding-top: 16px;
    }

    .booking-form .form-group.input-not-empty .form-label {
      opacity: 1;
      top: 10px;
    }

    .booking-form .submit-btn {
      color: #fff;
      background-color: #da2461;
      font-weight: 700;
      height: 60px;
      padding: 10px 30px;
      width: 100%;
      border-radius: 40px;
      border: none;
      text-transform: uppercase;
      font-size: 16px;
      letter-spacing: 1.3px;
      -webkit-transition: 0.2s all;
      transition: 0.2s all;
    }

    .booking-form .submit-btn:hover,
    .booking-form .submit-btn:focus {
      opacity: 0.9;
    }
    </style>
@endsection