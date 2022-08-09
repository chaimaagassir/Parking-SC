<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodepromoController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;

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

// --------------------------Admin--------------------*/



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

Route::get('parkings', [ParkingController::class,'afficher']);
Route::get('findplace', [ParkingController::class,'afficherfind']);
Route::get('parking-details/{parking_id}', [ParkingController::class,'parking_details'])->name('parking-details');

Route::middleware('auth')->group(function (){
    Route::get('clients', [ClientsController::class,'afficher']);
    Route::get('clients/{user_id}/{user_statut}', [ClientsController::class,'update_statuts'])->name('user.update.statuts');
}) ;


Route::get('réservations', function () {
    return view('layoutspp.réservations');
});

Route::get('tableau-de-bord', function () {
    return view('layoutspp.tableau-de-bord');
});

Route::get('places', function () {
    return view('layoutspp.places');
});

Route::get('ajouterclient', function () {
    return view('layoutspp.ajouter-client');
});

// Route::get('ajoutercodepromo', function () {
//     return view('layoutspp.ajouter-codepromo');
// });

Route::get('ajoutercodepromo', [CodepromoController::class,'add']);
Route::post('ajoutercodepromo', [CodepromoController::class,'promocodes']);
Route::get('modifiercodepromo/{codespromo_id}', [CodepromoController::class,'edit']);

Route::get('ajouterparking', [ParkingController::class,'add']);
Route::post('ajouterparking', [ParkingController::class,'add_place']);


Route::get('ajouterclient', [ClientsController::class,'add']);
Route::post('ajouterclient', [ClientsController::class,'add_client']);

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
<<<<<<< HEAD
=======
//Fichier CSV Place
Route::get('export-excel-place',[PlacesController::class,'exportIntoExcelPlace']);
Route::get('export-csv-place',[PlacesController::class,'exportIntoCSVPlace']);
>>>>>>> c465bda9715cfd1d8797a082e32f33781bbdb8dc

