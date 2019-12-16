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
  <h1>Answer Display</h1>
  <p>Please see the result below</p>
  <br>
  <br>
  @if(Session::has('questions'))
<p class="alert alert-info"> Total questions: {{ Session::get('questions') }}</p>
@endif
@if(Session::has('passed'))
<p class="alert alert-success"> Passed: {{ Session::get('passed') }}</p>
@endif
@if(Session::has('failed'))
<p class="alert alert-info"> Failed: {{ Session::get('failed') }}</p>
@endif
  <br>
  <a href="{{ url('/home') }}">Try again!!!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
