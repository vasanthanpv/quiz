<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{

    protected $table = 'quizzes';

    protected $primaryKey = 'id';


    public static function getAnswer($question)
	{

	  return $result=quiz::select('correct_answer')
                   ->where('question',$question)->get();
                  

	}
}
