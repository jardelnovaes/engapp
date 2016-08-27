<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTablesAndData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->engine = 'InnoDB';
			$table->increments('id');
            $table->string('name', 15);
            //$table->timestamps();
        });
		
		Schema::create('wordtype', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50);
            //$table->timestamps();
        });
		
		Schema::create('lesson', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 15);
			$table->unsignedInteger('book_id');
            //$table->timestamps();
			
			$table->foreign('book_id')->references('id')->on('book');
        });
		 
		Schema::create('word', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('english', 60);
			$table->string('portuguese', 60);
			$table->unsignedInteger('wordtype_id');
			$table->unsignedInteger('lesson_id');
            //$table->timestamps();
			
			$table->foreign('wordtype_id')->references('id')->on('wordtype');
			$table->foreign('lesson_id')->references('id')->on('lesson');
        });
		
		//inserting initial data
		DB::table('users')->insert(
			array(
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'password' => '$2y$10$R.dZivfWxIQTwAoR5RrZ/ePBI/c5ulBYhcNiXa548oA9miW/15hoS' //admin123
			)
		);
		
		for($i=1; $i < 6; $i++){
			DB::table('book')->insert(array('name' => "Book $i"));
			
			for($j=1; $j < 10; $j++){
				DB::table('lesson')->insert(array('name' => "Lesson $j", 'book_id' => $i));
			}
		}
		
		DB::table('wordtype')->insert(array('name' => 'Adjective')); //1
		DB::table('wordtype')->insert(array('name' => 'Adverb')); //2
		DB::table('wordtype')->insert(array('name' => 'Article')); //3
		DB::table('wordtype')->insert(array('name' => 'Conjunction')); //4
		DB::table('wordtype')->insert(array('name' => 'Noun')); //5 
		DB::table('wordtype')->insert(array('name' => 'Other')); //6 
		DB::table('wordtype')->insert(array('name' => 'Preposition')); //7 
		DB::table('wordtype')->insert(array('name' => 'Pronoun')); //8
		DB::table('wordtype')->insert(array('name' => 'Verb')); //9
		
		
		DB::table('word')->insert(array('english' => 'Friend', 'portuguese' => 'Amigo(a)', 'wordtype_id' => 5, 'lesson_id' => 1));
		DB::table('word')->insert(array('english' => 'Egg', 'portuguese' => 'Ovo', 'wordtype_id' => 5, 'lesson_id' => 2));
		DB::table('word')->insert(array('english' => 'See', 'portuguese' => 'Ver', 'wordtype_id' => 9, 'lesson_id' => 1));
		DB::table('word')->insert(array('english' => 'Want', 'portuguese' => 'Querer', 'wordtype_id' => 9, 'lesson_id' => 3));
		DB::table('word')->insert(array('english' => 'Alone', 'portuguese' => 'Sozinho', 'wordtype_id' => 2, 'lesson_id' => 10));
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::disableForeignKeyConstraints();
		
		$table->dropForeign('word_wordtype_id_foreign');
		$table->dropForeign('word_lesson_id_foreign');
		$table->dropForeign('lesson_book_id_foreign');
		
        Schema::drop('word');
		Schema::drop('lesson');
		Schema::drop('book');
		Schema::drop('wordtype');
		
		Schema::enableForeignKeyConstraints();
    }
}
/*
drop table engapp_word;
drop table engapp_lesson;
drop table engapp_wordtype;
drop table engapp_book;
drop table engapp_migrations;
drop table engapp_password_resets;
drop table engapp_users;
*/