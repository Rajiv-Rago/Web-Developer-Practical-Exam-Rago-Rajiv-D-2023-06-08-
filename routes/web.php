<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\ShopPerformance;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $queue = [];
    $inProgress = Car::orderBy('created_at')->take(5)->get();
    if (Car::count() > 5){
        $queue = Car::orderBy('created_at')->offset(6)->take(100)->get();
    }
    
    // error_log(Car::all());
    return view('welcome', ['inProgress' => $inProgress, 'queue' => $queue]);
})->name('welcome');

Route::get('/delete/{id}', function($id){
    $car = Car::findOrFail($id);

    $perf = ShopPerformance::findOrFail(1);
    $perf->total+= 1;
    if($car->targetColor == "Red"){
        $perf->red+= 1;
    } elseif ($car->targetColor == "Green"){
        $perf->green+= 1;
    }elseif ($car->targetColor == "Blue"){
        $perf->blue+= 1;
    }

    $perf->save();
    error_log($perf);
    error_log($car);
    
    $car-> delete();
    
    return redirect()->route('welcome');

});


Route::match(['get', 'post'], '/new-paint-job', function (Request $request) {
    if ($request->isMethod('get')) {
        return view('new-paint-job');
    } elseif ($request->isMethod('post')) {
        // error_log(request('plateNo'));
        // error_log(request('currentColor'));
        // error_log(request('targetColor'));
        $car = new Car();
        $car->plateNo = request('plateNo');
        $car->currentColor = request('currentColor');
        $car->targetColor = request('targetColor');
        $car->save();
        // $car = Car::create([
        //     'plateNo' => request('plateNo'),
        //     'currentColor' => request('currentColor'),
        //     'targetColor' => request('targetColor'),
        // ]);

        return redirect()->route('welcome');
    }
});

Route::get('/performance', function(){
    $perf = ShopPerformance::findOrFail(1);
    return response()->json($perf);
});





