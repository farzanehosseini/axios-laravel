<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
    return view('getData');
});

Route::post('/getData', function (Request $request) {
       
    // Check if the request has a file
    if ($request->hasFile('pic')) {
        $file = $request->file('pic');
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();
       
        $file->move(public_path($imagePath), $filename);
          
        return response()->json(['path' => $imagePath . $filename,'ffffileName' =>  $filename]);
    } else {
        return response()->json(['error' => 'No file uploaded'], 400);
    }
})->name('getData');

