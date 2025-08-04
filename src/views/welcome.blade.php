@extends('layouts.public')
@section('content')
        <div style="padding: 3rem 1.5rem; text-align: center;">
            <h1 class="cover-heading">{{ config('app.name', 'Laravel') }}</h1>
            <p class="lead"><img src="{{ asset('images/logo.png') }}" style="width:50%;" alt=""></p>
            <p class="lead">
              <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Login</a>
            </p>
        </div>
@endsection