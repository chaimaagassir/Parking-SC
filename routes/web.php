<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodepromoController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\VehiculesController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

// --------------------------User--------------------*/
//ADMIN PAGE LOGIN 

Route::get('admin-index', [HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('dashboard', function () {
    return view('dashboard');
});




Route::get('/', function () {
    return view('client/layouts.index');
});



Route::get('register', function () {
    return view('auth.register');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('findplace', function () {
    return view('client/layouts.findplace');
});
Route::get('FAQ', function () {
    return view('client/layouts.faq');
});
Route::get('reservations', function () {
    return view('client/layouts.reservations');
});
Route::get('vehicules', function () {
    return view('client/layouts.vehicules');
});
Route::get('about', function () {
    return view('client/layouts.about');
});
Route::get('contact', function () {
    return view('client/layouts.contact');
});
Route::get('parking-details', function () {
    return view('client/layouts.parking-details');
});
Route::get('reserver', function () {
    return view('client/layouts.reserver');
});

// contact us 
Route::get('contact', [ContactController::class,'contact_us']); 
Route::post('send_mail', [ContactController::class,'send_mail'])->name('send_mail');


Route::get('reservations', [ReservationController::class,'afficher']); 

Route::post('make_reservation/{id}', [ReservationController::class,'add_reservation'])->name('make_reservation');

Route::get('vehicules', [VehiculesController::class,'afficher']); 
Route::post('ajoutervehicule', [VehiculesController::class,'add_vehicule']);
Route::post('update_vehicle/{id}', [VehiculesController::class,'update_vehicule'])->name('update_vehicle');
Route::get('delete_vehicle/{id}', [VehiculesController::class,'delete_vehicule'])->name('delete_vehicle');

Route::get('findplace/filter', [ParkingController::class,'filter_find_place'])->name('findplace/filter');
Route::get('findplace', [ParkingController::class,'afficherfind']);
Route::get('parking-details/{parking_id}', [ParkingController::class,'parking_details'])->name('parking-details');

// --------------------------Admin--------------------*/

Route::get('tableau-de-bord', [DashboardController::class,'dashboard'])->name('tableau-de-bord'); 

Route::get('clients', function () {
    return view('clients');
});

Route::get('codespromo', function () {
    return view('layoutspp.codespromo');
});

Route::get('codespromo', [CodepromoController::class,'afficher']); 

Route::get('parkings', function () {
    return view('layoutspp.parking');    
});


Route::get('places', [PlacesController::class,'afficher']);
Route::get('delete_place/{id}',[PlacesController::class,'delete_places'])->name('delete_place');

Route::get('parkings', [ParkingController::class,'afficher']);

Route::get('parkingsdetails/{parking_id}', [ParkingController::class,'parking_details_admin'])->name('parkingsdetailsadmin');
Route::get('placesdetails/{parking_id}', [ParkingController::class,'place_details_admin'])->name('placesdetailsadmin');

Route::middleware('auth')->group(function (){
    Route::get('clients', [ClientsController::class,'afficher']);
    Route::get('clients/{user_id}/{user_statut}', [ClientsController::class,'update_statuts'])->name('user.update.statuts');
}) ;


Route::get('réservations', function () {
    return view('layoutspp.réservations');
});

// Route::get('tableau-de-bord', function () {
//     return view('layoutspp.tableau-de-bord');
// });

// Route::get('places', function () {
//     return view('layoutspp.places');
// });

Route::get('ajouterclient', function () {
    return view('layoutspp.ajouter-client');
});

// Route::get('ajoutercodepromo', function () {
//     return view('layoutspp.ajouter-codepromo');
// });

Route::get('ajoutercodepromo', [CodepromoController::class,'add']);
Route::post('ajoutercodepromo', [CodepromoController::class,'promocodes']);
Route::get('delete_codepromo/{id}',[CodepromoController::class,'delete_codepromos'])->name('delete_codepromo');

Route::get('code_edit/{id}',[CodepromoController::class,'edit_code'])->name('code_edit');
Route::post('/code_update/{id}',[CodepromoController::class,'update_code'])->name('code_update');

// Route::get('modifiercodepromo/{codespromo_id}', [CodepromoController::class,'edit']);
// Route::get('/modifiercodepromo/{id}','CodepromoController@edit');



Route::get('ajouterparking', [ParkingController::class,'add']);
Route::post('ajouterparking', [ParkingController::class,'add_place']);
Route::get('delete_parking/{id}',[ParkingController::class,'delete_parkings'])->name('delete_parking');

//Route::get('/updateparking/{id}',[ParkingController::class,'update_parkings'])->name('updateparking');
//Route::post('/editparking/{id}',[ParkingController::class,'edit_parkings'])->name('editparking');
Route::get('parking_edit/{id}',[ParkingController::class,'edit_parking'])->name('parking_edit');
Route::post('/parking_update/{id}',[ParkingController::class,'update_parking'])->name('parking_update');

Route::get('reserver/{id}',[ReservationController::class,'id_parking_form'])->name('reserver');



Route::get('ajouterclient', [ClientsController::class,'add']);
Route::post('ajouterclient', [ClientsController::class,'add_client']);
Route::get('delete_client/{id}',[ClientsController::class,'delete_clients'])->name('delete_client');
Route::get('click_edit/{id}',[ClientsController::class,'edit_function'])->name('click_edit');
Route::post('/update/{id}',[ClientsController::class,'update_function'])->name('update');




// Route::get('ajouterparking', function () {
//     return view('layoutspp.ajouter-parking');
// });

Route::get('ajouterrésevation', function () {
    return view('layoutspp.ajouter-réservation');
});
Route::get('ajouterplace', function () {
    return view('layoutspp.ajouter-places');
});

Route::get('modifierclient', function () {
    return view('layoutspp.modifier-client');
});
 
Route::get('modifiercodepromo', function () {
    return view('layoutspp.modifier-codespromo');
});

Route::get('modifierparking', function () {
    return view('layoutspp.modifier-parking');
});

Route::get('modifierrésevation', function () {
    return view('layoutspp.modifier-réservation');
});
Route::get('modifierplace', function () {
    return view('layoutspp.modifier-places');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Route fichier CSV:
//Fichier CSV Client
Route::get('export-excel-client',[ClientsController::class,'exportIntoExcelClient']);
Route::get('export-csv-client',[ClientsController::class,'exportIntoCSVClient']);
//Fichier CSV Reservation
Route::get('export-excel-reservation',[ReservationController::class,'exportIntoExcelReservation']);
Route::get('export-csv-reservation',[ReservationController::class,'exportIntoCSVReservation']);
//Fichier CSV Parking
Route::get('export-excel',[ParkingController::class,'exportIntoExcel']);
Route::get('export-csv',[ParkingController::class,'exportIntoCSV']);
//Fichier CSV Place
Route::get('export-excel-place',[PlacesController::class,'exportIntoExcelPlace']);
Route::get('export-csv-place',[PlacesController::class,'exportIntoCSVPlace']);

