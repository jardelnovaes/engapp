<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $table = 'engapp_book';
	public $timestamps = false;
	//protected $connection = 'connection-name';
	//protected $fillable = ['name'];

	public function lessons(){
		return $this->hasMany('App\Lesson'); //for default (Book has many lessos)
	}
}



//https://laravel.com/docs/4.2/eloquent
//https://laravel.com/docs/5.1/eloquent
//JSON Whitelist => protected $visible = array('first_name', 'last_name');
/*

$flights = App\Flight::where('active', 1)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();
$flight = App\Flight::where('active', 1)->first();	
$flight = App\Flight::find(1);	
return App\Flight::findOrFail($id);	 
SAVE
	$flight = new Flight;
    $flight->name = $request->name;
    $flight->save();
UPDATE (v2)
	App\Flight::where('active', 1)
          ->where('destination', 'San Diego')
          ->update(['delayed' => 1]);	
*/
?>