<?php
use App\Mail\KryptoniteFound;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
use App\Animal;
use App\Adoption;
Route::get('test99', function(){
    $animals = Animal::all();
    foreach($animals as $animal){
      if(empty($animal->join_Adoption->animal_id)){
        echo $animal->animal_id.'<br>';
      }
    }
});
Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');




Route::get('/delete/{id}', 'AdminController@delete');
Route::get('/add','AnimalController@addAnimal');
Route::post('/add','AnimalController@addAnimal');
Route::get('/animal', 'AnimalController@animal');
Route::post('/animal', 'AnimalController@animal');
Route::get('/edit/{animal_id}','AnimalController@editAnimal');
Route::post('/edit','AnimalController@editAnimal');
Route::get('/edit', 'AnimalController@badEditRequest');
Route::get('/deleteAnimal/{id}', 'AnimalController@deleteAnimal');

//เวลามึงเข้าแบบไม่ส่ง ไอดีเข้าไปมันจะเออเร่อ เพราะมันไม่มีเร้า
//เราต้องบอกว่าเวลาจะแก้ไข ให้ส่ง ไอดีไปด้วย ส่งมาแบบนี้ไม่ได้
//ก็สร้างเร้าดักเลย ถ้าส่งมา edit แบบไม่มีไอดีมาด้วย ให้เด้งกลับไปหน้าเดิมอ

//เวลามึง แก้ไข มึงมาพาทนี้ิ Route::get('/edit/{animal_id}','AnimalController@editAnimal');

///โดยที่ส่ง ไอดีมาทาง url
//ทีนี้ มันจะเปนงี้ localhost: 8000/edit/5
//มันจะไปทำ get method
Route::get('/all', 'AnimalController@animalAll');

Route::get('/', function () {
    // send an email to "batman@batcave.io"
    Mail::to('asihtus10@gmail.com')->send(new KryptoniteFound);

    return view('welcome');
});

Route::get('/dm', 'AnimalController@animalMoney');
Route::get('/db', 'AnimalController@animalBlood');
Route::get('/da', 'AnimalController@animalAdoption');
Route::get('/testmail','EmailController@sendEmail');



Route::get('/addNews','AnimalController@addNews');
Route::post('/addNews','AnimalController@addNews');
//Route::get('/new','AnimalController@NewsAniAll');

Route::get('/animalhasnews','AnimalController@animalhasnews');
Route::post('/animalhasnews','AnimalController@animalhasnews');


Route::get('/n','AnimalController@newsPage');
Route::post('/n','AnimalController@newsPage');




Route::get('/deleteNews/{news_id}', 'AnimalController@deleteNews');
Route::post('/deleteNews/{news_id}', 'AnimalController@deleteNews');



Route::get('/userProfile', 'HomeController@userDetail');
Route::post('/userProfile', 'HomeController@userDetail');


Route::get('/addAdoption', 'AnimalController@addAdoption');
Route::post('/addAdoption', 'AnimalController@addAdoption');

Route::get('/checkAdoption', 'AnimalController@checkAdoption');
Route::post('/checkAdoption', 'AnimalController@checkAdoption');

Route::get('/deleteAdoptionTable/{id}', 'AnimalController@deleteAdoptionTable');
Route::post('/deleteAdoptionTable/{id}', 'AnimalController@deleteAdoptionTable');
