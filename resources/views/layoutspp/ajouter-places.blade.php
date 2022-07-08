@extends('master')

@section('title' , 'SC Parking | Places')



@section('content')
  
<div class="col-md-6 grid-margin stretch-card"  style="margin-left: auto; margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4  >Ajouter une nouvelle place </h4>
       
        <form class="forms-sample">
          <div class="form-group">
            <label for="Nom">Type</label>
            <input type="text" class="form-control" id="Nom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label>Icone</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
         
         <button type="submit" class="btn btn-primary me-2" >Enregistrer</button>
          
        </form>
      </div>
    </div>
  </div>

@endsection