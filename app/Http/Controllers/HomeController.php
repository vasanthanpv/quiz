<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\quiz;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $question_answers = DB::table('quizzes')->get();
        return view('home', ['question_answers' => $question_answers]);

    }

    /* Store a newly created product in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $total_questions=$request->questioncount;
        $input_data=$request->all();

        $total_questions_attempt=$request->questioncount;
        $total_passed=0;
        $total_failed=0;
        //$finalresult=[];
        
        for($i=1;$i<=$total_questions;$i++)
        {
             $input_question = $input_data["q_".$i];
             $input_answer   = $input_data["ans_".$i];
             $result=quiz::getAnswer($input_question);
             $correctAnswer=$result[0]->correct_answer;
             
            if($input_answer==$correctAnswer) 
            {
                $total_passed=$total_passed+1;
            }
            else
            {
                $total_failed=$total_failed+1;
            }

        }

         $finalresult=['questions'=> $total_questions_attempt, 'failed' => $total_failed,'passed' => $total_passed];
         Session::flash('questions', $total_questions_attempt); 
         Session::flash('failed', $total_failed); 
         Session::flash('passed', $total_passed);
         return view('answer');
          
    }
}
