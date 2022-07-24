@extends('master-client')

@section('title' , 'SC Parking | Reserver ')

@section('links')

<link type="text/css" rel="stylesheet" href="client/ZMER/css/bootstrap.min.css" />

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="client/ZMER/css/style.css" />
@endsection

@section('content')

    <div class="container">
     <!-- Trigger the modal with a button -->
     {{-- <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button> --}}
   
     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">
       
         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header" style="padding:35px 50px;">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4  class="zmer"><span class="glyphicon glyphicon-lock"></span> Ajouter vehicule</h4>
           </div>
           <div class="modal-body" style="padding:40px 50px;">
             <form role="form">
               <div class="form-checkbox">
                   <label for="roundtrip">
                       <input type="radio" id="roundtrip" name="flight-type">
                       <span></span>Voiture
                   </label>
                   <label for="one-way">
                       <input type="radio" id="one-way" name="flight-type">
                       <span></span>Velo
                   </label>
               </div>
               <div class="form-group">
                 <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Matricule</label>
                 <input type="text" class="form-control" id="psw" placeholder="Entrer le matricule">
               </div>
             
                 <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Valider</button>
             </form>
           </div>
           <div class="modal-footer">
             <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
             <button type="submit" class="btn btn-success pull-right" data-dismiss="modal"><span class="glyphicon "></span> Choisir vehicule</button>
             
            
           </div>
         </div>
         
       </div>
     </div> 
   </div>
   
       <div id="booking" class="section">
           <div class="section-center">
               <div class="container">
                   <div class="row">
                       <div class="booking-form">
                           <form>
                               <div class="form-group">
                                   <div class="form-checkbox">
                                       <label for="roundtrip">
                                           <input type="radio" id="roundtrip" name="flight-type">
                                           <span></span>Place Couverte
                                       </label>
                                       <label for="one-way">
                                           <input type="radio" id="one-way" name="flight-type">
                                           <span></span>Place non couverte
                                       </label>
                                   </div>
                               </div>
                           
                               <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <span class="form-label">Date d'entrée</span>
                                           <input class="form-control" type="date" required>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <span class="form-label">Datte de sortie</span>
                                           <input class="form-control" type="date" required>
                                       </div>
                                   </div>
                                   
                               
                               </div>
                               
                               <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <span class="form-label">Vehicule</span>
                                           <div class="container">
                                               <!-- Trigger the modal with a button -->
                                               <button type="button" class="btn btn-default btn-lg" id="myBtn">Ajouter</button>
                                             
                                               <!-- Modal -->
                                               <div class="modal fade" id="myModal" role="dialog">
                                                 <div class="modal-dialog">
                                                 
                                                   <!-- Modal content-->
                                                   <div class="modal-content">
                                                     <div class="modal-header" style="padding:35px 50px;">
                                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                       <h4 class="zmer" ><span class="glyphicon glyphicon-lock"></span> Ajouter vehicule</h4>
                                                     </div>
                                                     <div class="modal-body" style="padding:40px 50px;">
                                                       <form role="form">
                                                         <div class="form-checkbox">
                                                             <label for="roundtrip">
                                                                 <input type="radio" id="roundtrip" name="flight-type">
                                                                 <span></span>Voiture
                                                             </label>
                                                             <label for="one-way">
                                                                 <input type="radio" id="one-way" name="flight-type">
                                                                 <span></span>Velo
                                                             </label>
                                                         </div>
                                                         <div class="form-group">
                                                           <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Matricule</label>
                                                           <input type="text" class="form-control" id="psw" placeholder="Entrer le matricule">
                                                         </div>
                                                       
                                                           <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Valider</button>
                                                       </form>
                                                     </div>
                                                     <div class="modal-footer">
                                                       <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                       <button type="submit" class="btn btn-success pull-right" data-dismiss="modal"><span class="glyphicon "></span> Choisir vehicule</button>
                                                      
                                                     </div>
                                                   </div>
                                                   
                                                 </div>
                                               </div> 
                                             </div>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-btn">
                                           <button class="submit-btn">Reserver</button>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   
    
   <script>
   $(document).ready(function(){
     $("#myBtn").click(function(){
       $("#myModal").modal();
     });
   });
   </script>
@endsection
   
