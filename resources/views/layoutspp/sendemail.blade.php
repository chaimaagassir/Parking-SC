@extends('master')

@section('title' , 'SC Parking | Codes promos')


@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Send Email to Client </h4>
        <div class="col-12">
         
          @if(Session('message_sent'))
          <div class="alert alert-success"> {{Session('message_sent')}} </div>
          @endif
      </div>
       
        <form action="/sent-email/{{$users[0]->id}} " method="POST" class="forms-sample">
          {{ csrf_field() }}
          
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control"  value="{{ $users[0]->email}}" name="email" id="email" placeholder="Email">
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="description">Subject</label>
                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
            </div>
        </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" style="width:100% ;height: 150px" name="description" class="form-control form-control-lg" placeholder="Description" >
          </div>
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
        
          
        </form>
      </div>
    </div>
  </div>

@endsection