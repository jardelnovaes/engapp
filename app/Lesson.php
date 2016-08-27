<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

	protected $table = 'lesson';
	public $timestamps = false;	
	
	/**
     * Get the book for the lesson.
     */
    public function book()
    {
		return $this->belongsTo('App\Book');    //for inverse (Lesson has a book)
        //return $this->hasMany('App\Comment'); //for default (Book has many lessos)
    }
}
?>