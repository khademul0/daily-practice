<?php

use App\Http\Controllers\userController;
use App\Models\todos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\InfoController;

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
    return view('welcome');

});


Route::get('/todo',function(){

$todo =DB::table('todos')->get();
//$todo = session()->get('todo',[]); this is temporay 

return view('todo',[
    'todo'=> $todo
]);
});




Route::post('/todo', function(Request $request) {
    $todos = new todos();
    $todos->todo = $request->todo;
    $todos->save(); // save to database

    return redirect('/todo'); // redirect after saving
});
//session()->push('todo',$todo);
Route::get('/delete-todo', function(){
session()->forget('todo');
return redirect('/todo');
});

/*Route::get('/about', function () {
    return view('about');
});

/*Route::get('/contact', function () {
    return view('contact');
});*/


//route shortr form option(both are same)

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::resource('/infos', InfoController::class);
