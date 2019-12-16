@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid">
  <h1>Quiz</h1>
  <p>Please select the answer using radio buttons.</p>
  <form action="submitanswer" method="post">
        {{ csrf_field() }}
 
  <?php
  $i=1;
  foreach ($question_answers as $data) {  ?>
  <div class="row">
    <div class="col-sm-12" style="background-color:white;">{{$i. ')'.$data->question}}
      <div class="row" id="div_ans_{{$i}}">
      <input type=hidden name="q_{{$i}}" id="q_{{$i}}" value="{{$data->question}}">
        <div class="col-sm-4" style="background-color:lightgray;"> <input type="radio" id="ans_{{$i}}" name="ans_{{$i}}" value="{{$data->answer_one}}">{{$data->answer_one}}</div>
        <div class="col-sm-4" style="background-color:lightcyan;"><input type="radio" id="ans_{{$i}}" name="ans_{{$i}}" value="{{$data->answer_two}}">{{$data->answer_two}}</div>
        <div class="col-sm-4" style="background-color:lightgray;"><input type="radio" id="ans_{{$i}}" name="ans_{{$i}}" value="{{$data->answer_three}}">{{$data->answer_three}}</div>
        
      </div>
  </div>
  
 
  </div>
  <br>
  
  <?php  $i++; } ?>
</div>
<input type=hidden name="questioncount" id="questioncount" value="{{$i-1}}">
<button type="submit" id="submitbutton" class="btn btn-primary">Submit</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
