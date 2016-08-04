<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model {

	protected $table = 'engapp_word';
	public $timestamps = false;	
	
	/**
     * Get the word type for the word.
     */
    public function wordtype()
    {
		return $this->belongsTo('App\WordType');    //for inverse (Lesson has a book)
        //return $this->hasMany('App\Comment'); //for default (Book has many lessos)
    }
	
	/**
     * Get the lesson for the word.
     */
    public function lesson()
    {
		return $this->belongsTo('App\Lesson');
    }	
}
?>