<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/{any}', function () {
    return view('coreui.homepage');
})->where('any', '.*');


//Route::resource('equipos', 'EquiposController');
//Auth::routes();
/*Route::get('/', 'HomeController@index')->name('home');


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::post('logout', 'AuthController@logout');*/

/*
Route::get('/',function(){
    $par= App\Models\Partido::with(['categorias'=> function($query){
$query->with('ligas');
    },'equipos','tarjetas','goles','users'])->find(1);
    dd ($par);
  });*/

  /*Route::get('/',function(){
    $par= App\Models\Partido::with('cancha')->find(1);
    dd ($par);
  });*/
 // categorias::query()->restore();


    	

   
    

   